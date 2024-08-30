<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GymBody/Registrace</title>
    <link rel="stylesheet" href="index.css">
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
<main>
    <div class="container">
        <div class="content">
            <div class="todo-app">
                <h2>GYMList</h2>
                <div class="row">
                    <input type="text" id="input-box" placeholder="Vložte poznámku">
                    <button id="AddTaskBtn" onclick="AddTaskBtn()">Vložit</button>
                </div>
                <ul id="list-container">
                    <!--
                    <li class="checked">Task1</li>
                    <li>Task2</li>
                    <li>Task3</li>
                    <li>Task4</li> -->
                </ul>
            </div>
        </div>
        <div class="logreg-box">
            <noscript>
                <style>
                    /**
                    * Reinstate scrolling for non-JS clients
                    */
                    .simplebar-content-wrapper {
                        scrollbar-width: auto;
                        -ms-overflow-style: auto;
                    }

                    .simplebar-content-wrapper::-webkit-scrollbar,
                    .simplebar-hide-scrollbar::-webkit-scrollbar {
                        display: initial;
                        width: initial;
                        height: initial;
                    }
                </style>
            </noscript>
            <div class="planner">
                <h1>Cvičební plán</h1>
                <div id="calendar" class="calendar-grid"></div>
            </div>
            <button class="add-task-btn" onclick="showAddTaskModal()"> Přidat </button>
            <div id="addTaskModal" class="modal">
                <div class="modal-content">
                            <span class="close" onclick="closeAddTaskModal()">
                                &times;
                            </span>
                    <h2>Vložit Cvik</h2>
                    <input type="date" id="task-date">
                    <input type="text" id="task-desc" placeholder="Název cviku">
                    <button onclick="addTask()">Vložit cvik</button>
                </div>
            </div>
        </div>
    </div>

    <div class="parent-container">
        <div class="slideshow-container">

            <div class="mySlides fade">
                <div class="numbertext">1 / 4</div>
                <div class="card">
                    <img src="./IMG/MUŽ%202.jfif" alt="John" style="width: 300px; height: 450px">
                    <h1>Jan Novák</h1>
                    <p class="title">Trenér žen i mužů, Vítěz Men's Physique 2022</p>
                    <p>Bodyflex Hradec Králové</p>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <p><button>Contact</button></p>
                </div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">2 / 4</div>
                <div class="card">
                    <img src="./IMG/ŽENA2.jpg" alt="John" style="width: 300px; height: 450px">
                    <h1>Kateřina Bílková</h1>
                    <p class="title">Trenérka žen, Vítězka MS Swimsuit 2020</p>
                    <p>Bodyflex Hradec Králové</p>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <p><button>Contact</button></p>
                </div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">3 / 4</div>
                <div class="card">
                    <img src="./IMG/MUŽ1.jfif" alt="John" style="width: 300px; height: 450px">
                    <h1>Marcel Drašar</h1>
                    <p class="title">Trenér mužů, Druhé místo Men's Natural Bodybuilding 2023</p>
                    <p>Bodyflex Hradec Králové</p>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <p><button>Contact</button></p>
                </div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">4 / 4</div>
                <div class="card">
                    <img src="./IMG/ŽENA3.jfif" alt="John" style="width: 300px; height: 450px">
                    <h1>Eliška Obstová</h1>
                    <p class="title">Trenérka žen i mužů, Vítězka MS Bikini Fitness Juniorky do 23 let 2021</p>
                    <p>Bodyflex Hradec Králové</p>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <p><button>Contact</button></p>
                </div>
            </div>


            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>

        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            <span class="dot" onclick="currentSlide(4)"></span>
        </div>
    </div>
    </div>
</main>
<script src="index.js"></script>
<script src="header.js"></script>
<a href="file:///D:/PHP/GymBody/GymBody/homepage/.idea/php.xml"></a>
</body>
</html>