
<div class="panel-group" id="prices_accordion" role="tablist"
	aria-multiselectable="true">
	<div class="panel panel-default">
		<div class="panel-heading" role="tab" id="headingOne">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#prices_accordion"
					href="#collapseOne" aria-expanded="true"
					aria-controls="collapseOne"> Prices</a>
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
<div class="A100">
	<h4 style="color: red;">
		The Aorangi Undulator 100 event has reached its entry limit!<br />Use
		the entry form below to put yourself on the wait-list.
	</h4>
</div>
<div>
	<h2>Entry Form</h2>

	<div id="submittedmsgbox"></div>
	<h4>I am not weak and therefore would love to enter the Aorangi
		Undulator.</h4>

	<p>Please complete and submit the following form. Payment details will
		be sent to your email addresss.</p>

	<form class="form-horizontal" id="enter" name="enter">
		<div class="form-group">

			<label for="firstname" class="col-sm-2 control-label">First name</label>
			<div class="col-sm-10">
				<input type="text" name="firstname" class="form-control"
					id="firstname" placeholder="First name" required />
			</div>
		</div>
		<div class="form-group">
			<label for="surname" class="col-sm-2 control-label"> Last name</label>
			<div class="col-sm-10">
				<input type="text" name="surname" class="form-control" id="surname"
					placeholder="Last name" />
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
			<div class="col-sm-10">
				<input type="email" class="form-control" id="email" name="email"
					placeholder="Email address" required>
			</div>
		</div>

		<!-- 
				<div class="form-group">
					<label for="agecategory" class="col-sm-2 control-label">Age
						category</label>
					<div class="col-sm-10">
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
			<label for="age" class="col-xs-6 col-sm-2 control-label">Age on 7th
				Nov 2015</label>
			<div class="col-xs-6 col-sm-2">
				<input type="number" name="age" id="age" class="form-control"
					size="2" min="10" max="100" value="20">
			</div>
		</div>

		<div class="form-group">
			<label for="gender" class="col-sm-2 control-label">Gender</label>
			<div class="col-sm-10">
				<label class="radio-inline"><input type="radio" name="gender"
					checked="checked" value="M" required>M</label> <label
					class="radio-inline"><input type="radio" name="gender" value="F"
					required>F</label>
			</div>
		</div>

		<div class="form-group">
			<label for="event" class="col-sm-2 control-label">Weakness</label>
			<div class="col-sm-10">
				<select name="event" id="event" class="form-control" required>
					<option id="event_option_AU" value="au" selected="selected">Not
						Weak: Aorangi Undulator (33km mountain run)</option>
					<option id="event_option_A100" value="A100">Definitely Not Weak:
						A100 (100km, 3 day event)</option>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label for="t-size" class="col-xs-12 col-sm-2 control-label"
				data-toggle="modal" data-target="#t-modal" title><span
				data-toggle="tooltip" data-placement="top"
				title="Click to see T-Shirt">T-Shirt ($25)</span></label> <label
				for="t-size" class="col-xs-6 col-sm-2 control-label">Size</label>
			<div class="col-xs-6 col-sm-2">
				<select name="t-size" id="t-size" class="form-control">
					<option value="S">S</option>
					<option value="M">M</option>
					<option value="L">L</option>
				</select>
			</div>

			<label for="t-quantity" class="col-xs-6 col-sm-2 control-label">Quantity</label>
			<div class="col-xs-6 col-sm-2">
				<input type="number" name="t-quantity" id="t-quantity"
					class="form-control" size="2" min="0" max="25" value="0">
			</div>
		</div>

		<div class="form-group">
			<label for="previous_events" class="col-sm-2 control-label">Running
				Resum&eacute;</label>
			<div class="col-sm-10">
				<textarea name="previous_events" class="form-control"
					id="previous_events"
					placeholder="Please let us know some of your previous running events and times." />
			</div>
		</div>

		<div class="form-group">
			<label for="query" class="col-sm-2 control-label">Query</label>
			<div class="col-sm-10">
				<textarea name="query" class="form-control" id="query"
					placeholder="If you have any queries or messages to pass along with your entry then enter them here." />
			</div>
		</div>


		<div class="form-group">
			<label for="entryprice" class="col-sm-2 control-label">Total price</label>
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

<!-- Modal -->
<div class="modal fade" id="t-modal" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
        <?php include "t-shirt.php"; ?></div>
			<div class="modal-footer"></div>
		</div>
	</div>
</div>

<script>

document.getElementById("event_option_" + au_event).selected = true;

function setPrice() {
	var datenum = <?php echo date("Ymd") ?>; 
	var event = $("#event option:selected").val();
	var price = 0 ;
	var note = '';
	if (datenum < 20150601 ){
		note = "(Early bird price before June 1, 2015)";
		if (event == "A100" ){
			price += 150;			
		}
		else if (event == "au" ){
			price += 35;
		}
	}
	else {
		if (event == "A100" ){
			price += 180;
		}
		else if (event == "au" ){
			price += 50;
		}
	}
	price += $("#t-quantity").val() * 25; // 25 for each t-shirt
	$("#entryprice").html("$" + price + " " + note);
	$("#entryprice_param").val(price);
}
setPrice();
$("#event").change(function(){setPrice();});
$("#t-quantity").change(function(){setPrice();});
// Prevent accidental submission of form when setting quantity (especially in IE which requires text entry)
$("#t-quantity").keypress(function(event) { 
	if ( event.keyCode == 13 ) {
		// trigger a change event to trigger a setPrice()
		$("#t-quantity").change();
		return false;
	}
});

$("#enter").submit(function( event ) {
	  event.preventDefault();
	  var ser = $("#enter").serialize();
	  $('#submittedmsgbox').load("enter_process.php", ser);
	  $('#enter')[0].reset();
	 	setPrice();
	});

</script>