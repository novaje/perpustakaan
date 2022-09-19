<?php
    if(!empty($_GET['file'])) {
        $file_name = basename($_GET['file']);
        $filePath  = "berkas/".$file_name;

        if(!empty($file_name) && file_exists($filePath)) {
            //define header
            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$file_name");
            header("Content-Type: application/pdf");
            header("Content-Transfer-Encoding: binary");

            //read file
            readfile($filePath);
            exit;
        } 
            else {
                echo "file not exit";
            }
    }
?>