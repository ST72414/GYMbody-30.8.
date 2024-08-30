<!DOCTYPE html>
<html>
<head>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link
            rel="stylesheet"
            href="https://unpkg.com/simplebar@latest/dist/simplebar.css"
    />
    <script src="https://unpkg.com/simplebar@latest/dist/simplebar.min.js"></script>
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css"
    />
    <script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.min.js"></script>
    <title>Registrace</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
<header class="header">
    <div class="navbar" id="myNavbar">
        <div class="logo">
            <a href="/index.php">
                <img src="/IMG/GYMbody.jpg" alt="">
            </a>
        </div>
        <a href="/index.php">Úvodní strana</a>
        <a href="read.php">Seznam přihlášených</a>
        <a href="login.php">Přihlášení</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class='bx bx-menu bx-rotate-180' style='color:#ffffff'  ></i>
        </a>
    </div>
</header>
<div class="form-container">
    <form method="post" action="register.php">
        <h2>Registrace</h2>
        <?php

        $servername = "localhost";
        $username = "terezaK";
        $password = "terezaK5";
        $dbname = "gymbody";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $message = "";

        if (isset($_POST['register'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            // Kontrola, zda uživatelské jméno nebo email již existuje
            $check_sql = "SELECT * FROM users WHERE username='$username' OR email='$email'";
            $check_result = $conn->query($check_sql);

            if ($check_result->num_rows > 0) {
                $message = "Uživatelské jméno nebo email již existuje.";
            } else {
                // Vložení nového uživatele do databáze
                $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

                if ($conn->query($sql) === TRUE) {
                    $message = "Registrace úspěšná!";
                } else {
                    $message = "Chyba: " . $sql . "<br>" . $conn->error;
                }
            }

            $conn->close();
        }
        ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="text" name="username" placeholder="Uživatelské jméno" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Heslo" required>
            <button type="submit" name="register">Registrovat</button>
            <p>Již máte účet? <a href="login.php">Přihlaste se</a></p>
        </form>
        <?php if ($message != "") { echo "<p class='message'>$message</p>"; } ?>
</div>
</body>
</html>