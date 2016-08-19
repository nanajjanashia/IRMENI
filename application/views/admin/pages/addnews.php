
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
  
	   
  <section class="content">

	 <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">News update</h3>
            </div>
			
            <div class="box-body">
              <form role="form">
			  
                <div class="form-group">
                  <label>Title english</label>
                  <input id="txt_titleen" type="text" class="form-control" placeholder="" value="">
                </div>
				
                <div class="form-group">
                  <label>Title arabian</label>
                  <input id="txt_titlear" type="text" class="form-control" placeholder="" value="">
                </div>
				
				
                <div class="form-group">
                  <label>Short text english</label>
                  <textarea id="txt_shorttexten" class="form-control" rows="3" placeholder=""></textarea>
                </div>		
				
                <div class="form-group">
                  <label>Short text arabian</label>
                  <textarea id="txt_shorttextar" class="form-control" rows="3" placeholder=""></textarea>
                </div>
			</div>
			
			<div class="box-body">
				<label>Upload cover image. dimensions(370X308)</label>
				<input type="file" name="file_upload" id="picture" />
				<div class="main-upload imgsrc">	

				</div>
			</div>
			
			<div class="box-body">
				<label>Upload content image. dimensions(770X419)</label>
				<input type="file" name="file_upload" id="cntimage" />
				<div class="main-upload-content imgcntsrc">	

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
			 			  
            </div>
            <div class="box-body pad">
              <form>
                    <textarea id="txt_longtexten" name="txt_longtexten" rows="10" cols="80"></textarea>
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
			  	  
            </div>
            <div class="box-body pad">
              <form>
                    <textarea id="txt_longtextar" name="txt_longtextar" rows="10" cols="80"></textarea>
              </form>
            </div>			
          </div>
        </div>
      </div>
	  
	  
	  <div class="row">
		<div class="col-md-1">
			<button id="btn-save" class="btn btn-block btn-success btn-lg" type="button">Save</button>
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
			
		$("#btn-save").click(function(){
			
			
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
			
			data['titleen']=$("#txt_titleen").val();
			data['titlear']=$("#txt_titlear").val();
			data['shorttexten']=$("#txt_shorttexten").val();
			data['shorttextar']=$("#txt_shorttextar").val();
			data['longtexten']= CKEDITOR.instances["txt_longtexten"].getData();
			data['longtextar']= CKEDITOR.instances["txt_longtextar"].getData()
			
		
				
				$.post(base_url+'/'+lang+'/admin/createNews',data, function(data,status){
					
				})				
				 .done(function(r){			
					$(location).attr('href', base_url +'/'+ lang + '/admin/news');
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
                $(".main-upload").html("<img src='"+base_url+"/images/resource/"+response+"' width='370' /><input name='mainImage' type='hidden' value='"+response+"' />");
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


