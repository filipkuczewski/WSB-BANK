<?php

session_start();

if (!isset($_SESSION['zalogowany'])) {

    header('Location: index.php');
    exit();
}

if (!isset($_SESSION['komunikat'])) {
    $_SESSION['komunikat'] = 1;
    echo "<script language='javascript' type='text/javascript'>alert('Witamy w naszym banku. Kliknij by przejść dalej.'); </script>";
}

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twoje konto bankowe </title>



    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../AdminLTE/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../AdminLTE/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">




</head>

<body>













    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white" style="margin-left: 0px; text-align: center;">
        <div class="container" style="margin-left: 0px;">
            <a href="zalogowany.php" class="navbar-brand">
                <img src="../FikuBank.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">FiKuBank</span>
            </a>

            <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="index3.html" class="nav-link">Twoje konto</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Historia przelewów</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Główna Lista rozwijana</a>
                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                            <li><a href="#" class="dropdown-item">Przelej pieniądze </a></li>
                            <li><a href="#" class="dropdown-item">Wyloguj się</a></li>

                            <li class="dropdown-divider"></li>

                            <!-- Level two dropdown-->
                            <li class="dropdown-submenu dropdown-hover">
                                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Lista w liście</a>
                                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                    <li>
                                        <a tabindex="-1" href="#" class="dropdown-item">level 2</a>
                                    </li>

                                    <!-- Level three dropdown-->
                                    <li class="dropdown-submenu">
                                        <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">level 2</a>
                                        <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                                            <li><a href="#" class="dropdown-item">3rd level</a></li>
                                            <li><a href="#" class="dropdown-item">3rd level</a></li>
                                        </ul>
                                    </li>
                                    <!-- End Level three -->

                                    <li><a href="#" class="dropdown-item">level 2</a></li>
                                    <li><a href="#" class="dropdown-item">level 2</a></li>
                                </ul>
                            </li>
                            <!-- End Level two -->
                        </ul>
                    </li>
                </ul>

                <!-- SEARCH FORM -->
                <form class="form-inline ml-0 ml-md-3">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </nav>
    <!-- /.navbar -->
















    <?php
    echo "<p>Witaj " . $_SESSION['user'] . '![<a href="logout.php">Wyloguj się!</a>] </p>';

    echo "<p><b>Drewno</b>: " . $_SESSION['drewno'];
    echo " | <b>Kamień</b>: " . $_SESSION['kamien'];
    echo " | <b>Zboże</b>: " . $_SESSION['zboze'] . "</p>";

    echo "<p><b>E-mail</b>: " . $_SESSION['email'];
    echo "<p><b>Data wygaśnięcia premium </b>: " . $_SESSION['dnipremium'] . "</p>";

    $dataczas = new DateTime('2150-05-01 9:33:59');
    echo "Data i czas serwera: " . $dataczas->format('Y-m-d H:i:s') . "<br>";

    $koniec = DateTime::createFromFormat('Y-m-d H:i:s', $_SESSION['dnipremium']);

    $roznica = $dataczas->diff($koniec);

    if ($dataczas < $koniec) {
        echo "Pozostało premium: " . $roznica->format('%y lat, %m mies, %d dni, %h godz, %i min, %s sek');
    } else {
        echo "Premium nieaktywne od: " . $roznica->format('%y lat, %m mies, %d dni, %h godz, %i min, %s sek');
    }

    ?>




    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-left:0px; min-height: auto;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"> Top Navigation <small>Example 3.0</small></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Layout</a></li>
                            <li class="breadcrumb-item active">Top Navigation</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>

                                <p class="card-text">
                                    Lewa góra
                                    </br> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vero incidunt et voluptatem. Natus, neque unde fugit expedita ad impedit ipsa suscipit? Dolores, eveniet qui! Placeat libero molestiae eveniet aliquam minima.
                                </p>

                                <a href="#" class="card-link">Card link</a>
                                <a href="#" class="card-link">Another link</a>
                            </div>
                        </div>

                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>

                                <p class="card-text">
                                    Some quick example text to build on the card title and make up the bulk of the card's
                                    content.
                                </p>
                                <a href="#" class="card-link">Card link</a>
                                <a href="#" class="card-link">Another link</a>
                            </div>
                        </div><!-- /.card -->
                    </div>
                    <!-- /.col-md-6 -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title m-0">Featured</h5>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">Special title treatment</h6>

                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>

                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h5 class="card-title m-0">Featured</h5>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">Special title treatment</h6>

                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            <?php
            echo $_SESSION['user'] . '![<a href="logout.php">Wyloguj się!</a>] </p>';
            ?>
        </div>
        <!-- Default to the left -->
        <strong>Filip Kuczewski &copy; 2020 z pomocą: <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    </footer>


    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../AdminLTE/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../AdminLTE/dist/js/adminlte.min.js"></script>
</body>

</html>