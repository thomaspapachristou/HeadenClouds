<?php 

class auth{

    private $options = [
        'restrict_msg' => "Error : Access Denied - Vous ne pouvez pas accéder à cette page"
    ];
    private $session;

    public function __construct($session, $options = []){
        $this->options = array_merge($this->options, $options);
        $this->session = $session;
    }

    public function cryptPassword($password) {
        return $password = password_hash($password, PASSWORD_BCRYPT);
    }

    public function register($db, $username, $password, $email) {
                  $password = $this->cryptPassword($password);
                  $token = str::random(70);
                  $db->query("INSERT INTO users SET username = ?, password = ?, email = ?, confirmation_token = ?", [
                    $username, 
                    $password, 
                    $email, 
                    $token
                  ]);                 
                  $user_id = $db->lastInsertId();
                  mail::sendMail($email,'Confirmation de votre compte',"Afin de valider votre compte...Merci de cliquer sur ce lien : \n\n http://localhost/headenclouds/inscriptionconfirm.php?id=$user_id&token=$token");
    }

    public function confirmAccount($db, $user_id, $token) {

        //  IF "user_id" n'est pas numérique ou que le token est supérieur à 70 caractères
        if(!is_numeric($user_id) || strlen($token) < 70){
            die('corrupted request');
        }

        $user = $db->query('SELECT * FROM users WHERE id = ?', [$user_id])->fetch();

        if ($user && $user->confirmation_token == $token) {
            $db->query('UPDATE users SET confirmation_token = NULL, date_account = NOW() WHERE id = ?', [$user_id]);
            $this->session->write('auth', $user);
            return true;

        }
        return false;
    }

    public function restrictAccess() {

        if(!$this->session->read('auth')) {
            $this->session->setFlash('danger', $this->options['restrict_msg']);
            header('Location: connexion.php'); // à modifier
            exit();

        }
    }

    public function userSession(){
        if (!$this->session->read('auth')){
            return false;
        }
        return $this->session->read('auth');
    }

    public function connect($user) {
        $this->session->write('auth', $user);
    }

    public function connectCookie($db){
        // Vérification si l'utilisateur a des cookies en mémoire
        if(isset($_COOKIE['remember']) && !$this->userSession()){
            $remember_token = $_COOKIE['remember'];
            $partsCookie = explode('==', $remember_token);
            $user_id = $partsCookie[0];
            $user = $db->query('SELECT * FROM users WHERE id = ?', [$user_id])->fetch();

            if($user) {
                $expectedCookie = $user_id . '==' . $user->remember_token . sha1($user_id . 'wolfouf' );

                if($expectedCookie == $remember_token) {
                    $this->connect($user);
                    $_SESSION['flash']['success'] = 'Vous étiez déjà connecté ... Tentative de reconnexion en cours, veuillez actualiser.';
                    setcookie('remember', $remember_token, time() + 60 * 60 * 24 * 7);
                } else {
                    setcookie('remember', null, -1);
                }
            } else {
                setcookie('remember', null, -1);
            }
        }
    }

    public function login($db, $username, $password, $remember) {

            $user = $db->query('SELECT * FROM users WHERE (username = :username OR email = :username) AND date_account IS NOT NULL', ['username' => $username])->fetch();

            if(empty($user)){
                return false;
            }
            // Check auto du hashage pour éviter d'écrire la blinde de ligne et d'avoir des erreurs de sécu
            if(password_verify($password, $user->password)) {
                $this->connect($user);
                if($remember){
                    $this->remember($db, $user->id);
               }
                return $user;
            }else{
                return false;
            }
        }

        public function remember($db, $user_id) {

            $remember_token = str::random(250);
            $db->query('UPDATE users SET remember_token = ? WHERE id = ?', [$remember_token, $user_id]);
            setcookie('remember', $user_id . '==' . $remember_token . sha1($user_id . 'wolfouf' ), time() + 60 * 60 * 24 * 7);
          }

          public function logout() {
              setcookie('remember', NULL, -1);
              $this->session->deleteSessionUser('auth');
          }

          public function resetPassword($db, $email) {

              $user = $db->query('SELECT * FROM users WHERE email = ? AND date_account IS NOT NULL', [$email])->fetch();

              if ($user) {
                  $reset_token = str::random(60);
                  $db->query('UPDATE users SET reset_token = ?, reset_at = NOW() WHERE id = ?', [$reset_token, $user->id]);
                  $_SESSION['flash']['success'] = 'Un email de confirmation a bien été envoyé pour la rénitialisation de votre mot de passe !'; // Intégration d'un modal à l'avenir ...
                  mail::sendMail($_POST['email'],'Renitialisation de mot de passe',"Afin de finaliser la procedure...Merci de cliquer sur ce lien : \n\n http://localhost/resetpassword.php?id={$user->id}&token=$reset_token");
                  return $user;
              }else{
                  return false;
              }
          }

          public function checkResetToken($db, $user_id, $token) {

              return $db->query('SELECT * FROM users WHERE id = ? AND reset_token IS NOT NULL AND reset_token = ? AND reset_at > DATE_SUB(NOW(), INTERVAL 30 MINUTE', [$user_id, $token])->fetch();

          }
       }