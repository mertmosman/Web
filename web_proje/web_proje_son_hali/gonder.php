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
    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Outfit:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            width: 100%;
            max-width: 600px;
            background: var(--surface-color);
            backdrop-filter: blur(16px);
            border: 1px solid var(--glass-border);
            padding: 2rem;
            border-radius: 16px;
            box-shadow: var(--glass-shadow);
            margin-top: 2rem;
        }
        table { margin-top: 1rem; }
        .btn-container { text-align: center; margin-top: 2rem; }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: var(--primary-color);
            color: white;
            border-radius: 8px;
            text-decoration: none;
            transition: 0.3s;
        }
        .btn:hover { background: #0ea5e9; }
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
