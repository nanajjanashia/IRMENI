  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Services</h3>
            </div>
			
            <!-- /.box-header -->
            <div class="box-body">
					
              <table id="neswstable" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
				  <th>GALLERY TYPE</th>
				  <th>GALLERY TITLE ENGLISH</th>
				  <th>GALLERY TITLE ARABIAN</th>
				  <th><a class="btn btn-success" href="<?php echo base_url("$language");?>/admin/addFotoGallery"><i class="fa fa-plus-circle"></i> Create foto gallery</a></th>	
				  <th><a class="btn btn-success" href="<?php echo base_url("$language");?>/admin/addVideoGallery"><i class="fa fa-plus-circle"></i> Create video gallery</a></th>				  
                </tr>
                </thead>
                <tbody>					
				<?php 
					if( isset( $galleries ) && !empty( $galleries )  )
					{
						$url = base_url("$language");
						$i = 1;
						foreach( $galleries as $k=>$v )
						{
							if( $v->type == 1 ) $type="Image";
							else $type="Video";
							echo '
								 <tr>
								  <td>'.$i.'</td>
								  <td>'.$type.'</td>
								  <td>'.$v->titleen.'</td>
								  <td>'.$v->titlear.'</td>
								  <td><a class="btn btn-warning" href="'.$url.'/admin/editGallery/'.$v->id.'"><i class="fa fa-edit"></i> edit</a></td>
								  <td><a class="btn btn-danger delete-button" onclick="return confirm(\'Are you sure you want to delete this item?\');" href="'.$url.'/admin/deleteGalerry/'.$v->id.'"><i class="	fa fa-remove"></i> delete</a></td>
								</tr>';
							$i++;
						}
					}				
				?>
             
                </tbody>
                <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Gallery type</th>
				  <th>Gallery title english</th>
				  <th>Gallery title arabian</th>
				  <th></th>
                </tr>
                </tfoot>
              </table>			  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->         
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="../../plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->

<!-- page script -->
<script>
  $(function () {
   // $("#neswstable").DataTable();
    $('#neswstable').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
