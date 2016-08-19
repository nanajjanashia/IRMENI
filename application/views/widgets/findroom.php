<div id="booking-tab-contents" class="tab-content first-page">
<div id="booking-choose-date" class="tab-pane fade in active">
<div class="input-daterange booking-dates">

	<div class="rooms-container col-xs-12 col-md-12">
	<div class="row">
	
	<div class="input-daterange booking-dates">
		<div class="booking-date-fields-container col-xs-6 dateCheckin">
			<h5><span><b><?php echo lang("checkin");?></b></span></h5>
			<input type="hidden" value="" class="check-in-date">
		</div>
		<div class="booking-date-fields-container col-xs-6">
			<h5><span><b><?php echo lang("checkout");?></b></span></h5>
			<input type="hidden" value="" class="check-out-date">
		</div>
	</div>
		
		
		</div>
	</div>

<div class="more-details-container clearfix">

	<div class="rooms-container col-xs-12 col-md-12" style="text-align:center; margin-bottom:10px;">
		<h4><span> <b><?php echo lang("other");?></b><?php echo lang("details");?></span></h4>
	</div>

<div class="rooms-container col-xs-6 col-md-12">

<div class="row">
	<div class="col-md-12">
		<div class="col-md-4">
			<label><?php echo lang("rooms");?></label>
			<div class="field">
				<select id="roomtype" class="form-control" style="background:rgba(0, 0, 0, 0) none repeat scroll 0 0;  border-radius: 0 !important; height:38px; border:0;" >
					<option value="0"><?php echo lang("roomtype");?></option>
					<?php if( isset($roomtypes) && !empty($roomtypes) ) 
							{
								foreach( $roomtypes as $k=>$v )
								echo '<option value="'.$v->id.'">'.$v->type.'</option>';
							}?>
					
				</select>
			</div>
		</div>
		
		<div class="col-md-4">
			<label><?php echo lang("adults");?></label>
			<div class="field">
				<select id="adults" class="form-control" style="background:rgba(0, 0, 0, 0) none repeat scroll 0 0;  border-radius: 0 !important; height:38px; border:0;" >
					<option value="0"><?php echo lang("guests");?></option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">6+</option>
				</select>
			</div>
		</div>
		
		<div class="col-md-4">
			<label><?php echo lang("kids");?></label>
			<div class="field">
				<select id="kids" class="form-control" style="background:rgba(0, 0, 0, 0) none repeat scroll 0 0;  border-radius: 0 !important; height:38px; border:0;" >
					<option value="0"><?php echo lang("children");?></option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">6+</option>
				</select>
			</div>
		</div>
		<div>
	</div>
</div>

<div id="errordiv" class="col-md-12" style="display:none"><br><br>
	<div id="errormsg" class="error-message-box active alert alert-danger" style="display: block;">
	
	</div>
</div>

	<div class="clear"></div>
	<div class="error-message-box"></div>
	</div>
		<button id="btn-searchroom" class="btn btn-md colored check-availability-butt"><?php echo lang("booknow");?></button>
	</div>
</div>
<br><br>
</div>
</div>
</div>