<?php require_once 'config.php'?>
<?php include 'piwik_track.php' ?>

<?php
foreach (MERCHANDISE as $ref => $item) :
    $name = $item['display_name'];
    ?>
<div class="text-center">
	<h3><?=$name?></h3>
	The <?=$item['description']?> can be purchased with your entry for $<?=$item['price']?>.
	<?php if ($item['image']):?>
	<br /> <br /><img style="display: inline;" class="img-responsive"
		alt="<?=$name?>" src="<?=$item['image']?>">
	<?php endif;?>
</div>
<?php endforeach;?>