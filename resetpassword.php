  <?php
  require 'header.php';

    if(isset($_GET['id']) && isset($_GET['token'])) {
        $auth = app::getAuth();
        $db = app::getDatabase();
        $user = $auth->checkResetToken($db, $_GET['id'], $_GET['token']);

        if($user) {
            if(!empty($_POST)) {
                $validator = new validator($_POST);
                $validator->isConfirmed('password', 'Les mots de passe ne correspondent pas');

                if($validator->isSubmitted()) {
                    $password = $auth->cryptPassword($_POST['password']);
                    $db->query('UPDATE users SET password = ?, reset_token = NULL WHERE id = ?', [$password, $_GET['id']]);
                    $auth->connect($user);
                    session::getInstance()->setFlash('success', 'Votre mot de passe a bien été modifié !');
                    app::redirect('account.php');
                }
            }

        }else{
            session::getInstance()->setFlash('danger', 'La page \'existe pas');
            app::redirect('index.php');
            exit();
        }

    } else {
        session::getInstance()->setFlash('danger', 'Access Denied - Corrupted Request');
        app::redirect('index.php');
    }
?>

<div class="bg">

  <div class="container" style="position: relative; top: 30%;">
      <form action="" method="POST">

          <div class="form-group">
            <label for="exampleInputPassword1">Nouveau mot de passe</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="..." name="password">
          </div>

          
          <div class="form-group">
            <label for="exampleInputPassword1">Confirmez votre nouveau mot de passe</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="..." name="password_confirm">
          </div>


          <button type="submit" class="btn btn-primary">ENVOYER</button>
        </form>
    </div>
  </div>


<?php require 'footer.php' ?>