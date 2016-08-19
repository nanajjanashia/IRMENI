
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
  <section class="content">

	 <div class="box box-warning">
	 
	 
            <div class="box-header with-border">
              <h3 class="box-title">CREATE NEW TOUR</h3>
            </div>
			
            <div class="box-body">
			  
                <div class="form-group">
                  <label>Tour title english</label>
                  <input id="txt_titleen" type="text" class="form-control" placeholder="" value="">
                </div>
				
                <div class="form-group">
                  <label>Tour title arabian</label>
                  <input id="txt_titlear" type="text" class="form-control" placeholder="" value="">
                </div>	
				<div class="form-group">
                  <label>Specify hotel type (ex. 5 Star)</label>
                  <input id="txt_hoteltype" type="text" class="form-control" placeholder="" value="">
                </div>	
				<div class="form-group">
                  <label>Specify duration (ex. 10 Days)</label>
                  <input id="txt_duration" type="text" class="form-control" placeholder="" value="">
                </div>
				<div class="form-group">
                  <label>Specify person quantity </label>
                  <input id="txt_persons" type="text" class="form-control" placeholder="" value="">
                </div>	
				
				<div class="form-group">
                  <label>Specify price </label>
                  <input id="txt_price" type="text" class="form-control" placeholder="" value="">
                </div>	
				<hr>
				<div class="box-body">
					<label>Tour cover image(type = .jpg) Dimensions (370X308)</label>
					<input type="file" name="file_upload" id="coverimage" />
					<div class="cover-upload imgcover"><br>				
						
					</div>
				</div>
				<hr>
				<div class="box-body">
					<label>Tour content image(type = .jpg) Dimensions (1600X609)</label>
					<input type="file" name="file_upload" id="mainimage" />
					<div class="main-upload imgmain"><br>				
						
					<br>
					</div>
				</div>
			</div>
			<hr>
			<div class="box-header">
              <h3 class="box-title">TOUR TEXT ENGLISH
                <small>(edit text)</small>
              </h3>
            </div>
			<div class="box-body pad">
              <form>
                    <textarea id="txt_texten" name="editor1" rows="10" cols="80">
                                            
                    </textarea>
              </form>
            </div>	
			<hr>
			<div class="box-header">
              <h3 class="box-title">TOUR TEXT ARABIAN
                <small>(edit text)</small>
              </h3>
            </div>
			<div class="box-body pad">
              <form>
                    <textarea id="txt_textar" name="editor1" rows="10" cols="80">
                                            
                    </textarea>
              </form>
            </div>	
			<hr>
			<div class="box-body">
				<div class="checkbox">
					<label><input type="checkbox" id="showonmainpage">Show on Main Page</label>
				</div>
			</div>
			
			<div class="box-body dropdown">
				
				<select class="form-control priority" style="display:none; width:auto;">
					<option value="0">Select priority</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
				</select>
								
			</div>
			<!-- add image upload on dropdown -->
			<div id="tourmain" class="box-body" style="display:none;">
				<label class="sel1" style="display:none">Tour cover image that will appear on main page(type = .jpg) Dimensions (234X501)</label>
				<label class="sel2" style="display:none">Tour cover image that will appear on main page(type = .jpg) Dimensions (600X413)</label>
				<label class="sel3" style="display:none">Tour cover image that will appear on main page(type = .jpg) Dimensions (400X417)</label>
				<label class="sel4" style="display:none">Tour cover image that will appear on main page(type = .jpg) Dimensions (1170X346)</label>
				<input type="file" name="file_upload" id="homepageimage" />
				<div class="tour-upload tourbasic"><br>				
					
				</div>
			</div>
			
		<hr>
		
			<div class="box-body">
				
				<div class="box-header with-border">
				  <h3 class="box-title">ADD TOUR DETAIL</h3><br>
				  <span>If you fill the form below, the information will display on the page, like shown in this picture. <br>If the form is empty, it will not appear at all.</span>
				</div>
				
				<div class="form-group">
                  <img src="<?php echo base_url();?>/images/tour-detail.jpg" width="1170px">
                </div>
			
				<div class="form-group">
                  <label>Tour detail title english</label>
                  <input id="dtitleen" type="text" class="form-control" placeholder="" value="">
                </div>	
				
				<div class="form-group">
                  <label>Tour detail title arabian</label>
                  <input id="dtitlear" type="text" class="form-control" placeholder="" value="">
                </div>	
				
				<div class="box-header">
              <h3 class="box-title">TOUR DATAIL TEXT ENGLISH
                <small>(edit text)</small>
              </h3>
            </div>
			<div class="box-body pad">
              <form>
                    <textarea id="dtexten" name="editor1" rows="10" cols="80">
                                            
                    </textarea>
              </form>
            </div>	
			
			<div class="box-header">
              <h3 class="box-title">TOUR DATAIL TEXT ARABIAN
                <small>(edit text)</small>
              </h3>
            </div>
			<div class="box-body pad">
              <form>
                    <textarea id="dtextar" name="editor1" rows="10" cols="80">
                                            
                    </textarea>
              </form>
            </div>	
			</div>
		
	  <div class="box-body">
		<div class="col-md-1">
			<button id="btn-addtour" class="btn btn-block btn-success btn-lg" type="button">Create</button>
		</div>
	  </div>
  </div>	  
</section>
	
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  
  <script type="text/javascript">
		$(document).ready(function() {
			$('#showonmainpage').change(function() {
				if ($(this).prop('checked')) {
				$(".priority").css("display","block");
				}
				else {
					 //$('.prior').parent().remove();
					 $(".priority").css("display","none");
					 $("#tourmain").css("display","none");
				}
			});
			
			$(document).on("change", ".priority", function(){
				
					if( $(this).val() == 0 )
					{
						$("#tourmain").css("display","none");
						$(".sel2").css("display","none");
						$(".sel3").css("display","none");
						$(".sel1").css("display","none");
						$(".sel4").css("display","none");
					}
					
					if( $(this).val() == 1 )
					{		
						$("#tourmain").css("display","block");				
						$(".sel1").css("display","block");
						$(".sel2").css("display","none");
						$(".sel3").css("display","none");
						$(".sel4").css("display","none");
					}
					if( $(this).val() == 2 )
					{
						$("#tourmain").css("display","block");
						$(".sel4").css("display","none");
						$(".sel3").css("display","none");
						$(".sel1").css("display","none");
						$(".sel2").css("display","block");
					}
					if( $(this).val() == 3 )
					{	
						$("#tourmain").css("display","block");
						$(".sel2").css("display","none");
						$(".sel1").css("display","none");
						$(".sel4").css("display","none");
						$(".sel3").css("display","block");
					}
					if( $(this).val() == 4 )
					{
						$("#tourmain").css("display","block");
						$(".sel2").css("display","none");
						$(".sel3").css("display","none");
						$(".sel1").css("display","none");
						$(".sel4").css("display","block");
					}
				
				
				
			});
			
		});
  </script>
  
  
  
  <script> 

	$( document ).ready(function() {
			var base_url = window.location.origin;
			data = new Object();
			
		$("#btn-addtour").click(function(){
			
			if( $("#txt_titleen").val() =='' || $("#txt_titlear").val() == '' )
				alert("Complete titles"); 
			if( $("#txt_hoteltype").val() == '' )
				alert("hotel type is empty"); 
			if( $("#txt_duration").val() == '' )
				alert( "please, specify duration" ); 
			if( !$.isNumeric($("#txt_persons").val()) ) 
				alert('persons number is incorrect!'); 			
			if( !$.isNumeric($("#txt_price").val()) )
				alert('Price is incorrect!'); 
			if( CKEDITOR.instances["txt_texten"].getData() == '' || CKEDITOR.instances["txt_textar"].getData() == '' )
				alert("english or arabic text is empty."); 

			var priority = $('.priority option:selected').val();
			var tourbasicuri = $('.tourbasic img').attr('src');	
			
			if( priority > 0 ){
				if( tourbasicuri && tourbasicuri !='' )
				{
					data['position']=priority;
					var tourbasic = tourbasicuri.split("/").pop();
					data['tourbasic']=tourbasic;
				}
			}
			if( !$('.imgcover img').attr('src') )
				alert( "Upload cover image" ); 
			if( !$('.imgmain img').attr('src') )
				alert( "Upload content image" ); 
			
			var imgcoveruri = $('.imgcover img').attr('src');			
			var coverfoto = imgcoveruri.split("/").pop();
					
			var imgmainuri = $('.imgmain img').attr('src');	
			var mainfoto = imgmainuri.split("/").pop();
						
						
			data['titleen']=$("#txt_titleen").val();
			data['titlear']=$("#txt_titlear").val();
			
			data['hotel']=$("#txt_hoteltype").val();
			
			data['duration']=$("#txt_duration").val();
			data['person']=$("#txt_persons").val();
			data['price']=$("#txt_price").val();
						
			data['coverimage']=coverfoto;
			data['mainimage']=mainfoto;
						
						
			data['texten']= CKEDITOR.instances["txt_texten"].getData();
			data['textar']= CKEDITOR.instances["txt_textar"].getData();	

			if( $("#dtitleen").val() != '' && $("#dtitlear").val() !='' )
			{
				if( CKEDITOR.instances["dtexten"].getData() !='' && CKEDITOR.instances["dtextar"].getData() != '' )
				{
					data['dtitleen']=$("#dtitleen").val();
					data['dtitlear']=$("#dtitlear").val();
					data['dtexten']= CKEDITOR.instances["dtexten"].getData();
					data['dtextar']= CKEDITOR.instances["dtextar"].getData();
				}				
			}
			
			
			//alert(data); return false;
			
				$.post(base_url +'/'+ lang + '/admin/createTour',data, function(data,status){
					
				})
				.success(function(data){
					$(location).attr('href', base_url +'/'+ lang + '/admin/tours');					
				})
				 .fail(function(){
					console.log("ERROR");
					return false;
				 });		
		});
			
	});
	
	
</script>
  
  
  
<script type="text/javascript" src="<?php echo base_url(); ?>js/jqueryupluadify.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/uploadify.css" />

<script>
  $(function () {
	 
	$("#coverimage").uploadify({
		"buttonText": "Upload",
		"swf"      : "<?php echo base_url(); ?>images/resource/uploadify.swf",
		"uploader" : "<?php echo base_url(); ?>images/resource/uploadify.php?gt=1",
		"onUploadSuccess" : function(file, response, data) {
			$(".cover-upload").html("<img src='"+base_url+"/images/resource/"+response+"' width='370px' /><input name='iconImage' type='hidden' value='"+response+"' />");
			$(".uploadify-queue").html("");
		}
	});
	
	  
	$("#mainimage").uploadify({
		"buttonText": "Upload",
		"swf"      : "<?php echo base_url(); ?>images/resource/uploadify.swf",
		"uploader" : "<?php echo base_url(); ?>images/resource/uploadify.php?gt=1",
		"onUploadSuccess" : function(file, response, data) {
			$(".main-upload").html("<img src='"+base_url+"/images/resource/"+response+"' width='1600px' /><input name='mainImage' type='hidden' value='"+response+"' />");
			$(".uploadify-queue").html("");
		}
	});
	
	$("#homepageimage").uploadify({
		"buttonText": "Upload",
		"swf"      : "<?php echo base_url(); ?>images/resource/uploadify.swf",
		"uploader" : "<?php echo base_url(); ?>images/resource/uploadify.php?gt=1",
		"onUploadSuccess" : function(file, response, data) {
			$(".tour-upload").html("<img src='"+base_url+"/images/resource/"+response+"' width='400' /><input name='tourbasic' type='hidden' value='"+response+"' />");
			$(".uploadify-queue").html("");
		}
	});
	
});
</script>  

  
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
  <script>
  $(function () {
    CKEDITOR.replace('txt_texten');
    $(".textarea").wysihtml5();
  });
  
   $(function () {
    CKEDITOR.replace('txt_textar');
    $(".textarea").wysihtml5();
  
    });
	
	$(function () {
    CKEDITOR.replace('dtexten');
    $(".textarea").wysihtml5();
  
    });
	
	$(function () {
    CKEDITOR.replace('dtextar');
    $(".textarea").wysihtml5();
  
    });

	
</script>
