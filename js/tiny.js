tinymce.init({
	selector: '#postarea',
	height: 500,
	theme: 'modern',
	plugins: [
		'advlist autolink lists link image charmap print preview hr anchor pagebreak',
		'tinymcespellchecker'
	],
	file_browser_callback_types: 'file image media'
});