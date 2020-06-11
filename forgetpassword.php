
<?php
require 'header.php';
  //  We check the information and we store the information in an array
  // On vérifie les informations et on stocke les informations dans un tableau
  if(!empty ($_POST) && !empty($_POST['email'])) {
      $db = app::getDatabase();
      $auth = app::getAuth();
      $session = session::getInstance();

      if($auth->resetPassword($db, $_POST['email'])){
          $session->setFlash('success', 'Un email a bien été envoyé à votre adresse !');
          app::redirect('index.php');
      }else{
          $session->setFlash('danger', 'L\'email indiqué n\'est pas reconnu');
      }
}

?>

  <div class="bg">

    <h1> Mot de passe oublié </h1>

    <div class="container" style="position: relative; top: 30%;">
        <form action="" method="POST">

            <div class="form-group">
              <label for="exampleInputEmail1">ADRESSE MAIL</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Votre e-mail ou pseudo..." name="email">
            </div>

            <button type="submit" class="btn btn-primary">Envoyez-moi un email !</button>
          </form>
      </div>
    </div>


<?php require 'footer.php' ?>