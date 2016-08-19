
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  

	<section class="content">
		<div class="row">
        <div class="col-xs-12">
          <div class="box">
			  <div class="box-header with-border">
              <h3 class="box-title">Update Contact Page</h3>
            </div>
			
            <div class="box-body">
			
				<?php  if( isset( $contact ) && !empty( $contact ) ){ ?>
										
                <div class="form-group">
                  <label>Title English</label>
                  <input id="txt_titleen" type="text" class="form-control" placeholder="" value="<?php echo $contact[0]->titleen; ?>">
				  <input id="txt_id" type="hidden" value="<?php echo $contact[0]->id; ?>" >
                </div>
				
				<div class="form-group">
                  <label>Title Arabian</label>
                  <input id="txt_titlear" type="text" class="form-control" placeholder="" value="<?php echo $contact[0]->titlear; ?>">
                </div>
				
				<div class="form-group">
                  <label>Text English</label>
                  <input id="txt_texten" type="text" class="form-control" placeholder="" value="<?php echo $contact[0]->texten; ?>">
                </div>
				
				<div class="form-group">
                  <label>Text Arabian</label>
                  <input id="txt_textar" type="text" class="form-control" placeholder="" value="<?php echo $contact[0]->textar; ?>">
                </div>
				
				<div class="form-group">
                  <label>Address English</label>
                  <input id="txt_addressen" type="text" class="form-control" placeholder="" value="<?php echo $contact[0]->addressen; ?>">
                </div>
				
				<div class="form-group">
                  <label>Address Arabian</label>
                  <input id="txt_addressar" type="text" class="form-control" placeholder="" value="<?php echo $contact[0]->addressar; ?>">
                </div>
				
				<div class="form-group">
                  <label>Phone</label>
                  <input id="txt_phone" type="text" class="form-control" placeholder="" value="<?php echo $contact[0]->phone; ?>">
                </div>
				
                <div class="form-group">
                  <label>Fax</label>
                  <input id="txt_fax" type="text" class="form-control" placeholder="" value="<?php echo $contact[0]->fax; ?>">
                </div>	
				
				<div class="form-group">
                  <label>Email</label>
                  <input id="txt_email" type="text" class="form-control" placeholder="" value="<?php echo $contact[0]->email; ?>">
                </div>
				
					<button id="btn-contact" class="btn btn-success">Update Contact</button>
				<?php	}?>
			</div>
			
			<hr><br>
			<div class="box-body">
				<div class="form-group">
				  <label>Hotel map (insert google map embedred map src link only).</label>
				  <input id="txt_map" type="text" class="form-control" placeholder="" value="<?php echo $map[0]->src; ?>">
				  <input id="map_id" type="hidden" value="<?php echo $map[0]->id; ?>" >
				 </div>
				<button id="btn-map" class="btn btn-success">Update map</button>
				</div>
			</div>
			
		</div>
	  </div>
	</section>	

  </div>
  <!-- /.content-wrapper -->
  
  <script> 

  
	$( document ).ready(function() {
		
		var base_url = window.location.origin;
		var data = new Object();
			
			$("#btn-contact").click(function(){
			
			if( $("#txt_titleen").val() == '' || $("#txt_titlear").val() == '' || $("#texten").val() == '' ||  $("#textar").val() == '' || $("#txt_addressen").val() == '' || $("#txt_phone").val() == '' || $("#txt_email").val() == '' )
			{
				alert("Fill all forms"); return false;
			}
			
			data['id']=$("#txt_id").val();
			data['titleen']=$("#txt_titleen").val();
			data['titlear']=$("#txt_titlear").val();			
			data['texten']=$("#texten").val();
			data['textar']=$("#textar").val();			
			data['addressen']=$("#txt_addressen").val();
			data['addressar']=$("#txt_addressar").val();			
			data['phone']=$("#txt_phone").val();
			data['fax']=$("#txt_fax").val();
			data['email']=$("#txt_email").val();
			
				$.post(base_url+'/'+lang+'/admin/updateContact',data, function(data,status){
					
				})				
				 .done(function(r){
					$(location).attr('href', base_url +'/'+ lang + '/admin/contact');
				 })
				 .fail(function(){
					console.log("ERROR");
					return false;
				 })
				 .always(function(){
					return false;
				 })
		});
		
		
		
			
		$("#btn-map").click(function(){
			
			if( $("#txt_map").val() == '' )
			{
				alert("Please, insert map src"); return false;
			}
			data['id']=$("#map_id").val();
			data['src']=$("#txt_map").val();
				
				$.post(base_url+'/'+lang+'/admin/updateMap',data, function(data,status){
					
				})				
				 .done(function(r){
					$(location).attr('href', base_url +'/'+ lang + '/admin/contact');
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
  


