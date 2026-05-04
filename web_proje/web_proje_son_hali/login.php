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
        <link href='https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Outfit:wght@400;600;700&display=swap' rel='stylesheet'>
        <style>
        body { background: #0f172a; font-family: 'Inter', sans-serif; display: flex; align-items: center; justify-content: center; height: 100vh; margin: 0; }
        .success-message {
            background: rgba(16, 185, 129, 0.2);
            border: 1px solid rgba(16, 185, 129, 0.5);
            color: #10b981;
            padding: 20px;
            max-width: 400px;
            border-radius: 16px;
            text-align: center;
            backdrop-filter: blur(16px);
        }
        .success-message h3 { font-family: 'Outfit', sans-serif; font-size: 24px; margin: 0; }
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
        <link href='https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Outfit:wght@400;600;700&display=swap' rel='stylesheet'>
        <style>
        body { background: #0f172a; font-family: 'Inter', sans-serif; display: flex; align-items: center; justify-content: center; height: 100vh; margin: 0; }
        .error-message {
            background: rgba(239, 68, 68, 0.2);
            border: 1px solid rgba(239, 68, 68, 0.5);
            color: #ef4444;
            padding: 20px;
            max-width: 400px;
            border-radius: 16px;
            text-align: center;
            backdrop-filter: blur(16px);
        }
        .error-message h3 { font-family: 'Outfit', sans-serif; font-size: 24px; margin: 0; }
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
