<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan gelen verileri al
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $birthDate = $_POST['birthDate'];  // Doğum tarihi alanını al
    $message = $_POST['message'];
    $jobStatus = $_POST['jobStatus']; // İş durumu alanını al
    
    // Dosya bilgilerini al
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $fileName = $_FILES['file']['name'];
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileType = $_FILES['file']['type'];
        $uploadDir = 'uploads/';

        // Dosyayı belirlenen dizine taşı
        $dest_path = $uploadDir . $fileName;
        if(move_uploaded_file($fileTmpPath, $dest_path)) {
            $fileUploadSuccess = true;
        } else {
            $fileUploadSuccess = false;
        }
    } else {
        $fileUploadSuccess = false;
    }
}
?>


<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gönderilen Bilgiler</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f9f9f9;
        }
        .container {
            width: 80%;
            max-width: 600px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn-container {
            text-align: center;
        }
        .btn {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Gönderilen Bilgiler:</h2>
        <table>
            <tr>
                <th>Alan</th>
                <th>Bilgi</th>
            </tr>
            <tr>
                <td>İsim</td>
                <td><?php echo htmlspecialchars($name); ?></td>
            </tr>
            <tr>
                <td>E-posta</td>
                <td><?php echo htmlspecialchars($email); ?></td>
            </tr>
            <tr>
                <td>Telefon</td>
                <td><?php echo htmlspecialchars($phone); ?></td>
            </tr>
            <tr>
                <td>Cinsiyet</td>
                <td><?php echo htmlspecialchars($gender); ?></td>
            </tr>
            <tr>
                <td>İş Durumu</td>
                <td><?php echo htmlspecialchars($jobStatus); ?></td>
            </tr>
            <tr>
                <td>Doğum Tarihi</td>
                <td><?php echo htmlspecialchars($birthDate); ?></td>
            </tr>
            <tr>
                <td>Mesaj</td>
                <td><?php echo htmlspecialchars($message); ?></td>
            </tr>
            <tr>
                <td>Dosya</td>
                <td>
                    <?php 
                    if ($fileUploadSuccess) {
                        echo '<a href="' . htmlspecialchars($dest_path) . '">' . htmlspecialchars($fileName) . '</a>';
                    } else {
                        echo 'Dosya yüklenemedi';
                    }
                    ?>
                </td>
            </tr>
        </table>
        <div class="btn-container">
            <a href="iletisim.html" class="btn">İletişim Sayfasına Dön</a>
        </div>
    </div>
</body>
</html>
