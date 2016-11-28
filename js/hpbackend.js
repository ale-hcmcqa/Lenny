jQuery(function($){
	$.datepicker.regional['vi'] = {

		closeText: 'Đóng',

		prevText: '&#x3c;Trước',

		nextText: 'Tiếp&#x3e;',

		currentText: 'Hôm nay',

		monthNames: ['Tháng Một', 'Tháng Hai', 'Tháng Ba', 'Tháng Tư', 'Tháng Năm', 'Tháng Sáu',

		'Tháng Bảy', 'Tháng Tám', 'Tháng Chín', 'Tháng Mười', 'Tháng Mười Một', 'Tháng Mười Hai'],

		monthNamesShort: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',

		'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],

		dayNames: ['Chủ Nhật', 'Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy'],

		dayNamesShort: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],

		dayNamesMin: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],

		weekHeader: 'Tu',

		dateFormat: 'dd-mm-yy',

		firstDay: 0,

		isRTL: false,

		showMonthAfterYear: false,

		yearSuffix: ''};

	$.datepicker.setDefaults($.datepicker.regional['vi']);

});
$(function() {
    $( "#datepickerf" ).datepicker();
    $.datepicker.setDefaults($.datepicker.regional['vi']);
});
$(function() {					
    $( "#datepicker" ).datepicker(); 
    $.datepicker.setDefaults($.datepicker.regional['vi']);   
});                                           
        var setTotalNumberOfWordCounter = "150";                                                                          
        function displayWordCounter(){
            var getTextValue = document.frmAddContent.meta_des.value;  // Get input textarea value
            var getTextLength = getTextValue.length;   // Get length of input textarea value
            if(getTextLength > setTotalNumberOfWordCounter){     //compare this length with total count
                getTextValue = getTextValue.substring(0,setTotalNumberOfWordCounter);
                document.frmAddContent.meta_des.value =getTextValue;
                return false;
            }
            document.frmAddContent.totalWordLimit.value = (setTotalNumberOfWordCounter-getTextLength);                                      
        }    
        var setTotalNumberOfWordCounter1 = "70";   
        function displayWordCounter1(){
            var getTextValue1 = document.frmAddContent.meta_title.value;   
            var getTextLength1 = getTextValue1.length;
            if(getTextLength1 > setTotalNumberOfWordCounter1){ 
                getTextValue1 = getTextValue1.substring(0,setTotalNumberOfWordCounter1);   
                document.frmAddContent.meta_title.value =getTextValue1; 
                return false;
            }
            document.frmAddContent.totalWordLimit1.value = (setTotalNumberOfWordCounter1-getTextLength1);   
        }     	
function loadEditor()

			{

				var getId=document.getElementById("editor1");

				if(getId!=null)

				{

					CKEDITOR.replace( 'editor1',

					{

						skin : 'kama',

						uiColor: '#44B8C4',

						width: 540,

						filebrowserBrowseUrl : '/ckfinder/ckfinder.html',

						filebrowserImageBrowseUrl : '/ckfinder/ckfinder.html?Type=Images',

						filebrowserFlashBrowseUrl : '/ckfinder/ckfinder.html?Type=Flash',

						filebrowserUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

						filebrowserImageUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

						filebrowserFlashUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

						toolbar: [

						

						['Source','-','Save','NewPage','Preview','-','Templates'],

    ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],

    ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],

    ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],

    '/',

    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],

    ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],

    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],

    ['BidiLtr', 'BidiRtl'],

    ['Link','Unlink','Anchor'],

    ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe'],

    '/',

    ['Styles','Format','Font','FontSize'],

    ['TextColor','BGColor'],

    [ 'Maximize', 'ShowBlocks','-','About', '-', 'buttonbbcode']	



						]
					} );

					CKEDITOR.replace( 'editor2',

					{

						skin : 'kama',

						uiColor: '#44B8C4',

						width: 540,

						filebrowserBrowseUrl : '/ckfinder/ckfinder.html',

						filebrowserImageBrowseUrl : '/ckfinder/ckfinder.html?Type=Images',

						filebrowserFlashBrowseUrl : '/ckfinder/ckfinder.html?Type=Flash',

						filebrowserUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

						filebrowserImageUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

						filebrowserFlashUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

						toolbar: [

						

						['Source','-','Save','NewPage','Preview','-','Templates'],

    ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],

    ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],

    ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],

    '/',

    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],

    ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],

    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],

    ['BidiLtr', 'BidiRtl'],

    ['Link','Unlink','Anchor'],

    ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe'],

    '/',

    ['Styles','Format','Font','FontSize'],

    ['TextColor','BGColor'],

    ['Maximize', 'ShowBlocks','-','About']



						]

					} );
					CKEDITOR.replace( 'editor3',

					{

						skin : 'kama',

						uiColor: '#44B8C4',

						width: 540,

						filebrowserBrowseUrl : '/ckfinder/ckfinder.html',

						filebrowserImageBrowseUrl : '/ckfinder/ckfinder.html?Type=Images',

						filebrowserFlashBrowseUrl : '/ckfinder/ckfinder.html?Type=Flash',

						filebrowserUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

						filebrowserImageUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

						filebrowserFlashUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

						toolbar: [

						

						['Source','-','Save','NewPage','Preview','-','Templates'],

    ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],

    ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],

    ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],

    '/',

    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],

    ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],

    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],

    ['BidiLtr', 'BidiRtl'],

    ['Link','Unlink','Anchor'],

    ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe'],

    '/',

    ['Styles','Format','Font','FontSize'],

    ['TextColor','BGColor'],

    ['Maximize', 'ShowBlocks','-','About']



						]

					} );
					CKEDITOR.replace( 'editor4',

					{

						skin : 'kama',

						uiColor: '#44B8C4',

						width: 540,

						filebrowserBrowseUrl : '/ckfinder/ckfinder.html',

						filebrowserImageBrowseUrl : '/ckfinder/ckfinder.html?Type=Images',

						filebrowserFlashBrowseUrl : '/ckfinder/ckfinder.html?Type=Flash',

						filebrowserUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

						filebrowserImageUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

						filebrowserFlashUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

						toolbar: [

						

						['Source','-','Save','NewPage','Preview','-','Templates'],

    ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],

    ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],

    ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],

    '/',

    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],

    ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],

    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],

    ['BidiLtr', 'BidiRtl'],

    ['Link','Unlink','Anchor'],

    ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe'],

    '/',

    ['Styles','Format','Font','FontSize'],

    ['TextColor','BGColor'],

    ['Maximize', 'ShowBlocks','-','About']



						]

					} );
					CKEDITOR.replace( 'editor5',

					{

						skin : 'kama',

						uiColor: '#44B8C4',

						width: 540,

						filebrowserBrowseUrl : '/ckfinder/ckfinder.html',

						filebrowserImageBrowseUrl : '/ckfinder/ckfinder.html?Type=Images',

						filebrowserFlashBrowseUrl : '/ckfinder/ckfinder.html?Type=Flash',

						filebrowserUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

						filebrowserImageUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

						filebrowserFlashUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

						toolbar: [

						

						['Source','-','Save','NewPage','Preview','-','Templates'],

    ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],

    ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],

    ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],

    '/',

    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],

    ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],

    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],

    ['BidiLtr', 'BidiRtl'],

    ['Link','Unlink','Anchor'],

    ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe'],

    '/',

    ['Styles','Format','Font','FontSize'],

    ['TextColor','BGColor'],

    ['Maximize', 'ShowBlocks','-','About']



						]

					} );
					CKEDITOR.replace( 'editor6',

					{

						skin : 'kama',

						uiColor: '#44B8C4',

						width: 540,

						filebrowserBrowseUrl : '/ckfinder/ckfinder.html',

						filebrowserImageBrowseUrl : '/ckfinder/ckfinder.html?Type=Images',

						filebrowserFlashBrowseUrl : '/ckfinder/ckfinder.html?Type=Flash',

						filebrowserUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

						filebrowserImageUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

						filebrowserFlashUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

						toolbar: [

						

						['Source','-','Save','NewPage','Preview','-','Templates'],

    ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],

    ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],

    ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],

    '/',

    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],

    ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],

    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],

    ['BidiLtr', 'BidiRtl'],

    ['Link','Unlink','Anchor'],

    ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe'],

    '/',

    ['Styles','Format','Font','FontSize'],

    ['TextColor','BGColor'],

    ['Maximize', 'ShowBlocks','-','About']



						]

					} );
					CKEDITOR.replace( 'editor7',

					{

						skin : 'kama',

						uiColor: '#44B8C4',

						width: 540,

						filebrowserBrowseUrl : '/ckfinder/ckfinder.html',

						filebrowserImageBrowseUrl : '/ckfinder/ckfinder.html?Type=Images',

						filebrowserFlashBrowseUrl : '/ckfinder/ckfinder.html?Type=Flash',

						filebrowserUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

						filebrowserImageUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

						filebrowserFlashUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

						toolbar: [

						

						['Source','-','Save','NewPage','Preview','-','Templates'],

    ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],

    ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],

    ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],

    '/',

    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],

    ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],

    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],

    ['BidiLtr', 'BidiRtl'],

    ['Link','Unlink','Anchor'],

    ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe'],

    '/',

    ['Styles','Format','Font','FontSize'],

    ['TextColor','BGColor'],

    ['Maximize', 'ShowBlocks','-','About']



						]

					} );
					CKEDITOR.replace( 'editor8',

					{

						skin : 'kama',

						uiColor: '#44B8C4',

						width: 540,

						filebrowserBrowseUrl : '/ckfinder/ckfinder.html',

						filebrowserImageBrowseUrl : '/ckfinder/ckfinder.html?Type=Images',

						filebrowserFlashBrowseUrl : '/ckfinder/ckfinder.html?Type=Flash',

						filebrowserUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

						filebrowserImageUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

						filebrowserFlashUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

						toolbar: [

						

						['Source','-','Save','NewPage','Preview','-','Templates'],

    ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],

    ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],

    ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],

    '/',

    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],

    ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],

    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],

    ['BidiLtr', 'BidiRtl'],

    ['Link','Unlink','Anchor'],

    ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe'],

    '/',

    ['Styles','Format','Font','FontSize'],

    ['TextColor','BGColor'],

    ['Maximize', 'ShowBlocks','-','About']



						]

					} );

				}

			}

			

		 	window.onload=loadEditor;	