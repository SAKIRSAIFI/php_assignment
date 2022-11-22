<?php
// Fetching Details:
$Fname = $_POST["fname"];
$Lname = $_POST["lname"];
$DOB = $_POST["dob"];
$Gender = $_POST["gender"];
$Proof = $_POST["id-proof"];

//Files
// For fetching file:
$File = $_FILES['prfile']['name'];

// For fetching size:
$FileSize = $_FILES['prfile']['size'];

// Fetching Extension of file
$File_ext = pathinfo($File, PATHINFO_EXTENSION);

// Temporary Location of file
$tempFile = $_FILES['prfile']['tmp_name'];


// For fetching ImageFile
$Img = $_FILES['imgfile']['name'];

// For fetching size:
$ImgSize = $_FILES['imgfile']['size'];

// Fetching Extension of file
$Img_ext = pathinfo($Img, PATHINFO_EXTENSION);

// Temporary Location of file
$tempImg = $_FILES['imgfile']['tmp_name'];


// Validation for Proof
if ($File_ext == "pdf") {
    if ($FileSize < 200000) {
        if ($Proof == "Aadhar Card") {
            $actual_path = "Adhaar/" . $File;
            move_uploaded_file($tempFile, $actual_path);
        }
        if ($Proof == "License") {
            $actual_path = "License/" . $File;
            move_uploaded_file($tempFile, $actual_path);
        }
        if ($Proof == "Voter Id") {
            $actual_path = "Voter/" . $File;
            move_uploaded_file($tempFile, $actual_path);
        }
        if ($Proof == "Pan") {
            $actual_path = "Pan/" . $File;
            move_uploaded_file($tempFile, $actual_path);
        }
    } else {
        echo "File Size Exceeds!<br>";
    }
} else {
    echo "Only pdf's are allowed!<br>";
}

// Validations for image 
$actualImg_path = "Image/" . $Img;
if ($Img_ext == "jpeg" || $Img_ext == "png" || $Img_ext == "jpg") {
    if ($ImgSize < 10000000) {
        move_uploaded_file($tempImg, $actualImg_path);
    } else {
        echo "Image Size Exceeds!<br>";
    }
} else {
    echo "Wrong File Selected";
}

if ($Img_ext == "jpeg") {
    echo '<img src="Image/img.jpeg" alt="Image" width="200px" height="200px" ><br>';
}
if ($Img_ext == "jpg") {
    echo '<img src="Image/img.jpg" alt="Image" width="200px" height="200px"><br>';
}
if ($Img_ext == "png") {
    echo '<img src="Image/img.png" alt="Image" width="200px" height="200px"><br>';
}
echo "Name  : " . $Fname . " " . $Lname . "<br>";
echo "DOB   : " . $DOB . "<br>";
echo "Gender: " . $Gender . "<br>";
echo "Selected Proof : " . $Proof . "<br>";
if ($Proof == "Aadhar Card") {
    echo '<a href="Adhaar/1.pdf"><input type="submit" value="Download" /></a><br>';
}
if ($Proof == "License") {
    echo '<a href="License/1.pdf"><input type="submit" value="Download" /></a><br>';
}
if ($Proof == "Voter Id") {

    echo '<a href="Voter/1.pdf"><input type="submit" value="Download" /></a><br>';
}
if ($Proof == "Pan") {
    echo '<a href="Pan/1.pdf"><input type="submit" value="Download" /></a><br>';
}

