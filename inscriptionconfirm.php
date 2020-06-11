 <?php
 require 'vendor/autoload.php';

 $db = app::getDatabase();


        if (app::getAuth()->confirmAccount($db, $_GET['id'], $_GET['token'], session::getInstance())) {
            session::getInstance()->setFlash('success', 'Votre compte est dorénavant fonctionnel, dès à présent vous pouvez partager !');
            app::redirect('account.php');

        } else {
            session::getInstance()->setFlash('danger', 'Le lien auquel vous essayez d\'accéder n\'est plus valide ! Error : invalidToken or corruptedRequest');
            app::redirect('index.php');
        }

?>