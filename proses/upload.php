<?php
include 'connect.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$errors = []; // Array untuk menyimpan pesan kesalahan

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];

    // Mendapatkan nama dari user dengan id
    $sql_query = "SELECT * FROM users WHERE id = $user_id";
    $result = $conn->query($sql_query);
    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
        $author = $user_data['name'];
    } else {
        $author = "Unknown";
    }

    // Proses upload file
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Cek apakah file adalah gambar asli atau tidak
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if ($check === false) {
        $errors[] = "File is not an image.";
        $uploadOk = 0;
    }

    // Cek apakah file sudah ada
    if (file_exists($target_file)) {
        $errors[] = "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Cek ukuran file
    if ($_FILES["file"]["size"] > 500000) {
        $errors[] = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Hanya izinkan format file tertentu
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $errors[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Cek apakah $uploadOk bernilai 0 karena kesalahan
    if ($uploadOk == 0) {
        $errors[] = "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO trivias (user_id, author, title, category, content, file_path, status)
                    VALUES ('$user_id', '$author', '$title', '$category', '$content', '$target_file', 'pending')";

            if ($conn->query($sql) === TRUE) {
                echo "<script>
                        window.location.href = '../index.php';
                    </script>";
                exit();
            } else {
                $errors[] = "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            $errors[] = "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Article</title>
    <script src="https://kit.fontawesome.com/b6fbae5a8d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/upload.css">
</head>

<body>
    <div class="modal">
        <div class="modal-header">
            <div class="modal-logo">
                <h2>Upload Your Trivia</h2>
            </div>
            <button class="btn-close" onclick="redirectToIndex()">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path fill="#512da8" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                </svg>
            </button>
        </div>
        <div class="modal-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" name="title" placeholder="Title" class="form-control" required>
                </div>
                <div class="form-group">
                    <select id="category" name="category" class="form-control" required>
                        <option value="" disabled selected>Trivia category</option>
                        <option value="science">Science</option>
                        <option value="history">History</option>
                        <option value="technology">Technology</option>
                        <option value="entertainment">Entertainment</option>
                        <option value="sports">Sports</option>
                        <option value="anime">Anime</option>
                        <option value="movies">Movies</option>
                        <option value="food">Food</option>
                        <option value="nature">Nature</option>
                    </select>
                </div>
                <div class="form-group">
                    <textarea id="trivia-description" name="content" class="form-control" rows="3" placeholder="Describe your trivia here..." required></textarea>
                </div>
                <div class="form-group">
                    <label for="file-upload" class="upload-area">
                        <span class="upload-area-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="#adc0e1" d="M0 96C0 60.7 28.7 32 64 32H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zM323.8 202.5c-4.5-6.6-11.9-10.5-19.8-10.5s-15.4 3.9-19.8 10.5l-87 127.6L170.7 297c-4.6-5.7-11.5-9-18.7-9s-14.2 3.3-18.7 9l-64 80c-5.8 7.2-6.9 17.1-2.9 25.4s12.4 13.6 21.6 13.6h96 32H424c8.9 0 17.1-4.9 21.2-12.8s3.6-17.4-1.4-24.7l-120-176zM112 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z" />
                            </svg>
                        </span>
                        <span class="upload-area-description">
                            Please upload a picture from your computer as thumbnail<br /><strong>clicking here</strong>
                        </span>
                        <input type="file" id="file-upload" name="file" class="form-control-file" accept="image/*" required style="display: none;">
                    </label>
                </div>
                <p><strong>Remember:</strong> Before your trivia appears on our page, we need to review the content you upload.</p>
                <!-- Tampilkan pesan kesalahan di bawah form -->
                <?php if (!empty($errors)) : ?>
                    <div class="error-messages">
                        
                        <div>
                            <?php foreach ($errors as $error) : ?>
                                <p><i class="fas fa-exclamation-circle"></i> <?php echo $error; ?></p>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
              
                <div class="form-btn">
                    <button type="button" class="btn btn-secondary" onclick="redirectToIndex()">Cancel</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>

        </div>

    </div>
    </form>


    </div>
    <script>
        function redirectToIndex() {
            window.location.href = '../index.php';
        }
    </script>
</body>

</html>