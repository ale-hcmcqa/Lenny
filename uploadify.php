<?php
    $result =array('success'=>false,'files'=>'');
    $targetFolder = 'tmp';

    $verifyToken = md5('unique_salt' . $_POST['timestamp']);

    if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
		
        $tempFile = $_FILES['Filedata']['tmp_name'];
        $targetPath =  $targetFolder;
        $targetFile = rtrim($targetPath,'/') . '/' . $_FILES['Filedata']['name'];		
        $fileTypes = array('jpg','jpeg','gif','png','bmp','JPG','JPEG','GIF','PNG','BMP');
        $fileParts = pathinfo($_FILES['Filedata']['name']);

        $newPath = "";		
        $timestamp = md5(time().rand(10,99));
        $fileName = $timestamp.".".$fileParts["extension"];
        $objFile = new stdClass();
		
        if (in_array($fileParts['extension'],$fileTypes)) {
            $newPath = rtrim($targetPath, "/")."/".$fileName;

            move_uploaded_file($tempFile, $targetFile);
            rename($targetFile, $newPath);  

                $objFile->filename = $fileName;
				$objFile->title = $_FILES['Filedata']['name'];            
            $result['success'] =true;
            $result["files"] = $objFile;
        } else {
            $result['message'] = 'File extension invalid';
        }
        echo json_encode($result);
    }
?>