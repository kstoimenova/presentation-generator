<?php
/*
-------- !!! IMPORTANT !!! ----------
First, ensure that PHP is configured to allow file uploads.
In the "php.ini" file, search for the file_uploads directive, and set it to On:
    file_uploads = On

If you receive this error: "Warning: move_uploaded_file(./uploads/<file>): failed to open stream: Permission denied"
when you try to upload an image, please make sure, that the rights for both - the "upload.php" file and the "uploads" directory
are set to READ & WRITE.
*/

define("FILE_MAX_SIZE", 50000000);

function uploadFile(&$valid, &$errors)
{
    $target_dir = "./uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


    if ($_FILES["fileToUpload"]["tmp_name"] !== "") {

        // Check if file already exists
        if (file_exists($target_file)) {
            $errors[$target_file] = "Извинете, файлът вече съществува.";
            return "";
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > FILE_MAX_SIZE) {
            $errors[$target_file] = "Извинете, големината на качения файл е прекалено голяма. Максималната допустима големина е 5MB.";
            return "";
        }

        // Valid file extensions
        $extensions_arr = array("json");

        // Allow certain file formats
        if (!in_array($imageFileType, $extensions_arr)) {
            $errors[$imageFileType] = "Извинете, само JSON файлове са позволени.";
            return "";
        }
        // Check if $uploadOk is set to 0 by an error
 
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $valid[$target_file] = "Файлът ". basename($_FILES["fileToUpload"]["name"]). " беше качен успешно.";
        } else {
            $errors[$target_file] = "Извинете имаше проблем при качването на файла.";
            return "";
        }
    
        return $target_file;
    } 

    return "";
}
