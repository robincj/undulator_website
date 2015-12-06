
<?php
class Tiler {
	public $photodir = "../images/photos";
	public $photodirUrl = "/images/photos";
	public $bigside = 300;
	public $maxPerPage = 10;
	private $pageNum = 1;
	/**
	 *
	 * @param array $params        	
	 */
	public function __construct($params = array()) {
		foreach ( $params as $name => $value ) {
			if (property_exists ( $this, $name )) {
				$this->$name = $value;
			}
		}
	}
	public function showNextPage() {
		$this->pageNum ++;
		return $this->show ();
	}
	public function showPage($page = NULL) {
		if (isset ( $_REQUEST ['gallerypage'] )) {
			$page = $_REQUEST ['gallerypage'];
		}
		$this->pageNum = $page;
		return $this->show ();
	}
	public function getNumberOfPages() {
		return ( int ) ($this->dirFileCount ( $photodir, "/(jpg|png|jpeg)$/i" ) / $this->maxPerPage);
	}
	public function dirFileCount($dir, $pattern = NULL) {
		$count = 0;
		foreach ( scandir ( $this->photodir ) as $file ) {
			if ($pattern && ! preg_match ( $pattern, $file ))
				continue;
			$count ++;
		}
		return $count;
	}
	/*
	 * getimagesize Array ( [0] => 1140 [1] => 1900 [2] => 2 [3] => width="1140" height="1900" [bits] => 8 [channels] => 3 [mime] => image/jpeg )
	 */
	/**
	 */
	public function show() {
		$bigside = $this->bigside;
		$photodir_url = $this->photodirUrl;
		?>
<script type="text/javascript" src="/lightbox/dist/ekko-lightbox.min.js"></script>
<script>
		$(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
    		event.preventDefault();
   			$(this).ekkoLightbox();
		});
	</script>
<style>
.tiler img {
	margin-top: 3px;
	margin-bottom: 3px;
}
</style>
<div id='tiler'>
		<?php
		$count = 0;
		foreach ( scandir ( $this->photodir ) as $file ) {
			if (! preg_match ( "/(jpg|png|jpeg)$/i", $file ))
				continue;
			$count ++;
			if ($count < ($this->pageNum - 1) * $this->maxPerPage) {
				continue;
			}
			if ($count >= $this->pageNum * $this->maxPerPage) {
				continue;
			}
			$size = getimagesize ( $this->photodir . "/$file" );
			$width = $size [0];
			$height = $size [1];
			$ratio = $width / $height;
			if ($ratio >= 1) {
				$display_width = $bigside;
				$display_height = $height * ($bigside / $width);
			} else {
				$display_width = $width * ($bigside / $height);
				$display_height = $bigside;
			}
			echo <<<EOH
		<span class="tiler" >
		<a href="$photodir_url/$file" data-toggle="lightbox" data-gallery="multiimages" data-title="Aorangi Undulator" >                              
			<img src="$photodir_url/$file" width="$display_width" height="$display_height" />
		</a>								
		</span>
EOH;
		}
		echo "</div>";
	}
}
?>
