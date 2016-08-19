
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
  <section class="content">

	 <div class="box box-warning">
	 
	 
	 <?php if( isset($rooms) && !empty($rooms) ){?>
	 
            <div class="box-header with-border">
              <h3 class="box-title">ADD NEW ROOM</h3>
            </div>
			
            <div class="box-body">
			  
                <div class="form-group">
                  <label>Room Number</label>
				  <input id="room_id" type="hidden" value="<?php echo $rooms[0]->id;?>">
                  <input id="txt_roomnumber" type="text" class="form-control" placeholder="" value="<?php echo $rooms[0]->roomnumber;?>" style="width:auto;">
                </div>
				
				<div class="form-group dropdown">				
					<label>Room Type</label>
					<select id="roomtype" class="form-control priority" style="display:block; width:auto;">
						<option value="0">Select room type</option>
						<?php
						if( isset($roomtypes) && !empty($roomtypes) )
						{
							foreach( $roomtypes as $k=>$v )
							{
								echo '<option value="'.$v->id.'">'.$v->type.'</option>';
							}
						}
						?>
					</select>
								
				</div>
				
                <div class="form-group">
                  <label>Adults</label>
                  <input id="txt_adults" type="text" class="form-control" placeholder="" value="<?php echo $rooms[0]->adults;?>" style="width:auto;">
                </div>	
					
				<div class="form-group">
                  <label>Kids</label>
                  <input id="txt_kids" type="text" class="form-control" placeholder="" value="<?php echo $rooms[0]->kids;?>" style="width:auto;">
                </div>	
				
				<div class="form-group">
                  <label>Price</label>
                  <input id="txt_price" type="text" class="form-control" placeholder="" value="<?php echo $rooms[0]->price;?>" style="width:auto;">
                </div>	
				
				<div class="form-group">
				<label>Icons</label><br>
					<?php 
						if( !empty($rooms[0]->icons) )
						{
							$icn = explode(",",$rooms[0]->icons);
							
								if( $v != '' )
								{
									foreach( $icons as $p=>$c )
										{
											
											if( $v = $c->icon )
											{
												if(in_array($c->icon, $icn)){
													echo "<label><input type='checkbox' class='ckbicons' id='cbox".$c->id."' checked='checked' value='".$c->icon."'> ".$c->icon."</i></label><br>";
												}else{
													echo "<label><input type='checkbox' class='ckbicons' id='cbox".$c->id."' value='".$c->icon."'> ".$c->icon."</i></label><br>";
												}
												
											}
										}
								}
						}
						
					?>
                </div>	
				
 <script>
		
	data = new Object();
 
 	$('.ckbicons').change(function(){
		
			var icons = [];			
			$(".ckbicons:checked").each(function(){
				icons.push( $(this).val() );
			});
			data['icons'] = icons.toString();
		});

  </script>
  
			</div>
				<br>
				<hr>
			<div class="box-body">
				<label>Cover image(type = .jpg) Dimensions (370X260)</label>
				<input type="file" name="file_upload" id="picture" />
				<div class="main-upload coversrc"><br>				
					<img src='<?php echo base_url(); ?>images/resource/<?php echo $rooms[0]->coverimage;?>' width='270px' />
				<br>
				</div>
			</div>
				
           <br>
		   <hr>				   
			
			<div class="box-body">
				<label>Upload Big Image(type = .jpg). Dimensions (1600X609)</label>
				<input type="file" name="file_upload" id="bigImage" />
				<div class="main-upload-big bigsrc"><br>				
					<?php if( !empty($rooms[0]->bigimages) )
						{ 
							$bigimgs = explode("&",$rooms[0]->bigimages);
							foreach( $bigimgs as $k=>$v )
							{
								echo "<div class='bigImg'><img src='".base_url()."/images/resource/". $v."' width='600px' /><input name='bigimg' type='hidden' value='".$v."' /><span style='width:600px;' class='btn btn-block btn-success btn-xs imgDelete'>delete</span></div>";
							}
						}
					?>			
				<br>
				</div>
			</div>
			<hr>
			<div class="box-body">
				<label>Upload Small Image(type = .jpg). Dimensions (170X152)</label>
				<input type="file" name="file_upload" id="smallImage" />
				<div class='main-upload-small smallsrc'><br>
					
					<?php 
					if( !empty($rooms[0]->smallimages) )
					{
						$smallimgs = explode("&",$rooms[0]->smallimages);
						foreach( $smallimgs as $k=>$v )
						{
							echo "	
								<div class='smallImg'><img src='".base_url()."/images/resource/". $v."' width='170' /><input name='smallimg' type='hidden' value='".$v."' /><span  style='width:170px;' class='btn btn-block btn-success btn-xs imgDelete'>delete</span></div>
							";
						}
					}						
					
					?>
					
			</div>
			</div>	
			
			<hr>
			<div class="box-body">
				<label>Upload footer image(type = .jpg). Dimensions (270X86)</label>
				<input type="file" name="file_upload" id="footerImgRoom" />
				<div class="main-upload-footer footersrc"><br>				
					<img src='<?php echo base_url(); ?>images/resource/<?php echo $rooms[0]->footerimage;?>' width='270px' />
				</div>
				<br>
			</div>
			
			<hr>
			<div class="box-header">
              <h3 class="box-title">ROOM TEXT ENGLISH
                <small>(edit text)</small>
              </h3>
            </div>
			<div class="box-body pad">
              <form>
                    <textarea id="txt_texten" name="editor1" rows="10" cols="80">
                                 <?php echo $rooms[0]->texten;?>           
                    </textarea>
              </form>
            </div>	
			<hr>
			<div class="box-header">
              <h3 class="box-title">ROOM TEXT ARABIAN
                <small>(edit text)</small>
              </h3>
            </div>
			<div class="box-body pad">
              <form>
                    <textarea id="txt_textar" name="editor1" rows="10" cols="80">
                                   <?php echo $rooms[0]->textar;?>            
                    </textarea>
              </form>
            </div>	
		<br>
		<hr>
		<div class="box-body">
			<div class="checkbox">
				<label><input type="checkbox" id="showonmainpage">Show on Main Page</label>
			</div>
		</div>
		
		<div id="roommain" class="box-body" style="display:none;">
			<label>Room image that will appear on main page(type = .jpg) Dimensions (470X586)</label>
			<input type="file" name="file_upload" id="homeroomimage" />
			<div class="room-upload roombasic"><br>		
				<?php if(!empty($rooms[0]->homeimage)){ ?>
				<img src='<?php echo base_url(); ?>images/resource/<?php echo $rooms[0]->homeimage;?>' width='470px' />
				<?php } ?>
			</div>
		</div>
		
		
		<hr>
			<div class="box-body">
				
				<div class="box-header with-border">
				  <h3 class="box-title">ADD ROOM DETAIL</h3><br>
				  <span>If you fill the form below, the information will display on the page, like shown in this picture. <br>If the form is empty, it will not appear at all.</span>
				</div>
				
				<div class="form-group">
                  <img src="<?php echo base_url();?>/images/room-detail.jpg" width="1170px">
                </div>
				
				<hr>
				<div class="box-header">
              <h3 class="box-title">ROOM DATAIL TEXT ENGLISH
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
                    <textarea id="dtexten" name="editor1" rows="10" cols="80">
                                   <?php echo $rooms[0]->dtexten;?>            
                    </textarea>
              </form>
            </div>	
			
			<div class="box-header">
              <h3 class="box-title">ROOM DATAIL TEXT ARABIAN
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
                    <textarea id="dtextar" name="editor1" rows="10" cols="80">
                                      <?php echo $rooms[0]->dtexten;?>         
                    </textarea>
              </form>
            </div>	
			</div>
		
		
	  <div class="box-body">
		<div class="col-md-1">
			<button id="btn-updateroom" class="btn btn-block btn-success btn-lg" type="button">Update</button>
		</div>
	  </div>
	  
	 <?php }?>
	  
  </div>	  
</section>
	
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
    <script type="text/javascript">
		$(document).ready(function() {
			var mainrommimage = '<?php echo $rooms[0]->homeimage; ?>';
			if( mainrommimage != '' )
			{
				$('#showonmainpage').prop('checked', true);
				$('#roommain').css('display','block');
			}
			
			
			$("#roomtype").val(<?php echo $rooms[0]->roomtypeid;?>);
			
			$('#showonmainpage').change(function() {
				if ($(this).prop('checked')) {
				$("#roommain").css("display","block");
				}
				else {
					 $("#roommain").css("display","none");
				}
			});
		});
	</script>
  
  
  <script> 

	$( document ).ready(function() {
			var base_url = window.location.origin;
			
			
		$("#btn-updateroom").click(function(){
			
			if( $("#txt_roomnumber").val() == '' || isNaN($('#txt_roomnumber').val() ))
			{
				alert("Room number is empty or incorrect"); return false;
			}
			
			if( $("#roomtype").val() < 1 )
			{
				alert("Room type not selected, please select from drop down menu!"); return false;
			}
			
			if( $("#txt_adults").val() == '' || isNaN($('#txt_adults').val()) )
			{
				alert("Please, specify how many adults included."); return false;
			}
			
			if( $("#txt_kids").val() == '' || isNaN($('#txt_kids').val()) )
			{
				alert("Please, specify how many kids included."); return false;
			}
			
			if( $("#txt_price").val() == ''  || isNaN($('#txt_price').val()) )
			{
				alert("Price not specified or it is not invalid format."); return false;
			}
				
			if( data['icons'] == '' )
			{
				alert("Choose at list one icon."); return false;
			}
			
			if( $('.coversrc img').attr('src') == '' )
			{
				alert("Upload Room Cover Image!"); return false;
			}
			
					
			if( $("[name='bigimg']").serialize() == '' || $("[name='smallimg']").serialize() == '' )
			{
				alert("Upload at list one small and big images."); return false;
			}
			
			if($('.footersrc img').attr('src') == '')
			{
				alert("Upload footer image."); return false;
			}	
			
			if( CKEDITOR.instances["txt_texten"].getData() == '' && CKEDITOR.instances["txt_textar"].getData() == '')
			{
				alert("Fill texts."); return false;
			}
			
			if( CKEDITOR.instances["dtexten"].getData()  != '' && CKEDITOR.instances["dtextar"].getData() != '')
			{
				data['dtexten']= CKEDITOR.instances["dtexten"].getData();
				data['dtextar']= CKEDITOR.instances["dtextar"].getData();	
			}
			
			
			if(  typeof ($('.roombasic img').attr('src')) != 'undefined' )
			{
				var basicimguri = $('.roombasic img').attr('src');	
				basicroomfoto = basicimguri.split("/").pop();
				data['homeimage'] = basicroomfoto;
			}	
			data['id'] = $("#room_id").val();
			data['roomnumber'] = $("#txt_roomnumber").val();
			data['roomtypeid'] = $("#roomtype").val();
			data['adults'] = $("#txt_adults").val();
			data['kids'] = $("#txt_kids").val();
			data['price'] = $("#txt_price").val();
					
			var imguri = $('.coversrc img').attr('src');			
			coverfoto = imguri.split("/").pop();
			data['coverimage'] = coverfoto;
			
			data["bigimages"] = $("[name='bigimg']").serialize();
			data["smallimages"] = $("[name='smallimg']").serialize();
			
			var ftimguri = $('.footersrc img').attr('src');			
			footerfoto = ftimguri.split("/").pop();
			data["footerimage"] = footerfoto;
			
			data['texten']= CKEDITOR.instances["txt_texten"].getData();
			data['textar']= CKEDITOR.instances["txt_textar"].getData();	
				
			
			$.post(base_url +'/'+ lang + '/admin/updateRoom',data, function(data,status){
				
			})
			.success(function(data){
				$(location).attr('href', base_url +'/'+ lang + '/admin/rooms');					
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
	
	  
	$("#footerImgRoom").uploadify({
		"buttonText": "Upload",
		"swf"      : "<?php echo base_url(); ?>images/resource/uploadify.swf",
		"uploader" : "<?php echo base_url(); ?>images/resource/uploadify.php?gt=1",
		"onUploadSuccess" : function(file, response, data) {
			$(".main-upload-footer").html("<img src='"+base_url+"/images/resource/"+response+"' width='270' /><input name='footerImg' type='hidden' value='"+response+"' />");
			$(".uploadify-queue").html("");
		}
	});
	  
	  
	$("#picture").uploadify({
		"buttonText": "Upload",
		"swf"      : "<?php echo base_url(); ?>images/resource/uploadify.swf",
		"uploader" : "<?php echo base_url(); ?>images/resource/uploadify.php?gt=1",
		"onUploadSuccess" : function(file, response, data) {
			$(".main-upload").html("<img src='"+base_url+"/images/resource/"+response+"' width='370' /><input name='mainImage' type='hidden' value='"+response+"' />");
			$(".uploadify-queue").html("");
		}
	});
		
	$("#bigImage").uploadify({
            "buttonText": "Upload",
            "swf"      : "<?php echo base_url(); ?>images/resource/uploadify.swf",
            "uploader" : "<?php echo base_url(); ?>images/resource/uploadify.php?gt=1",
            "onUploadSuccess" : function(file, response, data) {
                $(".main-upload-big").append("<div class='bigImg'><img src='"+base_url+"/images/resource/"+response+"' width='600px' /><input name='bigimg' type='hidden' value='"+response+"' /><span style='width:600px;' class='btn btn-block btn-success btn-xs imgDelete'>delete</span></div>");
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
                $(".main-upload-small").append("<div class='smallImg'><img src='"+base_url+"/images/resource/"+response+"' width='170px' /><input name='smallimg' type='hidden' value='"+response+"' /><span style='width:170px;' class='btn btn-block btn-success btn-xs imgDelete'>delete</span></div>");
                $(".uploadify-queue").html("");
            }
        });
		
		
    $("#homeroomimage").uploadify({
		"buttonText": "Upload",
		"swf"      : "<?php echo base_url(); ?>images/resource/uploadify.swf",
		"uploader" : "<?php echo base_url(); ?>images/resource/uploadify.php?gt=1",
		"onUploadSuccess" : function(file, response, data) {
			$(".room-upload").html("<img src='"+base_url+"/images/resource/"+response+"' width='470px' /><input name='roombasicImage' type='hidden' value='"+response+"' />");
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
