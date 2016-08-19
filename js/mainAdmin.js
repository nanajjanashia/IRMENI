$(function(){
	
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

	
	
});