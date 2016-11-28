
<?php
	$CI=&get_instance();
	$CI->load->helper('directory');
	
	echo '<div id="main">';
		echo '<div>';
		echo ' <div class="message information close">
						<h2>Files Manager</h2>
						<p>Quản lý các file được upload lên server(ảnh, flash, tập tin...)</p>
						</div>';
			echo '<div id="ckfinder" class="portlet-content">';
			
			?>
        		<script type="text/javascript">



			// This is a sample function which is called when a file is selected in CKFinder.

			function showFileInfo( fileUrl, data )

			{

				

				// Display additional information available in the "data" object.

				// For example, the size of a file (in KB) is available in the data["fileSize"] variable.

				if ( fileUrl != data['fileUrl'] )

					msg += '<b>File url:</b> ' + data['fileUrl'] + '<br />';

				msg += '<b>File size:</b> ' + data['fileSize'] + 'KB<br />';

				msg += '<b>Last modifed:</b> ' + data['fileDate'];



				// this = CKFinderAPI object

				this.openMsgDialog( "Selected file", msg );

			}



			// You can use the "CKFinder" class to render CKFinder in a page:

			var finder = new CKFinder();


			// This is a sample function which is called when a file is selected in CKFinder.

			finder.selectActionFunction = showFileInfo;

			finder.create();



			// It can also be done in a single line, calling the "static"

			// create( basePath, width, height, selectActionFunction ) function:

			// CKFinder.create( '../../', null, null, showFileInfo );



			// The "create" function can also accept an object as the only argument.

			// CKFinder.create( { basePath : '../../', selectActionFunction : showFileInfo } );



		</script>

           
              
			<?php
			echo '</div>';
		echo '</div>';
	echo '</div>';
?>