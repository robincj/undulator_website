<?php require('include_common.php'); ?>

<?php
foreach ( MERCHANDISE as $item ) :
	$name = $item ['display_name'];
	?>
<div class="text-center">
	<h3><?=$name?></h3>
	The <?=$item['description']?> can be purchased with your entry for $<?=$item['price']?>.
	<?php if ($item['image']):?>
	<br /> <br />
	<img style="display: inline;" class="img-responsive" alt="<?=$name?>"
		src="<?=$item['image']?>">
	<?php endif;?>
</div>
<?php endforeach;?>