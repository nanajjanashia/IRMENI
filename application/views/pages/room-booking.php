
	<div class="pagetop">
		<div class="container">
			<h1><?php echo strtoupper(lang("roombooking"));?></h1>
			<ul>
				<li><a title="" href="<?php echo base_url("$language");?>"><?php echo lang("home");?></a></li>
				<li><a title="" href="<?php echo base_url("$language");?>"><?php echo lang("rooms");?></a></li>
				<li><?php echo lang("roombooking");?></li>
			</ul>		
		</div>
	</div><!-- Page Top -->

<br><br>
<section id="columns" class="padding-bottom">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/booking.css">
<div class="container booking-container">
<ul id="booking-tabs" class="nav nav-tabs nav-justified">
	<li <?php if(!$addon)echo 'class="active"'; ?>>
		<a data-toggle="tab" href="#booking-choose-date">
			<span class="number">
			<b>1</b>
			</span>
		<span class="title"><?php echo lang("chooseyourdate");?></span>
		</a>
	</li>
	<li <?php if($addon)echo 'class="active"'; ?>>
		<a data-toggle="tab" href="#booking-reservation">
		<span class="number">
		<b>2</b>
		</span>
		<span class="title"><?php echo lang("reservation");?></span>
		</a>
	</li>
		<li>
		<a data-toggle="tab" href="#booking-confirmation">
		<span class="number">
		<b>3</b>
		</span>
		<span class="title"><?php echo lang("confirmation");?></span>
		</a>
	</li>
</ul>

<?php if($addon){
	?>
	<div class="divHide">
		<?php	$this->load->view('widgets/findroom'); ?>
	</div>
<div class="divShow">
	 <?php	$this->load->view('widgets/reservation'); ?>
</div>
	<?php
} else { ?>
	<div class="divShow">
		<?php	$this->load->view('widgets/findroom'); ?>
	</div>
<div class="divHide">
	 <?php	$this->load->view('widgets/reservation'); ?>
</div>
<?php } ?>

<div class="divConfirm" style="display:none">
	 <?php	$this->load->view('widgets/confirmation'); ?>
</div>

</div>

<br><br><br>
</section>

	
<script >
	date = new Object();
	date['checkin']="";
	date['checkout']="";
	
    $(".booking-dates").datepicker({
        format: "yyyy-mm-dd",
        startDate: new Date(), 
        inputs: $('.booking-date-fields-container')
    }).on('changeDate', function(e){
        var $this = $(e.target);
        $this.find('input[type=hidden]').val(e.format('yyyy-mm-dd'))
    });
	$(".booking-dates").datepicker({
        format: "yyyy-mm-dd",
        startDate: new Date(),
        inputs: $('.booking-date-fields-container')
    }).on('changeDate', function(e){
        var $this = $(e.target);
        $this.find('input[type=hidden]').val(e.format('yyyy-mm-dd'))
    });

		
	</script>


<script type="text/javascript">

		$(window).load(function(){	
		
			var url = window.location.href; 
			var requestdata = url.split("/");
			var count = requestdata.length;
			
			if( requestdata != '' )
			{
					
				newdat = requestdata[count-5].split("-");
				forrequestin = newdat[0]+"/"+newdat[1]+"/"+newdat[2];
				
				newdatout = requestdata[count-4].split("-");
				forrequestout = newdatout[0]+"/"+newdatout[1]+"/"+newdatout[2];
				
				$('.bookCheckIn').html( forrequestin );
				$('.bookCheckOut').html( forrequestout );
				
				$('.bookGuestMany').html( requestdata[count-2] );
				$('.bookChildrenMany').html( requestdata[count-1] );
				$('.roomName').html('Room type: ' + requestdata[count-3] );		
				$('#roomType').val( requestdata[count-3] );					
			}
			
			$("#roomtype").val($.cookie('hmroomtype'));
			
			if( $.cookie('hmadults') > 7 ){ $("#adults").val("7");}
			else { $("#adults").val($.cookie('hmadults')); }
			
			if( $.cookie('hmkids') > 7 ) { $("#kids").val("7"); }
			else { $("#kids").val($.cookie('hmkids')); }
			
			
			
		});
</script>


 <script> 

	$( document ).ready(function() {
			var base_url = window.location.origin;
			
		$("#btn-searchroom").click(function(){
			
			$('#errordiv').css('display','none');
			
			if( $('.check-in-date').val() == '' || date['check-out-date'] == '' )
			{
				$('#errordiv').css('display','block');
				$('#errormsg').html('Please fill both Check in and Check out dates!');
				return false;
			}
			
			if( $('#roomtype').val() < 1 )
			{
				$('#errordiv').css('display','block');
				$('#errormsg').html('Please Choose room type!');
				return false;
			}
			
			if( $('#adults').val() < 1 )
			{
				$('#errordiv').css('display','block');
				$('#errormsg').html('Please add how many adults we have!');
				return false;
			}
			
			$('.bookCheckIn').html( $('.check-in-date').val() );
			$('.bookCheckOut').html( $('.check-out-date').val() );
			
			$('.bookGuestMany').html( $('#adults').val() );
			$('.bookChildrenMany').html( $('#kids').val() );
			
			var roomtypetext = $("#roomtype").find("option:selected").text();
			
			$('.roomName').html("Room Type: " + roomtypetext );
			$('.selectedItems').val( roomtypetext );
			
			$(".divShow").hide();
			$(".divHide").show();
						
			$(" li.active").removeClass("active");
			$(".nav li:eq(1)").addClass('active');
			
		});
		
		
		$(".submit-booking-butt").click(function(){
			data = new Object();
			
			if( $(".first-name").val() == '' || $(".last-name").val() == '' || $(".email").val() == '' || $(".tel").val() == '' || $("#message-field").val() == '' )
			{
				$('#errordiv').css('display','block');
				$('#errormsg').html('Please fill all rquired forms!');
				return false;
			}
			
			data["firstname"] =  $(".first-name").val();
			data["lastname"] =  $(".last-name").val();
			data["email"] =  $(".email").val();
			data["phone"] =  $(".tel").val();
			data["city"] =  $(".city").val();
			data["address"] =  $(".addrss").val();			
			data["text"] =  $("#message-field").val();
			
			data["checkin"] =  $('.bookCheckIn').text();
			data["checkout"] = $('.bookCheckOut').text();			
			data["adults"] = $('.bookGuestMany').text();
			data["kids"] = $('.bookChildrenMany').text();			
			data["roomtype"] = $('.selectedItems').val();
			
			$.post(base_url +'/'+ lang + '/rooms/saveBooking',data, function(data,status){
				
			})
			.success(function(data){
				
				$(".divShow").hide();
				$(".divHide").hide();
				$(".divConfirm").css("display","block");
							
				$(" li.active").removeClass("active");
				$(".nav li:eq(2)").addClass('active');
				var ckin = $(".bookCheckIn").text();
				var ckout = $(".bookCheckOut").text();
				
				if( ckin == '' || ckout == '' )
				{
					alert("Select dates");
					return false;
				}
				
				monthnumckeckin = ckin.split("/");
				monthnumckeckout = ckout.split("/");
				
				var months = ['January', 'February', 'March', 'April', 'May', 'June',
				  'July', 'August', 'September', 'October', 'November', 'December'];
				  
				  
				if( monthnumckeckin[1] < 10 )
				{
					monthnumckeckin[1] = monthnumckeckin[1].substring(1);
				}
				
				if( monthnumckeckout[1] < 10 )
				{
					monthnumckeckout[1] = monthnumckeckout[1].substring(1);
				}
				
				if( monthnumckeckin[0] < 10 )
				{
					monthnumckeckin[0] = monthnumckeckin[0].substring(1);
				}
				
				if( monthnumckeckout[0] < 10 )
				{
					monthnumckeckout[0] = monthnumckeckout[0].substring(1);
				}
				
				monthcheckin = months[monthnumckeckin[1]];
				monthcheckout = months[monthnumckeckout[1]];
				
				chin = monthnumckeckin[0] + ' ' + monthcheckin + '<br>' + monthnumckeckin[2];
				chout = monthnumckeckout[0] + ' ' + monthcheckout + '<br>' + monthnumckeckout[2];
				
				duration = "";
				alert(typeof monthnumckeckin[2])
				if( monthnumckeckin[2] <= monthnumckeckout[2] )
				{
					if(monthnumckeckin[1] <= monthnumckeckout[1] )
					{
						year = monthnumckeckout[2] - monthnumckeckin[2];
						month = monthnumckeckout[1] - monthnumckeckin[1];
						if( year != 0 )
						{
							duration += year + "year "; 
						}
						else if( month != 0 )
						{
							duration += month + "month "; 
						}
						else if(  monthnumckeckin[1] < monthnumckeckout[1] )
						{
							days = monthnumckeckin[0] + monthnumckeckout[0];
							d = days/30;
							if( d != 0)
							{
								duration += days + "days"; 
							}
							else
							{
								duration += month + d +  "month" + (days - (2*d)) + "days"; 
							}
						}
						else if( monthnumckeckin[1] == monthnumckeckout[2] )
						{
							days = monthnumckeckout[0] - monthnumckeckin[0];
							duration += days + 'days';
						}
					}
				}
				
				
				
				$(".chkintdate").html( chin );
				$(".chkouttdate").html( chout ); 
				$(".duration").html( duration ); 
				
				
				$(".username").val( $(".first-name").val() + " " + $(".last-name").val() );
				$(".useremail").val( $(".email").val() );
				$(".userphone").val( $(".tel").val() );
				$(".usercity").val( $(".city").val() );
				$(".useraddress").val( $(".addrss").val() );
				$(".message").val( $("#message-field").val() );
				$(".rmttstd").val( $("#roomType").val() );
				alert($("#roomType").val());
				return false;
				//$(location).attr('href', base_url +'/'+ lang + '/rooms/');					
			})
			 .fail(function(){
				console.log("ERROR");
				return false;
			 });
			
		});
		
		
		$(".send-booking-butt").click(function(){
			object = new Object();
			
			object['username'] = $('.username').val();
			object['useremail'] = $('.useremail').val();
			object['userphone'] = $('.userphone').val();
			object['usercity'] = $('.usercity').val();
			object['useraddress'] = $('.useraddress').val();
			object['message'] = $('.message').val();
			object['roomtype'] = $('.rmttstd').val();
			object['chkintdate'] = $('.chkintdate').text();
			object['chkouttdate'] = $('.chkouttdate').text();
			
			$.post(base_url +'/'+ lang + '/rooms/sendEmail',object, function(object,status){
				
			})
			.success(function(res){
				alert(res); return false;
			})
			 .fail(function(){
				console.log("ERROR");
				return false;
			 });
			 
		});
		
		
	
			
	});
	
</script>
