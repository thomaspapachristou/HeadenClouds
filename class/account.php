<?php

class account
{

    public static function passwordChange() {

        $db = null;
        if(!empty($_POST)) {
            if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']) {
                $_SESSION['flash']['danger'] = "Erreur lors de la modification de mot de passe";
                app::redirect("account.php");

            } else {
                $user_id = $_SESSION['auth']->id;
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $db = app::getDatabase();;
                $db->query('UPDATE users SET password = ?', [$password]);
                $db->query('UPDATE users SET password = ? WHERE id = ?', [$password, $user_id]);
                $_SESSION['flash']['success'] = "Votre mot de passe a bien été mis à jour";
                app::redirect("account.php");

            }
        }
    }
}