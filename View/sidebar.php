<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <?php
    define('SIDEBASE', '/connectionBD');
    $style = SIDEBASE . '/styles/sidebar.css';
    $img = SIDEBASE . '/Img/Icon-Chef-hat.png';
    $home = SIDEBASE . '/View/index.php';
    $mesa = SIDEBASE . '/View/Mesa/mesa.php';
    $cardapio = SIDEBASE . '/View/Produto/cardapio.php';
    $funcionario = SIDEBASE . '/View/Funcionarios/funcionarios.php';
    $pedidos = SIDEBASE . '/View/Pedidos/pedidos.php';
    $venda = SIDEBASE . '/View/Venda/vendas.php';

    ?>

    <link rel="stylesheet" href="<?= $style ?>">


    <!----===== Imports CSS and JS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
        crossorigin="anonymous"></script>


    <!--<title>Dashboard Sidebar Menu</title>-->
</head>

<body>

    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="<?= $img ?>">
                </span>

                <div class="text logo-text">
                    <span class="name">Rocket Food</span>
                    <span class="profession">dev for school</span>
                </div>
            </div>

            <!-- Celular -->
            <i class='bx bx-chevron-right toggle'></i>

            <!-- Computador -->
            <!-- <i class='toggle'></i> -->

        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li>

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="<?= $home ?>">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Home</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="<?= $mesa ?>">
                            <i class='bx bx-table icon'></i>
                            <span class="text nav-text">Mesas</span>
                        </a>
                    </li>



                    <li class="nav-link">
                        <a href="<?= $cardapio ?>">
                            <i class='bx bx-food-menu icon'></i>
                            <span class="text nav-text">Cardapio</span>
                        </a>
                    </li>

                    <!-- <li class="nav-link">
                        <a href="<?= $pedidos ?>">
                            <i class='bx bx-bar-chart-alt-2 icon'></i>
                            <span class="text nav-text">Pedidos</span>
                        </a>
                    </li> -->

                    <li class="nav-link">
                        <a href="<?= $venda ?>">
                            <i class='bx bx-shopping-bag icon'></i>
                            <span class="text nav-text">Vendas</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="<?= $funcionario ?>">
                            <i class='bx bx-user icon'></i>
                            <span class="text nav-text">Funcionarios</span>
                        </a>
                    </li>




                </ul>
            </div>

            <hr>

            <div class="bottom-content">
                <li class="">
                    <a href="#">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                <!-- <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li> -->

            </div>
        </div>

    </nav>

    <script>

        const body = document.querySelector('body'),
            sidebar = body.querySelector('nav'),
            toggle = body.querySelector(".toggle"),
            searchBtn = body.querySelector(".search-box"),
            modeSwitch = body.querySelector(".toggle-switch"),
            modeText = body.querySelector(".mode-text");





        sidebar.addEventListener("mouseover", () => {
            sidebar.classList.remove("close");
        })

        sidebar.addEventListener("mouseout", () => {
            sidebar.classList.toggle("close");
        })



        // modeSwitch.addEventListener("click", () => {
        //     body.classList.toggle("dark");

        //     if (body.classList.contains("dark")) {
        //         modeText.innerText = "Light mode";
        //     } else {
        //         modeText.innerText = "Dark mode";

        //     }
        // });

    </script>


</body>

</html>