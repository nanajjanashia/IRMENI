
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
  <section class="content">

	 <div class="box box-warning">
	 
	 
		<?php  if( isset($service) && !empty($service) ){ ?>
            <div class="box-header with-border">
              <h3 class="box-title">Update Service Page</h3>
            </div>
			
            <div class="box-body">
			  
                <div class="form-group">
                  <label>service title english</label>
				  <input id="service_id" type="hidden" value="<?php echo $service[0]->id;?>">
                  <input id="txt_titleen" type="text" class="form-control" placeholder="" value="<?php echo $service[0]->titleen;?>">
                </div>
				
                <div class="form-group">
                  <label>service title arabian</label>
                  <input id="txt_titlear" type="text" class="form-control" placeholder="" value="<?php echo $service[0]->titlear;?>">
                </div>		
				<hr>
				<div class="box-body">
					<label>Icon image(type = .png). Dimensions (22X30)</label>
					<input type="file" name="file_upload" id="icon" />
					<div class="icon-upload iconsrc" style="background:#71a865 none repeat scroll 0 0;  padding:0 0 10px 10px; width:200px" ><br>				
						<img src='<?php echo base_url(); ?>images/resource/<?php echo $service[0]->icon;?>' width='22px' />
					</div>
					<br>
				</div>
			
			</div>
		
				<br><br>
				<hr>
			<div class="box-body">
				<label>Cover image(type = .jpg) Dimensions (270X346)</label>
				<input type="file" name="file_upload" id="picture" />
				<div class="main-upload imgsrc"><br>				
					<img src='<?php echo base_url(); ?>images/resource/<?php echo $service[0]->coverfoto;?>' width='270px' />
				<br>
				</div>
			</div>
				
           <br>
		   <hr>				   
			
			<div class="box-body">
				<label>Upload Big Image(type = .jpg). Dimensions (730X407)</label>
				<input type="file" name="file_upload" id="bigImage" />
				<div class="main-upload-big"><br>				
					<?php if( !empty($service[0]->bigimages) )
						{ 
							$bigimgs = explode("&",$service[0]->bigimages);
							
							foreach( $bigimgs as $k=>$v )
							{
								echo "<div class='bigImg'><img src=".base_url()."/images/resource/". $v." width='730px' /><input name='bigimg' type='hidden' value='".$v."' /><span style='width:730px;' class='btn btn-block btn-success btn-xs imgDelete'>delete</span></div>";
							}
						}
					?>
				
				<br>
				</div>
			</div>
			<hr>
			<div class="box-body">
				<label>Upload Small Image(type = .jpg). Dimensions (110X110)</label>
				<input type="file" name="file_upload" id="smallImage" />
				<div class='main-upload-small'><br>
				<?php 
					if( !empty($service[0]->smallimages) )
					{
						$smallimgs = explode("&",$service[0]->smallimages);
						foreach( $smallimgs as $k=>$v )
						{
							echo "	
								<div class='smallImg'><img src='".base_url()."/images/resource/". $v."' width='110' /><input name='smallimg' type='hidden' value='".$v."' /><span  style='width:110px;' class='btn btn-block btn-success btn-xs imgDelete'>delete</span></div>
							";
						}
					}						
					
					?>
			</div>
			</div>	
			<hr>
			<div class="box-header">
              <h3 class="box-title">SERVICE TEXT ENGLISH
                <small>(edit text)</small>
              </h3>
			  
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
			  
            </div>
			<div class="box-body pad">
              <form>
                    <textarea id="txt_texten" name="editor1" rows="10" cols="80">
                                            
                    </textarea>
              </form>
            </div>	
			<hr>
			<div class="box-header">
              <h3 class="box-title">SERVICE TEXT ARABIAN
                <small>(edit text)</small>
              </h3>
			  
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
			  
            </div>
			<div class="box-body pad">
              <form>
                    <textarea id="txt_textar" name="editor1" rows="10" cols="80">
                                            
                    </textarea>
              </form>
            </div>				
		<?php } ?>	
		<hr>
	  <div class="box-body">
		<div class="col-md-1">
			<button id="btn-servicecnt" class="btn btn-block btn-success btn-lg" type="button">Update</button>
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
			
		$("#btn-servicecnt").click(function(){
			
			if( typeof $('.imgsrc img').attr('src') == 'undefined' )
			{
				alert("Upload main image"); return false;
			}
			if( typeof $('.iconsrc img').attr('src') == 'undefined' )
			{
				alert("Upload Icon image"); return false;
			}
			if( $("[name='bigimg']").serialize() == "" || $("[name='smallimg']").serialize() == "")
			{
				alert("upload at list one image");
			}
			if(CKEDITOR.instances["txt_texten"].getData() == "" || CKEDITOR.instances["txt_textar"].getData() == "")
			{
				alert("Fill texts"); return false;
			}
			
			var imguri = $('.imgsrc img').attr('src');			
			var coverfoto = imguri.split("/").pop();
			
			var iconuri = $('.iconsrc img').attr('src');			
			var iconfoto = iconuri.split("/").pop();
			
			
			data['id']=$("#service_id").val();
			data['titleen']=$("#txt_titleen").val();
			data['titlear']=$("#txt_titlear").val();
			data['coverfoto']=coverfoto;
			data['icon']=iconfoto;			
			data['texten']= CKEDITOR.instances["txt_texten"].getData();
			data['textar']= CKEDITOR.instances["txt_textar"].getData();			
			data["bigimages"] = $("[name='bigimg']").serialize();
			data["smallimages"] = $("[name='smallimg']").serialize();
			
				$.post(base_url +'/'+ lang + '/admin/updateService',data, function(data,status){
					
				})
				.success(function(data){
					$(location).attr('href', base_url +'/'+ lang + '/admin/services');					
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
	  
	$("#icon").uploadify({
		"buttonText": "Upload",
		"swf"      : "<?php echo base_url(); ?>images/resource/uploadify.swf",
		"uploader" : "<?php echo base_url(); ?>images/resource/uploadify.php?gt=1",
		"onUploadSuccess" : function(file, response, data) {
			$(".icon-upload").html("<img src='"+base_url+"/images/resource/"+response+"' width='22px' /><input name='iconImage' type='hidden' value='"+response+"' />");
			$(".uploadify-queue").html("");
		}
	});
	  
	  
	$("#picture").uploadify({
		"buttonText": "Upload",
		"swf"      : "<?php echo base_url(); ?>images/resource/uploadify.swf",
		"uploader" : "<?php echo base_url(); ?>images/resource/uploadify.php?gt=1",
		"onUploadSuccess" : function(file, response, data) {
			$(".main-upload").html("<img src='"+base_url+"/images/resource/"+response+"' width='270' /><input name='mainImage' type='hidden' value='"+response+"' />");
			$(".uploadify-queue").html("");
		}
	});
		
	$("#bigImage").uploadify({
            "buttonText": "Upload",
            "swf"      : "<?php echo base_url(); ?>images/resource/uploadify.swf",
            "uploader" : "<?php echo base_url(); ?>images/resource/uploadify.php?gt=1",
            "onUploadSuccess" : function(file, response, data) {
                $(".main-upload-big").append("<div class='bigImg'><img src='"+base_url+"/images/resource/"+response+"' width='730px' /><input name='bigimg' type='hidden' value='"+response+"' /><span style='width:730px;' class='btn btn-block btn-success btn-xs imgDelete'>delete</span></div>");
                $(".uploadify-queue").html("");
            }
        });
		
		$(document).on("click", ".imgDelete", function(){
			
			$(this).parent().remove();
			
		});
		
		
	$("#smallImage").uploadify({
            "buttonText": "Upload",
            "swf"      : "<?php echo base_url(); ?>images/resource/uploadify.swf",
            "uploader" : "<?php echo base_url(); ?>images/resource/uploadify.php?gt=1",
            "onUploadSuccess" : function(file, response, data) {
                $(".main-upload-small").append("<div class='smallImg'><img src='"+base_url+"/images/resource/"+response+"' width='110px' /><input name='smallimg' type='hidden' value='"+response+"' /><span style='width:110px;' class='btn btn-block btn-success btn-xs imgDelete'>delete</span></div>");
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

	
</script>
