<?php
header('Content-Type: application/json');

// Folder tujuan penyimpanan gambar
$target_dir = "uploads/";
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Periksa apakah gambar benar-benar gambar atau bukan
$check = getimagesize($_FILES["image"]["tmp_name"]);
if ($check !== false) {
    $uploadOk = 1;
} else {
    echo json_encode(["error" => "File is not an image."]);
    $uploadOk = 0;
}

// Periksa ukuran file
if ($_FILES["image"]["size"] > 500000) {
    echo json_encode(["error" => "Sorry, your file is too large."]);
    $uploadOk = 0;
}

// Periksa tipe file
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    echo json_encode(["error" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed."]);
    $uploadOk = 0;
}

// Periksa apakah $uploadOk ditetapkan ke 0 oleh kesalahan
if ($uploadOk == 0) {
    echo json_encode(["error" => "Sorry, your file was not uploaded."]);
// jika semua ok, coba untuk mengunggah file
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $response = [
            "title" => $_POST['title'],
            "content" => $_POST['content'],
            "image" => $target_file
        ];
        echo json_encode($response);
    } else {
        echo json_encode(["error" => "Sorry, there was an error uploading your file."]);
    }
}
?>
