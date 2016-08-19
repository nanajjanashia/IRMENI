<div id="booking-tab-contents" class="tab-content">
<div id="booking-reservation">
	<input id="roomType" type="hidden" value="">
	<input id="bookingType" type="hidden" value="1">
	<input id="step" type="hidden" value="3">
	<h4 class="text-center"><span><b><?php echo lang("booking");?></b><?php echo lang("summary");?></span></h4>

<div class="contact-info clearfix">
	<div class="contact-info-contnet">
		<div class="first-info col-md-4 col-xs-4">
			<ul>
				<li><?php echo lang("checkin");?> :<span class="bookCheckIn"></span></li>
				<li><?php echo lang("checkout");?> :<span class="bookCheckOut"></span></li>
				<li><?php echo lang("adults");?> :<span class="bookGuestMany"></span></li>
				<li><?php echo lang("children");?> :<span class="bookChildrenMany"></span></li>
			</ul>
		</div>
		<div class="room-info col-md-4 col-xs-4">
			<ul>
				<li><input class="selectedItems" type="hidden" value="">
					<span class="roomName"><?php echo lang("roomtype");?>: </span>
				</li>
			</ul>
		</div>
		<div class="total-price col-md-4 col-xs-4">
			<h1>
				<span class="free"><?php echo lang("free");?></span>
			</h1>
		</div>
	</div>
</div>
	<h4 class="text-center"><span><b><?php echo lang("guests");?></b><?php echo lang("information");?></span></h4>
	<input id="step" type="hidden" value="3">
<div class="row">
	<div class="field-container col-xs-6 col-md-4">
		<input class="first-name" type="text" required="" placeholder="<?php echo lang("firstname");?> *">
	</div>
	<div class="field-container col-xs-6 col-md-4">
		<input class="last-name" type="text" required="" placeholder="<?php echo lang("lastname");?> *">
	</div>
	<div class="field-container col-xs-12 col-md-4">
		<input class="email" type="email" required="" placeholder="<?php echo lang("email");?> *">
	</div>
</div>
<div class="row">
	<div class="field-container col-xs-6 col-md-4">
		<input class="tel" type="tel" required="" placeholder="<?php echo lang("phone");?> *">
	</div>
	<div class="field-container col-xs-6 col-md-4">
		<input class="city" type="text" placeholder="<?php echo lang("city");?>">
	</div>
	<div class="field-container col-xs-12 col-md-4">
		<input class="addrss" type="text" placeholder="<?php echo lang("addrName");?>">
	</div>
</div>
<div class="field-container row message-field">
	<textarea id="message-field" class="special-requirement" placeholder="<?php echo lang("specialreq");?> "></textarea>
</div>
<div class="error-message-box"></div>
	<button class="btn btn-md colored submit-booking-butt"><?php echo lang("booknow");?></button>
</div>
</div>