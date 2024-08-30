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
    <title>Přihlášení</title>
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
    <form method="post" action="login.php">
        <h2>Přihlášení</h2>
        <?php

        $servername = "localhost";
        $username = "terezaK";
        $password = "terezaK5";
        $dbname = "gymbody";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = $conn->query($sql);


        $servername = "localhost";
        $username = "terezaK";
        $password = "terezaK5";
        $dbname = "gymbody";

        $conn = new mysqli($servername, $username, $password, $dbname);
        }
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $message = "";

        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM users WHERE username='$username'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if (password_verify($password, $row['password'])) {
                    $message = "Přihlášení úspěšné!";
                } else {
                    $message = "Špatné heslo.";
                }
            } else {
                $message = "Uživatelské jméno neexistuje.";
            }

            $conn->close();
        }
        ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="text" name="username" placeholder="Uživatelské jméno" required>
            <input type="password" name="password" placeholder="Heslo" required>
            <button type="submit" name="login">Přihlásit se</button>
            <p>Nemáte účet? <a href="register.php">Zaregistrujte se</a></p>
        </form>

        <!-- Zobrazení zprávy -->
        <?php if ($message != "") { echo "<p class='message'>$message</p>"; } ?>
</div>
</body>
</html>
<script src="header.js"></script>