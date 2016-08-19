
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
  <section class="content">

	 <div class="box box-warning">
	 
	 
            <div class="box-header with-border">
              <h3 class="box-title">CREATE FOTO GALLERY</h3>
            </div>
			
			
            <div class="box-body">
			  
                <div class="form-group">
                  <label>Gallery title english</label>
				  <input id="type_id" type="hidden" value="1">
                  <input id="txt_titleen" type="text" class="form-control" placeholder="" value="">
                </div>
				
                <div class="form-group">
                  <label>Gallery title arabian</label>
                  <input id="txt_titlear" type="text" class="form-control" placeholder="" value="">
                </div>
			</div>
				<hr>
			<div class="box-body">
				<label>Cover image(type = .jpg) Dimensions (370X383)</label>
				<input type="file" name="file_upload" id="picture" />
				<div class="main-upload imgsrc"><br>				
					
				<br>
				</div>
			</div>				
           <br>
		   <hr>	
			<div class="box-body">
				<label>Album images (type = .jpg). Dimensions (1000 X 800)</label>
				<input type="file" name="file_upload" id="images" />
				<div class="main-upload-images"><br><hr>	
					
				</div>
			</div>
				
		<hr>
	  <div class="box-body">
		<div class="col-md-1">
			<button id="btn-Fgallery" class="btn btn-block btn-success btn-lg" type="button">create</button>
		</div>
	  </div>
  </div>	  
</section>
	
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  
  <script> 

	$( document ).ready(function() {
			var base_url = window.location.origin;
			data = new Object();
			
		$("#btn-Fgallery").click(function(){
			
			if($('.imgsrc img').attr('src') == "" || $("#txt_titleen").val() == "" || $("#txt_titlear").val() == "" || $("[name='img']").serialize() == "")
			{
				alert("Fill all fields!"); return false;
			}
			
			var imguri = $('.imgsrc img').attr('src');			
			var coverfoto = imguri.split("/").pop();						
			
			data['titleen']=$("#txt_titleen").val();
			data['titlear']=$("#txt_titlear").val();
			data['coverfoto']=coverfoto;			
			data['type'] = $("#type_id").val();
			
			data["images_video"] = $("[name='img']").serialize();
			
			
				$.post(base_url +'/'+ lang + '/admin/createFotoGallery',data, function(data,status){
					
				})
				.success(function(data){
					$(location).attr('href', base_url +'/'+ lang + '/admin/gallery');					
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
	$("#picture").uploadify({
		"buttonText": "Upload",
		"swf"      : "<?php echo base_url(); ?>images/resource/uploadify.swf",
		"uploader" : "<?php echo base_url(); ?>images/resource/uploadify.php?gt=1",
		"onUploadSuccess" : function(file, response, data) {
			$(".main-upload").html("<img src='"+base_url+"/images/resource/"+response+"' width='270' /><input name='mainImage' type='hidden' value='"+response+"' />");
			$(".uploadify-queue").html("");
		}
	});
		
	$("#images").uploadify({
            "buttonText": "Upload",
            "swf"      : "<?php echo base_url(); ?>images/resource/uploadify.swf",
            "uploader" : "<?php echo base_url(); ?>images/resource/uploadify.php?gt=1",
            "onUploadSuccess" : function(file, response, data) {
                $(".main-upload-images").append("<div class='Img'><img src='"+base_url+"/images/resource/"+response+"' width='730px' /><input name='img' type='hidden' value='"+response+"' /><span style='width:730px;' class='btn btn-block btn-success btn-xs imgDelete'>delete</span></div>");
                $(".uploadify-queue").html("");
            }
        });
		
		$(document).on("click", ".imgDelete", function(){
			
			var r = confirm("Are you sure you want to delete?");
			if (r == true) {
				$(this).parent().remove();
			} else {
				
			}
			
			
			
		});

  });
</script>  
