
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
  


	
	<?php
	$url = base_url();
	if( isset($singlenews) ){ ?>
	   
  <section class="content">

	 <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">News update</h3>
            </div>
			
            <div class="box-body">
              <form role="form">
			  
                <div class="form-group">
                  <label>title english</label>
				  <input id="news_id" type="hidden" value="<?php echo $singlenews[0]->id; ?>">
                  <input id="txt_titleen" type="text" class="form-control" placeholder="" value="<?php echo $singlenews[0]->titleen; ?>">
                </div>
				
                <div class="form-group">
                  <label>title arabian</label>
                  <input id="txt_titlear" type="text" class="form-control" placeholder="" value="<?php echo $singlenews[0]->titlear; ?>">
                </div>
				
				
                <div class="form-group">
                  <label>short text english</label>
                  <textarea id="txt_shorttexten" class="form-control" rows="3" placeholder=""><?php echo $singlenews[0]->shorttexten; ?></textarea>
                </div>		
				
                <div class="form-group">
                  <label>short text arabian</label>
                  <textarea id="txt_shorttextar" class="form-control" rows="3" placeholder=""><?php echo $singlenews[0]->shorttextar; ?></textarea>
                </div>
			</div>
			
			<div class="box-body">
				<label>Cover image. dimensions(370X308)</label>
				<input type="file" name="file_upload" id="picture" />
				<div class="main-upload imgsrc"><br>				
					<img src='<?php echo base_url(); ?>images/resource/<?php echo $singlenews[0]->imgsrc; ?>' width='250' />
				<br>
				</div>
			</div>
			
			<div class="box-body">
				<label>Content image. dimensions(770X419)</label>
				<input type="file" name="file_upload" id="cntimage" />
				<div class="main-upload-content imgcntsrc">	
					<img src='<?php echo base_url(); ?>images/resource/<?php echo $singlenews[0]->cntimage; ?>' width='500' />
				</div>
			</div>
			
	  </div>
	 
	
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
		  
            <div class="box-header">
              <h3 class="box-title">LONG TEXT ENGLISH
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
                    <textarea id="txt_longtexten" name="editor1" rows="10" cols="80">
                                            <?php print_r($singlenews[0]->longtexten); ?>
                    </textarea>
              </form>
            </div>			
          </div>
        </div>
      </div>
	  
	  
	    <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
		  
            <div class="box-header">
              <h3 class="box-title">LONG TEXT ARABIAN
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
                    <textarea id="txt_longtextar" name="editor2" rows="10" cols="80">
                                            <?php print_r($singlenews[0]->longtextar); ?>
                    </textarea>
              </form>
            </div>			
          </div>
        </div>
      </div>
	  
	  
	  <div class="row">
		<div class="col-md-1">
			<button id="btn-update" class="btn btn-block btn-success btn-lg" type="button">Update</button>
		</div
	  </div>
	  
	</section>
	
	<?php   }  ?>
	
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  
  <script> 

	$( document ).ready(function() {
			var base_url = window.location.origin;
			data = new Object();
			
		$("#btn-update").click(function(){
			
			if( typeof $('.imgsrc img').attr('src') == 'undefined' )
			{
				alert("Upload cover image"); return false;
			}
			
			if( typeof $('.imgcntsrc img').attr('src') == 'undefined' )
			{
				alert("Upload content image"); return false;
			}
			
			if($("#txt_titleen").val() == '' || $("#txt_titlear").val() == '' )
			{
				alert("Fill titles"); return false;
			}
			
			if($("#txt_shorttexten").val() == '' || $("#txt_shorttextar").val() == '' )
			{
				alert("Fill texts"); return false;
			}
			
			var imguri = $('.imgsrc img').attr('src');			
				data['imgsrc']=imguri.split("/").pop();
				
			var imgcnturi = $('.imgcntsrc img').attr('src');
			data['cntimage'] = imgcnturi.split("/").pop();
						
			data['id']=$("#news_id").val();
			data['titleen']=$("#txt_titleen").val();
			data['titlear']=$("#txt_titlear").val();
			data['shorttexten']=$("#txt_shorttexten").val();
			data['shorttextar']=$("#txt_shorttextar").val();
			data['longtexten']= CKEDITOR.instances["txt_longtexten"].getData();
			data['longtextar']= CKEDITOR.instances["txt_longtextar"].getData();
			
				$.post(base_url +'/'+ lang + '/admin/updateNews',data, function(data,status){
					
				})				
				 .done(function(r){
					try{
						var obj = jQuery.parseJSON( r );
						if(obj.success == 'true')
						{
							$(location).attr('href', base_url +'/'+ lang + '/admin/news');
						}
					}catch(err){
						 alert( err.message );
					}
						
				 return false;
				 })
				 .fail(function(){
					console.log("ERROR");
					return false;
				 })
				 .always(function(){
					return false;
				 })
				 
			
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
                $(".main-upload").html("<img src='"+base_url+"/images/resource/"+response+"' width='190' /><input name='mainImage' type='hidden' value='"+response+"' />");
                $(".uploadify-queue").html("");
            }
        });
		
		$("#cntimage").uploadify({
            "buttonText": "Upload",
            "swf"      : "<?php echo base_url(); ?>images/resource/uploadify.swf",
            "uploader" : "<?php echo base_url(); ?>images/resource/uploadify.php?gt=1",
            "onUploadSuccess" : function(file, response, data) {
                $(".main-upload-content").html("<img src='"+base_url+"/images/resource/"+response+"' width='400' /><input name='mainImage' type='hidden' value='"+response+"' />");
                $(".uploadify-queue").html("");
            }
        });
		
  });
</script>  
  
<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
  <script>
  $(function () {
    CKEDITOR.replace('txt_longtexten');
    $(".textarea").wysihtml5();
  });
  
   $(function () {
    CKEDITOR.replace('txt_longtextar');
    $(".textarea").wysihtml5();
  });
</script>


