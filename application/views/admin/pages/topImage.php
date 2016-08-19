
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
  <section class="content">

	 <div class="box box-warning">
	 
            <div class="box-header with-border">
              <h3 class="box-title">ADD TOP BACKGROUND IMAGE</h3>
            </div>
			<?php if(isset($topimage) && !empty($topimage) ){ ?>
			<div class="box-body">
				<input id="top_id" type="hidden" value="<?php echo $topimage[0]->id; ?>">
				<label>Cover image(type = .jpg) Dimensions (1600X119)</label>
				<input type="file" name="file_upload" id="picture" />
				<div class="main-upload pagetopsrc"><br>				
					<img src='<?php echo base_url(); ?>images/resource/<?php echo $topimage[0]->image;?>' width='900px' />
				<br>
				</div>
			</div>
			<?php } ?>
	
		
	  <div class="box-body">
		<div class="col-md-1">
			<button id="btn-updatetopbkg" class="btn btn-block btn-success btn-lg" type="button">Update</button>
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
			
		$("#btn-updatetopbkg").click(function(){
			
		
				
			if(  typeof ($('.pagetopsrc img').attr('src')) != 'undefined' )
			{
				var basicimguri = $('.pagetopsrc img').attr('src');			
				basicroomfoto = basicimguri.split("/").pop();
				data['image'] = basicroomfoto;
			}	
			
			data['id'] = $("#top_id").val();
			
			$.post(base_url +'/'+ lang + '/admin/updateTopPageImage',data, function(data,status){
				
			})
			.success(function(data){
				$(location).attr('href', base_url +'/'+ lang + '/admin/topage');					
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
			$(".main-upload").html("<img src='"+base_url+"/images/resource/"+response+"' width='900' /><input name='mainImage' type='hidden' value='"+response+"' />");
			$(".uploadify-queue").html("");
		}
	});

  });
</script>  

