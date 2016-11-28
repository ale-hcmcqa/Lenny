/*
Copyright (c) 2003-2010, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
    //config.extraPlugins = 'youtube';
    //config.youtube_width = '640';
    //config.youtube_height = '480';
    //config.youtube_related = true;
    //config.youtube_older = false;
    //config.youtube_privacy = false;    
	config.filebrowserBrowseUrl = 'ckfinder/ckfinder.html';
    config.pasteFromWordRemoveFontStyles = false;
    config.pasteFromWordRemoveStyles=false;
	config.filebrowserImageBrowseUrl = 'ckfinder/ckfinder.html?Type=Images';
	config.filebrowserFlashBrowseUrl = 'ckfinder/ckfinder.html?Type=Flash';
	config.filebrowserUploadUrl = 'ckfinder/core/connector/aspx/connector.aspx?command=QuickUpload&amp;type=Files';
	config.filebrowserImageUploadUrl = 'ckfinder/core/connector/aspx/connector.aspx?command=QuickUpload&amp;type=Images';
	config.filebrowserFlashUploadUrl = 'ckfinder/core/connector/aspx/connector.aspx?command=QuickUpload&amp;type=Flash';
    config.extraPlugins = 'buttonbbcode';
	//config.extraPlugins = 'youtubePlugin';
	//config.youtube_width = '640';
	//config.youtube_height = '480';
	//config.youtube_older = false;
	//config.youtube_privacy = false;
};

