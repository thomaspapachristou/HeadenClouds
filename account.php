 <?php
    require 'header.php';

    app::getAuth()->restrictAccess();
    
    if(!empty($_POST)) {


      if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']) {
         $_SESSION['flash']['danger'] = "Erreur lors de la modification de mot de passe";
         exit();
         
      } else {
         $user_id = $_SESSION['auth']->id;
         $password= password_hash($_POST['password'], PASSWORD_BCRYPT);
         require_once 'db/DB.php';
         $pdo->prepare('UPDATE users SET password = ?')->execute([$password]);
         $pdo->prepare ('UPDATE users SET password = ? WHERE id = ?')->execute([$password, $user_id]);
         $_SESSION['flash']['success'] = "Votre mot de passe a bien été mis à jour";

      }
    }

    ?>
    
    <div class="bg">

    <div style = "position : relative; top : 10%; color : white;">
    <h1>Mon espace Headen</h1>
    <h2> Coucou <?= $_SESSION['auth'] -> username; ?> </h2>

   <form action="#" method="post">

         <div class="form-group"> 
            <label for="password" style="margin-right:10px;">Votre nouveau mot de Passe</label>
            <input type="password" name="password" placeholder = "Changement de mot de passe"/>
         </div>

         <div class="form-group">
         <label for="password">Répétez votre nouveau mot de Passe</label>
            <input type="password" name="password_confirm" placeholder = "Confirmez votre mot de passe"/>
         </div>

         <button type="submit" class="btn btn-primary">VALIDER</button>

    </form> 

   </div>       <!--  end main div -->
</div>          <!--  end bg -->
    
<?php require 'footer.php'; ?>
