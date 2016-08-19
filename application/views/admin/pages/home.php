<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
    </section>

    <section class="content">
   
		 <div class="box box-warning">
		 
            <div class="box-header with-border">
              <h3 class="box-title">HOME PAGE</h3>
            </div>
	
			<div class="box-body">
				<label>Logo (type = .png)</label>
				<input type="file" name="file_upload" id="picture" />
				<input id="logo_id" type="hidden" value="<?php echo $logo[0]->id;?>">
				<div class="main-upload coversrc"><br>				
					<img src='<?php echo base_url(); ?>images/resource/<?php echo $logo[0]->logo;?>' width='165px' />
				<br>
				</div>
			</div>
			<hr>
			<div class="box-body">
				<label>Logo footer (type = .png)</label>
				<input type="file" name="file_upload" id="logofooter" />
				<input id="logo_id" type="hidden" value="<?php echo $logo[0]->id;?>">
				<div class="main-upload-footer logoftsrc"><br>				
					<img src='<?php echo base_url(); ?>images/resource/<?php echo $logo[0]->footerlogo;?>' width='165px' />
				<br>
				</div>
			</div>
			
			<br>
			 <div class="box-body">
				<div class="col-md-1">
					<button id="btn-updatelogo" class="btn btn-block btn-success btn-lg" type="button">Update</button>
				</div>
			  </div>
			
			<hr>
			
			<div class="box-body">
				
				<div class="box-header with-border">
				  <h3 class="box-title">ADD HOTEL DETAIL</h3><br>
				  <span>If you edit the form below, the information will be changed on main page. Like shown in this picture.</span>
				</div>
				
				<div class="form-group">
                  <img src="<?php echo base_url();?>/images/about-hotel1.jpg" width="772px">
                </div>
			</div>
			<?php 
				if( isset($abouthotel) ){
			?>
			<hr>
			<div class="box-header">
				<input id="htl_id" type='hidden' value="<?php echo $abouthotel[0]->id?>">
              <h3 class="box-title">HOTEL DISCRIPTION ENGLISH
                <small>(edit text)</small>
              </h3>
			
			    <div class="box-body pad">
				  <form>
						<textarea id="txt_texten" name="editor1" rows="10" cols="80">
								   <?php echo $abouthotel[0]->texten;?>            
						</textarea>
				  </form>
				</div>
            </div>
			
			
			<div class="box-body pad">
				<h3 class="box-title">HOTEL DISCRIPTION ARABIAN
				   <small>(edit text)</small>
				</h3>
			  
              <form>
                    <textarea id="txt_textar" name="editor1" rows="10" cols="80">
                                   <?php echo $abouthotel[0]->textar;?>         
                    </textarea>
              </form>
            </div>	
			<hr>
		<?php } ?>
		
	  <div class="box-body">
		<div class="col-md-1">
			<button id="btn-updatehtl" class="btn btn-block btn-success btn-lg" type="button">Update</button>
		</div>
	  </div>
	  
  </div>
  
  
	<!-- update footer hotel about widget-->
	 <div class="box box-warning">
		 
            <div class="box-header with-border">
              <h3 class="box-title">HOME PAGE</h3>
            </div>
			
			<div class="box-body">
				
				<div class="box-header with-border">
				  <h3 class="box-title">ADD HOTEL DETAIL FOR FOOTER</h3><br>
				  <span>If you edit the form below, the information will be changed on footer. Like shown in the picture.</span>
				</div>
				
				<div class="form-group">
                  <img src="<?php echo base_url();?>/images/about-footer.jpg" width="772px">
                </div>
			</div>
			<?php 
				if( isset($abouthotelfooter) ){
			?>
			
			
			<hr>
			<div class="box-header">
				<input id="htlfooter_id" type='hidden' value="<?php echo $abouthotelfooter[0]->id?>">
              <h3 class="box-title">HOTEL FOOTER DISCRIPTION ENGLISH
                <small>(edit text)</small>
              </h3>
			  
			  
			
			    <div class="box-body pad">
				  <form>
						<textarea id="txt_ftexten" name="editor1" rows="10" cols="80">
								   <?php echo $abouthotelfooter[0]->texten;?>            
						</textarea>
				  </form>
				</div>
            </div>
			
			
			<div class="box-body pad">
				<h3 class="box-title">HOTEL FOOTER DISCRIPTION ARABIAN
				   <small>(edit text)</small>
				</h3>
			  
              <form>
                    <textarea id="txt_ftextar" name="editor1" rows="10" cols="80">
                                   <?php echo $abouthotelfooter[0]->textar;?>         
                    </textarea>
              </form>
            </div>	
			<hr>
		<?php } ?>
		
	  <div class="box-body">
		<div class="col-md-1">
			<button id="btn-updatehtlfooter" class="btn btn-block btn-success btn-lg" type="button">Update</button>
		</div>
	  </div>
	  
	  
	  <hr>
	  <div class="form-group">
		  <label>Change Copyright</label>
		  <input type="hidden" id="copyright_id" value="<?php echo $copyright[0]->id;?>">
		  <input id="txt_copyright" type="text" class="form-control" placeholder="" value="<?php echo $copyright[0]->name;?>" style="width:auto;">
		</div>
		
		<div class="box-body">
		<div class="col-md-1">
			<button id="btn-copyright" class="btn btn-block btn-success btn-lg" type="button">Update</button>
		</div>
	  </div>
	  
	  
  </div>
   
    </section>
  </div>
 




  <script> 

	$( document ).ready(function() {
			//var base_url = window.location.origin;
			data = new Object; 
			
	$("#btn-copyright").click(function(){
			
			if( $("#txt_copyright").val() == '' )
			{
				alert("Copyright text is empty."); return false;
			}
			
			data['id'] = $("#copyright_id").val();
			data['name']= $("#txt_copyright").val();	
			
			$.post(base_url +'/'+ lang + '/admin/updateCopyright',data, function(data,status){
				
			})
			.success(function(data){
				$(location).attr('href', base_url +'/'+ lang + '/admin');					
			})
			 .fail(function(){
				console.log("ERROR");
				return false;
			});	 
	});
			
		$("#btn-updatehtl").click(function(){
			
			if( CKEDITOR.instances["txt_texten"].getData() == '' && CKEDITOR.instances["txt_textar"].getData() == '')
			{
				alert("Fill texts."); return false;
			}
			
			data['id'] = $("#htl_id").val();
			data['texten']= CKEDITOR.instances["txt_texten"].getData();
			data['textar']= CKEDITOR.instances["txt_textar"].getData();	
			
			$.post(base_url +'/'+ lang + '/admin/updatehtlDisc',data, function(data,status){
				
			})
			.success(function(data){
				$(location).attr('href', base_url +'/'+ lang + '/admin');					
			})
			 .fail(function(){
				console.log("ERROR");
				return false;
			});	 
	});
	
	
		$("#btn-updatehtlfooter").click(function(){
			
			if( CKEDITOR.instances["txt_ftexten"].getData() == '' && CKEDITOR.instances["txt_ftextar"].getData() == '')
			{
				alert("Fill texts."); return false;
			}
			
			data['id'] = $("#htlfooter_id").val();
			data['texten']= CKEDITOR.instances["txt_ftexten"].getData();
			data['textar']= CKEDITOR.instances["txt_ftextar"].getData();	
			
			$.post(base_url +'/'+ lang + '/admin/updatehtlDiscFooter',data, function(data,status){
				
			})
			.success(function(data){
				$(location).attr('href', base_url +'/'+ lang + '/admin');					
			})
			 .fail(function(){
				console.log("ERROR");
				return false;
			});	 
	});
	
	$("#btn-updatelogo").click(function(){
			data = new Object();
			
			
			var fimguri = $('.logoftsrc img').attr('src');			
			footerlogo = fimguri.split("/").pop();
			data['footerlogo'] = footerlogo;
			
			var imguri = $('.coversrc img').attr('src');			
			coverfoto = imguri.split("/").pop();
			data['logo'] = coverfoto;
			data['id'] = $('#logo_id').val();
			
			$.post(base_url +'/'+ lang + '/admin/changeLogo',data, function(data,status){
				
			})
			.success(function(data){
				$(location).attr('href', base_url +'/'+ lang + '/admin');					
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
			$(".main-upload").html("<img src='"+base_url+"/images/resource/"+response+"' width='165' /><input name='mainImage' type='hidden' value='"+response+"' />");
			$(".uploadify-queue").html("");
		}
	});
	
	$("#logofooter").uploadify({
		"buttonText": "Upload",
		"swf"      : "<?php echo base_url(); ?>images/resource/uploadify.swf",
		"uploader" : "<?php echo base_url(); ?>images/resource/uploadify.php?gt=1",
		"onUploadSuccess" : function(file, response, data) {
			$(".main-upload-footer").html("<img src='"+base_url+"/images/resource/"+response+"' width='165' /><input name='mainImage' type='hidden' value='"+response+"' />");
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
    CKEDITOR.replace('txt_ftexten');
    $(".textarea").wysihtml5();
  });
  
  $(function () {
    CKEDITOR.replace('txt_ftextar');
    $(".textarea").wysihtml5();
  
    });
	

	
</script>