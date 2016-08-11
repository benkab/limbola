$(document).ready(function(){
	$('#nav-toggle').click(function(e){

		e.preventDefault();
		$('#nav-side').toggleClass('animation');
		$('#nav-side').toggleClass('hidden-xs');
		$('#nav-side').toggleClass('hidden-md');
		$('#nav-side').toggleClass('hidden-sm');
		$('#logo').toggleClass('hidden');
		$('#nav-toggle').toggleClass('maitain-position');
		$('#nav-side ul li').toggleClass('resize');
		
	});

	
	$('#role').chosen();

	$('#tag').chosen();

	// $('#editable').froalaEditor({
	// 	height: 300,
	// 	fontSizeDefaultSelection: '13'
	// });

	$('#editable').summernote({
		toolbar: [
		    // [groupName, [list of button]]
		    ['style', ['bold', 'italic', 'underline', 'clear']],
		    ['font', ['strikethrough', 'superscript', 'subscript']],
		    ['fontsize', ['fontsize']],
		    ['color', ['color']],
		    ['para', ['ul', 'ol', 'paragraph']],
		    ['height', ['height']]
		  ],
		  height: 300,
	});
	$('#editable').summernote('fontSize', 14);



});