<?php
if ($_FILES['upload']) {
    $target_dir = "assets/uploads/";
    $target_file = $target_dir . basename($_FILES["upload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $uploadOk = 1;

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["upload"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo json_encode(array('uploaded' => 0, 'error' => array('message' => 'File is not an image.')));
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo json_encode(array('uploaded' => 0, 'error' => array('message' => 'Sorry, file already exists.')));
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["upload"]["size"] > 500000) {
        echo json_encode(array('uploaded' => 0, 'error' => array('message' => 'Sorry, your file is too large.')));
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo json_encode(array('uploaded' => 0, 'error' => array('message' => 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.')));
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        // File was not uploaded
    } else {
        if (move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)) {
            echo json_encode(array('uploaded' => 1, 'fileName' => basename($_FILES["upload"]["name"]), 'url' => '/assets/uploads/' . basename($_FILES["upload"]["name"])));
        } else {
            echo json_encode(array('uploaded' => 0, 'error' => array('message' => 'Sorry, there was an error uploading your file.')));
        }
    }
}
