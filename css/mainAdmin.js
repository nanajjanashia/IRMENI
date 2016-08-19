$(function(){
var table = $('#dataTables').DataTable({
       responsive: true,
	     "order": [[ 0, "desc" ]],
		  "aLengthMenu": [[100, 500, 1000, -1], [100, 500, 1000, "ყველა"]],
        });
	
tinymce.init({
    selector: "textarea",
	height : "600px",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste jbimages textcolor"
    ],
    toolbar: "forecolor undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | jbimages | media"
});

	
		
	$(".ajax input[type='checkbox']").on({click:function() {
		checkboxed($(this));
	}});
	
$(".ajax span").on({click:function() {
	focus($(this));
}});

function checkboxed(a){
	var	id = a.attr('id');
var	clas = a.attr('class');
 var rel = a.closest('tr').attr('rel'); 
 	if(a.is(':checked')){	var text=1;	}else { text=0; }
		$.ajax({
				type: "POST",
				url: base_url+"ge/wiseadmin/editmenu",
				data: {
					"id": id,
					"text": text,
					"rel": rel,
					"clas": clas
				},
				dataType: "json",
				success: function(data) {}
			});	
}

function focus(a){
	    var text = a.text();
	var klasi = a.attr('class');
	var idi = a.attr('id');
		a.parent().html("<input type='text' class='"+klasi+" focus' id = '"+idi+"' value = '"+text+"'/>");
	a.addClass('focus');
	$('.focus').focus();
	
	$('.ajax input.focus').on({blur:function() {	
	$(this).removeClass('focus');
var	text = $(this).val();
var	id = $(this).attr('id');
var	clas = $(this).attr('class');
 var rel = $(this).closest('tr').attr('rel'); 
	$(this).parent().html("<span class='"+clas+"' id='"+id+"'>"+text+"</span>");
	$(this).remove();
		$.ajax({
				type: "POST",
				url: base_url+"ge/wiseadmin/editmenu",
				data: {
					"id": id,
					"text": text,
					"rel": rel,
					"clas": clas
				},
				dataType: "json",
				success: function(data) {				
				}
			});
				$(".ajax span").on({click:function() {
						focus($(this));
					}});
				
				$(".ajax input[type='checkbox']").on({click:function() {
						checkboxed($(this));
					}});
	
}});

}


 $('#dataTables tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
		var id = tr.attr('id');
        if ( row.child.isShown() ) {
            row.child.hide();
            tr.removeClass('shown');
        }
        else {		
		
		$.ajax({
				type: "POST",
				url: base_url+"ge/wiseadmin/showTable",
				data: {
					"id": id
				},
				success: function(data) {	

			row.child(data).show();
            tr.addClass('shown');
				$(".ajax span").on({click:function() {
					focus($(this));
				}});
				$(".ajax input[type='checkbox']").on({click:function() {
						checkboxed($(this));
				}});
				}
			});
	}
    } );

$('.datepicker').datepicker({
    format: 'yyyy-mm-dd'
})
	
});