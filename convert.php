<?php

require "./vendor/autoload.php";

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


// Check if file already exists
if (file_exists($target_file)) {
    unlink($target_file);
    $uploadOk = 1;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if (
    $imageFileType != "html"
) {
    echo "Sorry, only html files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $mpdf = new \Mpdf\Mpdf();

        $file = file_get_contents('uploads/' . $_FILES["fileToUpload"]["name"]);
        $mpdf->WriteHTML($file);

        $file = $_FILES["fileToUpload"]["name"];
        $info = pathinfo($file);
        $file_name =  basename($file, '.' . $info['extension']);
        $mpdf->Output("output/" . "$file_name".'.PDF');

        echo "The HTML file " . '<span style="color: #03AC13; font-weight: bolder"> ' . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . ' </span>' . " has been Converted to PDF.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
