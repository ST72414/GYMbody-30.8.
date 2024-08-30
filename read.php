<!DOCTYPE html>
<html lang="cs">
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
    <title>Seznam přihlášených uživatelů</title>
    <link rel="stylesheet" href="read.css">
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
<div class="container">
    <h1>Seznam přihlášených uživatelů</h1>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Uživatelské jméno</th>
            <th>Email</th>
            <th>Akce</th>
        </tr>
        </thead>
        <tbody>
            <?php

            $servername = "localhost";
            $username = "terezaK";
            $password = "terezaK5";
            $dbname = "gymbody";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }


            $sql = "SELECT * FROM users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["id"] . "</td>
                                <td>" . $row["username"] . "</td>
                                <td>" . $row["email"] . "</td>
                                <td>
                                    <a href='update.php?id=" . $row["id"] . "' class='edit-btn'>Upravit</a>
                                    <a href='delete.php?id=" . $row["id"] . "' class='delete-btn'>Smazat</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Žádní uživatelé nenalezeni.</td></tr>";

            }

            $conn->close();
            ?>
        </tbody>
    </table>
</div>
</body>
<script src="header.js"></script>
</html>

