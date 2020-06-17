 <?php
    require 'header.php';
    app::getAuth()->restrictAccess();
    account::passwordChange();?>
    
    <div class="bg">

    <div style = "position : relative; top : 10%; color : white;">
    <h1>Mon espace Headen</h1>
    <h2> Coucou <?= $_SESSION['auth']->username; ?> </h2>

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

     <div>
        <label for="avatar">Choisissez le fichier que vous voulez partagez </label>
        <input type="file"
               id="file" name="avatar"
               accept="image/png, image/jpeg">
     </div>
</div>          <!--  end bg -->
    
<?php require 'footer.php'; ?>
