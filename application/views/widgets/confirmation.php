<div id="booking-tab-contents" class="tab-content">
	<div id="booking-confirmation">
		<div class="modal fade" style="display: none;">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button class="close" aria-label="Close" data-dismiss="modal" type="button">
						<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<p><?php echo lang("reservationsussess");?></p>
					</div>
					<div class="modal-footer">
						<button class="btn btn-default" data-dismiss="modal" type="button"><?php echo lang("close");?></button>
					</div>
				</div>
			</div>
		</div>
		<input id="step" type="hidden" value="4">
		<input class="username" type="hidden" value="">
		<input class="useremail" type="hidden" value="">
		<input class="userphone" type="hidden" value="">
		<input class="usercity" type="hidden" value="">
		<input class="useraddress" type="hidden" value="">
		<input class="rmttstd" type="hidden" value="">
		<input class="message" type="hidden" value="">		
		<h3 id="confirmText" class="text-center"><span><b><?php echo lang("confirmation");?></b></span></h3>

		<div class="contact-info clearfix">
		<table class="confirmInfo">
		<tbody>
		<tr>
		<td width="220">
			<img class="confirmHotRoom" width="200" src="http://hotelsanapiro.com/img/hotelForConfirm.jpg">
		</td>
		<td colspan="4">
			<h3 class="sanapiro"><?php echo lang("hotelirmeni");?></h3>
			<?php if( isset($address) ) 
			{
				if( $language == 'en' )
				{
					$addr = $address[0]->addressen;
				}
				else
				{
					$addr = $address[0]->addressar;
				}
				if( !empty($address[0]->fax) )
				{
					$fax = $address[0]->fax;
				}
				echo '<span class="boldFont">'.lang("address").':</span>
					'.$addr.'
					<br>
					<span class="boldFont">'.lang("phone").':</span>
					'.$address[0]->phone.', '.$fax.'';
			}?>
			<br>
		</td>
		</tr>
		<tr>
		<td>
			<span class="confirmCheckIn"><?php echo lang("checkin");?></span>
			<span class="textAlign chkintdate"></span>
		</td>
		<td>
			<span class="confirmCheckIn"><?php echo lang("checkout");?></span>
			<span class="textAlign chkouttdate"></span>
		</td>
		<td>
			<span class="textAlign">
			<span class="confirmCheckIn"><?php echo lang("roomcount");?></span>
			1
			</span>
		</td>
		<td>
			<span class="textAlign">
			<span class="confirmCheckIn"><?php echo lang("duration");?></span>
			<span class="duration"></span>
			</span>
		</td>
		<td>
			<span class="confirmCheckIn"><?php echo lang("sum");?></span>
			<span class="textAlign">USD 525</span>
		</td>
		</tr>
		<tr>
		<td colspan="5">
		<iframe width="100%" height="450" frameborder="0" allowfullscreen="" style="border:0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d860.4022688539097!2d44.79917085856791!3d41.7024223540941!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40440cde0a41aea5%3A0x2f6c33bcdbea5904!2s12+Mari+Brose+St%2C+Tbilisi!5e0!3m2!1sen!2sge!4v1441567917796">
		<!DOCTYPE html>
		<html jstcache="0">
		</iframe>
		</td>
		</tr>

		</tbody>
		</table>
			<div class="error-message-box"></div>
			<div class="bookingConfirmationButtoms">
				<button class="btn btn-md colored send-booking-butt"><?php echo lang("confirm"); ?></button>
				<a class="btn btn-info btn-lg printingFriendlyVers" href="#">
				<span class="glyphicon glyphicon-print"></span>
				<?php echo lang("print");?>
				</a>
			</div>
		</div>
	</div>
</div>
