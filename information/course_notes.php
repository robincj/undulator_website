
<div class="container">
	<div class="row">
		<div class="col-sm-1"></div>
		<div class="col-sm-10">
			<h2 class="A100">Aorangi Undulator 100 Course Notes</h2>
			<div class="A100" role="tabpanel">
				<ul class="nav nav-tabs" role="tablist" id="coursenotes_tab">
					<li role="presentation"><a href="#coursenotes_day1" role="tab"
						data-toggle="tab">A100 Day 1</a></li>
					<li role="presentation"><a href="#coursenotes_day2" role="tab"
						data-toggle="tab">A100 Day 2</a></li>
					<li role="presentation"><a href="#coursenotes_day3" role="tab"
						data-toggle="tab">A100 Day 3</a></li>
				</ul>

				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade active"
						id="coursenotes_day1"><?php include('course_notes_A100_day_1.php');?>
</div>
					<div role="tabpanel" class="tab-pane fade" id="coursenotes_day2"><?php include('course_notes_AU.php'); ?></div>
					<div role="tabpanel" class="tab-pane fade" id="coursenotes_day3"><?php include('course_notes_A100_day_3.php'); ?></div>

				</div>

			</div>
			<div class="AU">
				<h2 class="AU">Aorangi Undulator Course Notes</h2>
				<?php include('course_notes_AU.php');?>
			</div>
		</div>

		<div class="col-sm-1"></div>
	</div>
</div>
<script>
	if ( au_event == "A100" ) { $(function () { 
		$('#coursenotes_tab a:first').tab('show') }) }
</script>