tinymce.init({
	selector: '#postarea',
	toolbar: "newdocument, bold, italic, underline, strikethrough, alignleft, aligncenter, alignright, alignjustify, styleselect, formatselect, fontselect, fontsizeselect, cut, copy, paste, bullist, numlist, outdent, indent, blockquote, undo, redo, removeformat, subscript, superscript",
	plugins: [
		'advlist autolink lists link image charmap print preview hr anchor pagebreak',
		'tinymcespellchecker'
	],
	file_browser_callback_types: 'file image media'
});


/**
 * Responsive file manager
 */
/* tinymce.init({
    selector: "#imageselect",
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
         "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
   ],
   image_advtab: true ,
   
   external_filemanager_path:"filemanager/",
   filemanager_title:"Responsive Filemanager" ,
   external_plugins: { "filemanager" : "/filemanager/plugin.min.js"}
 }); */