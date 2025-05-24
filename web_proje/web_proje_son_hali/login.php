<?php

// Kullanıcı adı ve şifre bilgilerini formdan alın
$username = $_POST['username'];
$password = $_POST['password'];

// Kullanıcı adı ve şifrenin doğrulama işlemi
$first_letter = strtolower(substr($username, 0, 1)); // Kullanıcının ilk harfini al ve küçük harfe çevir
$student_number = substr($username, 1, strpos($username, "@") - 1); // Öğrenci numarasını al
$expected_password = $first_letter . $student_number; // Öğrenci numarasını şifreye ekle

// Başarılı giriş durumunda hoşgeldiniz mesajı ve öğrenci numarası göster
if ($username == "$first_letter$student_number@sakarya.edu.tr" && $password == $expected_password) {
    echo "
    <html>
    <head>
        <style>
        .success-message {
            background-color: #dff0d8;
            border: 1px solid #d6e9c6;
            color: #4CAF50;
            padding: 15px;
            margin: 20px auto;
            max-width: 400px;
            border-radius: 5px;
            text-align: center; /* Metni ortala */
        }
        .success-message h3 {
            font-size: 24px;
            margin-top: 0;
        }
        .success-message p {
            font-size: 18px;
            margin-bottom: 0;
        }
        </style>
    </head>
    <body>
    <div class='success-message'>
        <h3>$password <br> Hoşgeldiniz</h3>
    </div>
    </body>
    </html>";
    echo '<meta http-equiv="refresh" content="2;url=index.html">';
    exit();
} 
else 
{
    echo "
    <html>
    <head>
        <style>
        .error-message {
            background-color: #f2dede;
            border: 1px solid #ebccd1;
            color: #a94442;
            padding: 15px;
            margin: 20px auto;
            max-width: 400px;
            border-radius: 5px;
            text-align: center; /* Metni ortala */
        }
        .error-message h3 {
            font-size: 24px;
            margin-top: 0;
        }
        .error-message p {
            font-size: 18px;
            margin-bottom: 0;
        }
        </style>
    </head>
    <body>
    <div class='error-message'>
        <h3>Giriş Bilgileri Hatalı</h3>
    </div>
    </body>
    </html>";
    echo '<meta http-equiv="refresh" content="2;url=login.html">';
    exit();
}

?>
