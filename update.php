
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upravit uživatele</title>
    <link rel="stylesheet" href="read.css">
</head>
<body>
<div class="container">
    <h1>Upravit uživatele</h1>
    <?php
    $servername = "localhost";
    $username = "terezaK";
    $password = "terezaK5";
    $dbname = "gymbody";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM users WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        }
    }

        // Zpracování formuláře
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['id'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $sql = "UPDATE users SET username='$username', email='$email', password='$password' WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                // Přesměrování na stránku se seznamem uživatelů
                header("Location: read.php");
                exit; // Ukončení skriptu po přesměrování
            } else {
                echo "Chyba: " . $conn->error;
            }
        }

        $conn->close();
        ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="username">Uživatelské jméno:</label>
        <input type="text" id="username" name="username" value="<?php echo $row['username']; ?>" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required>
        <button type="submit">Uložit změny</button>
    </form>
</div>
</body>
<script src="header.js"></script>
</html>


