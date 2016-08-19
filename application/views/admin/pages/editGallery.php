
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
  <section class="content">

	 <div class="box box-warning">
	 
	 
            <div class="box-header with-border">
              <h3 class="box-title">Update Service Page</h3>
            </div>
			
			<?php if( isset($gallery) && !empty($gallery) ){ ?>
			
            <div class="box-body">
			  
                <div class="form-group">
                  <label>Gallery title english</label>
				  <input id="gallery_id" type="hidden" value="<?php echo $gallery[0]->id; ?>">
				  <input id="gallery_folder" type="hidden" value="<?php echo $gallery[0]->foldername; ?>">
				  <input id="type_id" type="hidden" value="<?php echo $gallery[0]->type; ?>">
                  <input id="txt_titleen" type="text" class="form-control" placeholder="" value="<?php echo $gallery[0]->titleen; ?>">
                </div>
				
                <div class="form-group">
                  <label>Gallery title arabian</label>
                  <input id="txt_titlear" type="text" class="form-control" placeholder="" value="<?php echo $gallery[0]->titlear; ?>">
                </div>
			</div>
				<br><br>
				<hr>
			<div class="box-body">
				<label>Cover image(type = .jpg) Dimensions (370X383)</label>
				<input type="file" name="file_upload" id="picture" />
				<div class="main-upload imgsrc"><br>				
					<img src='<?php echo base_url(); ?>images/<?php echo $gallery[0]->foldername; ?>/<?php echo $gallery[0]->coverfoto; ?>' width='370px' />
				<br>
				</div>
			</div>				
           <br>
		   <hr>	
			<div class="box-body">
				<label>Album images (type = .jpg). Dimensions (1000 X 800)</label>
				<input type="file" name="file_upload" id="images" />
				<div class="main-upload-images"><br><hr>				
					<?php 
							if( $gallery[0]->type == 1 )
							{
								if( empty($gallery[0]->images_video) )
									echo "Image folder is empty";
								
								//$images = explode("&",$gallery[0]->images_video);
								$images = explode("&",$gallery[0]->images_video);
								//var_dump($images); die;
								foreach( $images as $k=>$v )
								{
									echo "<div class='Img'><img src='".base_url()."/images/resource/". $v."' width='1000px' /><input name='img' type='hidden' value='".$v."' /><span style='width:1000px;' class='btn btn-block btn-success btn-xs imgDelete'>delete</span></div>";
								}
							}
							else
							{
								/*
								if( empty($gallery[0]->images_video) )
										echo "(Video folder is empty)"; 
								echo ' <div class="form-group">										  
										  <iframe width="560" height="315" src="'.$gallery[0]->images_video.'" frameborder="0" allowfullscreen></iframe><br><br>
										  <label>Insert below video iframe src link(if you like to change it, else live it empty)</label>
										  <input id="txt_video" type="text" class="form-control" placeholder="" value="">
									   </div>';
									   */
							}
					
					?>
				
				<br>
				</div>
			</div>
				
		<hr>
	  <div class="box-body">
		<div class="col-md-1">
			<button id="btn-gallery" class="btn btn-block btn-success btn-lg" type="button">Update</button>
		</div>
	  </div>
	<?php } ?>
  </div>	  
</section>
	
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  
  <script> 

	$( document ).ready(function() {
			var base_url = window.location.origin;
			data = new Object();
			
		$("#btn-gallery").click(function(){
			
			var imguri = $('.imgsrc img').attr('src');			
			var coverfoto = imguri.split("/").pop();						
			
			data['id']=$("#gallery_id").val();
			data['foldername']=$("#gallery_folder").val();
			data['titleen']=$("#txt_titleen").val();
			data['titlear']=$("#txt_titlear").val();
			data['coverfoto']=coverfoto;			
			data['type'] = $("#type_id").val();
			
			if( data['type'] == 1 )
			{
				data["images_video"] = $("[name='img']").serialize();
			}
			else
			{
				if( $("#txt_video").val() != '' ) data['images_video']=$("#txt_video").val();
					
			}
			
				$.post(base_url +'/'+ lang + '/admin/updateGallery',data, function(data,status){
					
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

