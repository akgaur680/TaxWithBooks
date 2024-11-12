<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaxWithBooks</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.ico.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a76cf7799c.js" crossorigin="anonymous"></script>
    <link href="../style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <header class="container-fluid">
            <nav class="container navbar navbar-expand-lg menu">
                <div class="container-fluid">
                    <a class="navbar-brand " href="index.php"><img class="logo" src="../img/logo.png"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto  mb-2 mb-lg-0">
                            <li class="nav-item ">
                                <a class="nav-link active" aria-current="page" href="index.php"><i class="fa-solid fa-house fa-lg" style="color: #ffffff;"></i> &nbsp;<span>Home</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" aria-current="page" href="about.php"><i class="fa-solid fa-blog fa-lg" style="color: #ffffff;"></i> &nbsp;<span>About us</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" aria-current="page" href="posted_article.php"><i class="fa-solid fa-blog fa-lg" style="color: #ffffff;"></i> &nbsp;<span>Posted Articles</span></a>
                            </li>
                           
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="article.php"><i class="fa-solid fa-newspaper fa-lg" style="color: #ffffff;"></i>&nbsp;<span>Articles</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="post.php"><i class="fa-solid fa-newspaper fa-lg" style="color: #ffffff;"></i>&nbsp;<span>Submit Post</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" aria-current="page" href="contact.php"><i class="fa-solid fa-walkie-talkie fa-lg" style="color: #fcfcfc;"></i> &nbsp;<span>Talk To us</span></a>
                            </li>
                        </ul>
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-dark bg-light" type="submit">Search</button>
                        </form>&nbsp;&nbsp;
                        <?php
                        session_start();

                        if (isset($_SESSION['name'])) {
                            echo '<div class="dropdown" >
                            <a class="btn btn-secondary dropdwon-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Hi ' . $_SESSION['name'] . '</a>
                            <ul class="dropdown-menu" >
                            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                            </div>';
                        } else {
                            echo '
                        <a class="nav-link active" aria-current="page" href="login.php"><i class="fa-solid fa-right-to-bracket fa-lg" style="color: #ffffff;"></i> &nbsp;<span>Login/Signup</span></a>';
                        }
                        ?>
                    </div>
                </div>
            </nav>
        </header>
        <!-- Header Ends Here -->