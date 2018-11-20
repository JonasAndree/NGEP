<?php
include_once "../sql.php";

$mail = $_POST["mail"];
$uploadOk = true;
$file = $_FILES['fileToUpload']['tmp_name'];
$fileType;

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($file);
    if($check !== false) {
        $fileType = $check["mime"];
        echo "File is an image - " . $fileType . ".";
    } else {
        echo "File is not an image.<br>";
        $upladOk = false;
    }
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = false;
} 
// Check file is to be upploaded
if ($uploadOk == false) {
    echo "Upploading file faild!";
} else {
    // Gives the content of the file that is to be upploaded.
    $image = addslashes(file_get_contents($file));
    $imageName = $_FILES['fileToUpload']['name'];	//

    updateUserImage($image, $mail);
}
?>
