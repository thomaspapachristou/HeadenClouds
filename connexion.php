<?php
    require 'header.php';
    $auth = app::getAuth();
    $db = app::getDatabase();
    $auth->connectCookie($db);


    if ($auth->userSession()) {
      app::redirect("account.php");
    }

    if(!empty ($_POST) && !empty($_POST['username']) && !empty($_POST['password'])) {
        $user = $auth->login($db, $_POST['username'], $_POST['password'], isset($_POST['remember']));
        $session = session::getInstance();
        if($user){
            $session->setFlash('success', 'Vous êtes dorénavant connecté');
            app::redirect("account.php");

        }else{
            $session->setFlash('danger', 'Identifiant ou mot de passe incorrect');
        }
    }

?>
  
  <?php require 'header.php' ?>

  <div class="bg">

    <div class="container" style="position: relative; top: 30%;">
        <form action="" method="POST">

            <div class="form-group">
              <label for="exampleInputEmail1">PSEUDO OU ADRESSE MAIL</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Votre e-mail ou pseudo..." name="username">
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Mot de passe <a href="forgetpassword.php" style = "color : cyan; text-decoration : underline;"> (Mot de passe oublié ?)</a></label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Votre mot de passe, vous ne l'avez pas oublié j'espère ?!" name="password">
            </div>

            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="inlineFormCheckMD" name="remember" value="1"/>
              <label class="form-check-label" for="inlineFormCheckMD">Se souvenir de moi </label>
            </div>

            <button type="submit" class="btn btn-primary">CONNEXION</button>
          </form>
      </div>
    </div>


<?php require 'footer.php' ?>