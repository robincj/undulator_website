<?php include 'piwik_track.php'?>
<?php require_once 'config.php'?>

<div>
	<h4 style="color: red;">
	<?= ENTRIES_OPEN? "Entries are now open for the ".EVENT_YEAR." event.":"Entries are not yet open for the next event."?>
	</h4>
</div>
<div class="panel-group" id="prices_accordion" role="tablist"
	aria-multiselectable="true">

	<div class="panel panel-default">
		<div class="panel-heading" role="tab" id="headingOne">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#prices_accordion"
					href="#collapseOne" aria-expanded="true"
					aria-controls="collapseOne"> View Prices </a>
			</h4>
		</div>
		<div id="collapseOne" class="panel-collapse collapse" role="tabpanel"
			aria-labelledby="headingOne">
			<div class="panel-body">
		<?php include "information/prices.php"?>
      </div>
		</div>
	</div>
</div>


<?php

function entryForm()
{
    $labelClass = "col-sm-3 control-label";
    $inputDiv = "col-sm-9";
    ?>

<!-- 
<div class="A100">
	<h4 style="color: red;">
		The Aorangi Undulator 100 event has reached its entry limit!<br />Use
		the entry form below to put yourself on the wait-list.
	</h4>
</div>
-->
<div>
	<h2>Entry Form</h2>

	<div id="submittedmsgbox"></div>
	<h4>I am not weak and therefore would love to enter the Aorangi
		Undulator.</h4>

	<p>Please complete and submit the following form. Payment details will
		be sent to your email addresss.</p>

	<form class="form-horizontal" id="enter" name="enter">
		<div class="form-group">

			<label for="firstname" class="<?=$labelClass?>">First name</label>
			<div class="<?=$inputDiv?>">
				<input type="text" name="firstname" class="form-control"
					id="firstname" placeholder="First name" required />
			</div>
		</div>
		<div class="form-group">
			<label for="surname" class="<?=$labelClass?>"> Last name</label>
			<div class="<?=$inputDiv?>">
				<input type="text" name="surname" class="form-control" id="surname"
					placeholder="Last name" />
			</div>
		</div>
		<div class="form-group">
			<label for="email" class="<?=$labelClass?>">Email</label>
			<div class="<?=$inputDiv?>">
				<input type="email" class="form-control" id="email" name="email"
					placeholder="Email address" required>
			</div>
		</div>

		<div class="form-group">
			<label for="homelocation" class="<?=$labelClass?>">Home</label>
			<div class="<?=$inputDiv?>">
				<input type="text" class="form-control" id="homelocation"
					name="homelocation" placeholder="Your home town/region">
			</div>
		</div>
		<!-- 
				<div class="form-group">
					<label for="agecategory" class="<?=$labelClass?>">Age
						category</label>
					<div class="<?=$inputDiv?>">
						<select name="agecategory" id="agecategory" class="form-control"
							required>
							<option value="u20">Under 20</option>
							<option value="20-39">20-39</option>
							<option value="40-49">40-49</option>
							<option value="50-59">50-59</option>
							<option value="60+">60+</option>
						</select>
					</div>
				</div>
				 -->

		<div class="form-group">
			<label for="event" class="<?=$labelClass?>">Weakness</label>
			<div class="<?=$inputDiv?>">
				<select name="event" id="event" class="form-control" required>
					<option id="event_option_AU" value="au" selected="selected">Not
						Weak: Aorangi Undulator (33km mountain run)</option>
					<option id="event_option_A100" value="A100">Definitely Not Weak:
						A100 (100km, 3 day event)</option>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label for="age" class="col-xs-3 <?=$labelClass?>">Age on <?=date("jS F Y",strtotime(DATE_A100_DAY1))?></label>
			<div class="col-xs-3 col-sm-2">
				<input type="number" name="age" id="age" class="form-control"
					size="2" min="10" max="100" value="20">
			</div>
		</div>

		<div class="form-group">
			<label for="gender" class="col-xs-2 control-label">Gender</label>
			<div class="col-xs-4">
				<label class="radio-inline"><input type="radio" name="gender"
					checked="checked" value="M" required>M</label> <label
					class="radio-inline"><input type="radio" name="gender" value="F"
					required>F</label>
			</div>
		</div>

		<div class="form-group">
			<label for="estimated_time" class="col-xs-3 <?=$labelClass?>">Estimated
				time</label>
			<div class="col-xs-3 col-sm-3">
				<input type='text' name="estimated_time" class="form-control"
					id="estimated_time"
					title="If this is your first event of this type then estimate your road-marathon (42km) time and double it." />
			</div>

		</div>

		<div class="form-group">
			<label for="previous_events" class="<?=$labelClass?>">Running
				Resum&eacute;</label>
			<div class="<?=$inputDiv?>">
				<textarea name="previous_events" class="form-control"
					id="previous_events" required
					placeholder="Please let us know some of your previous running events and times"></textarea>
			</div>
		</div>


		<div class="form-group"
			title="Runners are responsible for managing their own medical needs as marshals will only carry basic first aid supplies.">
			<label for="medical" class="<?=$labelClass?>">Medical Conditions</label>
			<div class="<?=$inputDiv?>">
				<textarea name="medical" class="form-control" id="medical"
					placeholder="Medical conditions and medications"></textarea>
			</div>
		</div>


<?php
    foreach (MERCHANDISE as $ref => $item) :
        $name = $item['display_name'];
        ?>
		<div class="row">
			<div class="form-group merchandise">
				<label class="col-xs-12 <?=$labelClass?>" data-toggle="modal"
					data-target="#<?=$ref."-modal"?>"><span data-toggle="tooltip"
					data-placement="top" title="Click to see <?=$name?>"><?=$name?> ($<?=$item['price']?>)</span></label>

				<div class="<?=$inputDiv?>">
					<label for="<?=$ref."-quantity"?>"
						style='display: inline-block; vertical-align: middle; text-align: right; float: left; margin-right: 10px;'>
						Quantity </label> <input type="number"
						name="<?=$ref."-quantity"?>" data-price="<?=$item['price']?>"
						id="<?=$ref."-quantity"?>" class="form-control merch-quantity"
						size="2" min="0" max="25" value="0"
						style='width: 80px; display: inline-block; vertical-align: middle; text-align: right; float: left; margin-right: 10px;'>
					<?php if ($item['sizes']):?>
					<label for="<?=$ref."-size"?>"
						style='display: inline-block; vertical-align: middle; text-align: right; float: left; margin-right: 10px;'>
						Size </label> <select name="<?=$ref."-size"?>"
						id="<?=$ref."-size"?>" class="form-control merch-size"
						style='width: 80px; display: inline-block; vertical-align: middle; text-align: right; float: left; margin-right: 10px;'>
							<?php foreach ($item['sizes'] as $size):?>
							<option value="<?=$size?>"><?=$size?></option>
							<?php endforeach;?>
						</select>
					<?php endif;?>
				</div>
			</div>
		</div>
		<?php if (!empty($item['image'])):?>

		<!-- Modal -->
		<div class="modal fade" id="<?=$ref."-modal"?>" tabindex="-1"
			role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"
							aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
        <?php //include "merchandise.php"; ?></div>
					<div class="text-center">
						<h3><?=$name?></h3>
	The <?=$item['description']?> can be purchased with your entry for $<?=$item['price']?>.
							<br /><br />
						<img style="display: inline;" class="img-responsive"
							alt="<?=$name?>" src="<?=$item['image']?>">

					</div>
					<div class="modal-footer"></div>
				</div>
			</div>
		</div>
			<?php endif;
        
    endforeach
    ;
    ?>
		
		<div class="form-group">
			<label for="query" class="<?=$labelClass?>">Query</label>
			<div class="<?=$inputDiv?>">
				<textarea name="query" class="form-control" id="query"
					placeholder="If you have any queries or messages to pass along with your entry then enter them here."></textarea>
			</div>
		</div>


		<div class="form-group">
			<label for="entryprice" class="<?=$labelClass?>">Total price</label>
			<div class="col-sm-6">
				<p id="entryprice" class="form-control-static"></p>
				<input type="hidden" name="price" id="entryprice_param" />
			</div>
			<div class="col-sm-2">
				<button type="submit" class="btn btn-success">Register</button>
			</div>
		</div>

	</form>
</div>

<script>
document.getElementById("event_option_" + au_event).selected = true;

function setPrice() {
	var datenum = <?= date("Ymd") ?>,earlydate = <?= date("Ymd", strtotime(EARLY_ENTRY_DATE)) ?> ; 
	var event = $("#event option:selected").val();
	var price = 0 ;
	var note = '';
	note = <?= time() ?> +" <?= EARLY_ENTRY_DATE ?>";
	if (datenum < earlydate ){
		note = "(Early bird price before <?= EARLY_ENTRY_DATE ?>)";
		if (event == "A100" ){
			price += 150;			
		}
		else if (event == "au" ){
			price += 50;
		}
	}
	else {
		if (event == "A100" ){
			price += 180;
		}
		else if (event == "au" ){
			price += 70;
		}
	}
	$(".merch-quantity").each( function(){
		price += $(this).val() * $(this).data('price'); // 25 for each t-shirt
	});
	$("#entryprice").html("$" + price + " " + note);
	$("#entryprice_param").val(price);
}
setPrice();
$("#event").change(function(){setPrice();});
$(".merch-quantity").change(function(){setPrice();});
// Prevent accidental submission of form when setting quantity (especially in IE which requires text entry)
$(".merch-quantity").keypress(function(event) { 
	if ( event.keyCode == 13 ) {
		// trigger a change event to trigger a setPrice()
		$(event.target).change();
		return false;
	}
});

$("#enter").submit(function( event ) {
	event.preventDefault();
	var ser = $("#enter").serialize();
	$('#submittedmsgbox').load("enter_process.php", ser);
	$('#enter')[0].reset();
	setPrice();
	return false;
	});

</script>
<?php
}

if (ENTRIES_OPEN)
    entryForm();

?>
