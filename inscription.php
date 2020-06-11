<?php require 'header.php' ?>

  <div class="bg">

      <?php

      if(!empty($_POST)){
          $errors = array();
          $db = app::getDatabase();
          $user = $_POST['username'];
          $email = $_POST['email'];
          

          $validator = new validator($_POST);
          $validator->pseudoIsValid('username', "votre pseudo : $user n'est pas valide.");
          $validator->isAvailable('username', $db, 'users', "Ce pseudo : $user est déjà utilisé.");
          $validator->isEmail('email', "Votre adresse email : $email n'est pas valide.");
          $validator->isAvailable('email', $db, 'users', "Cette adresse email : $email est déjà utilisé pour un autre compte.");
          $validator->isConfirmed('password', 'Votre mot de passe est incorrect ou champs vide, veuillez saisir de nouveau.');

              if ($validator->isSubmitted()) {

                    app::getAuth()->register($db, $_POST['username'], $_POST['password'], $_POST['email']);
                    session::getInstance()->setFlash('success', "L'inscription a bien été validé ! Vous devriez recevoir un email sur votre adresse pour valider votre compte : $email !");
                    app::redirect('connexion.php');
                    exit();
              } else {
                $errors = $validator->getErrors();
              }
           }

      ?>

    <h1 style="color: aliceblue; position: relative; top: 15%; margin-left: 10px;">Inscription</h1>
    <div class="container" style="position: relative; top: 30%;">
      <form action="" method="POST">

          <?php if(!empty($errors)): ?>

              <div class="alert alert-danger" style = "background-color : red; color : white;">
                  <p> Désolé mais ... </p>
                  <ul>
                      <?php foreach ($errors as $error): ?>
                          <li> <?= $error; ?> </li>
                      <?php endforeach; ?>
                  </ul>

              </div>
          <?php endif; ?>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="pseudoLOG1">PSEUDO</label>
            <input type="text" class="form-control" id="pseudoLOG1" placeholder="Pas d'insulte ;)" name="username"/>
          </div>

          <div class="form-group col-md-6">
            <label for="mailLOG1">E-Mail</label>
            <input type="text" class="form-control" id="mailLOG1" placeholder="Votre adresse mail..." name="email" />  <!-- on ne met pas le type email mais text pour le faire directement en php !-->
          </div>
        </div>

        <div class="form-group">
          <label for="passwordLOG1">Mot de Passe</label>
          <input type="password" class="form-control" id="passwordLOG1" placeholder="Mot de passe ..." name="password" />
        </div>
        <div class="form-group">
          <label for="passwordLOG2">Répétez votre mot de passe</label>
          <input type="password" class="form-control" id="passwordLOG2" placeholder="HOP HOP HOP on le répète !" name="password_confirm"/>
        </div>
       
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
               CONDITIONS GÉNÉRALES D'UTILISATION 
            </label>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">S'INSCRIRE</button>
      </form>
      </div>
    </div>
  </body>
  </html>