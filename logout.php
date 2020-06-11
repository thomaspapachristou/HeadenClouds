<?php
require 'vendor/autoload.php';
app::getAuth()->logout();
session::getInstance()->setFlash('success', 'Vous êtes bien déconnecté');
app::redirect('index.php');

?>


