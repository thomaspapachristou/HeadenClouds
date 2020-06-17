<?php require 'vendor/autoload.php';?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Headen Clouds</title>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/mdb.min.css" rel="stylesheet">
  <link href="css/style.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">  
</head>

<body>
  <!-- >>>#### NAVBAR ###<<< -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <div class="container">

      <!-- >>>LOGO<<< -->
      <a class="navbar-brand" href="index.php">
        <img src="img/logo/headencloudslogo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Headen Clouds
      </a>

      <!-- >>>RESPONSIVE NAVBAR<<< -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- >>> Flex une partie de la navbar [voir DOC et mr-] <<< -->
        <ul class="navbar-nav mr-auto">

          <li class="nav-item active">
            <a class="nav-link" href="index.php">HOME</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">A PROPOS</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">NOS SERVICES</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">PRO</a>
          </li>

        </ul>

        <!-- >>> FLEX une partie de la navbar (sign in / log in) [voir DOC et mr-] -->
        <ul class="navbar-nav nav-flex-icons">
            <?php if (session::getInstance()->isLogged()): ?>
              <li class="nav-item">
            <a href="account.php" class="nav-link"> MON COMPTE </a>
              </li>

          <li class="nav-item">
            <a href="logout.php" class="nav-link border border-info rounded text-alert border-info"> <i class="fas fa-sign-out-alt"></i> DECONNEXION </a>
          </li>

            <?php else: ?> 
                  <li class="nav-item">
                    <a href="inscription.php" class="nav-link"> INSCRIPTION</a>
                  </li>

                  <li class="nav-item">
                    <a href="connexion.php" class="nav-link border border-info rounded text-info border-info"> <i
                        class="far fa-user"></i> CONNEXION </a>
                  </li>
            <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>

          <?php

          // typeFlash = Success or Danger / étant donné qu'on utilise bootstrap || Permet d'afficher les messages flash et de les unset à l'actualisation
          if(session::getInstance()->hasFlash()): ?>
            <?php foreach(session::getInstance()->getFlash() as $typeFlash => $message): ?>

      <div class="alert alert-<?= $typeFlash; ?> fluid" style="position:relative;top:10%;z-index:555; text-align: center;">
            <?= $message; ?>
      </div>
  <?php endforeach ?>
<?php endif ?>


