<?php

// >>> object : database <<<
    

class database{

    // Propriété PDO (car si utilisation de variable, on la perd ... on devra la répéter =/= cleancode);

    private $pdo;

    // Connexion à la database;
    public function __construct($login, $password, $databaseName, $host = 'localhost') {

        $this->pdo = new PDO ("mysql:dbname=$databaseName;host=$host", $login, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }
    

    // $query = La requête SQL préparée ($pdo->prepare);
   //  $parameters = Les paramètres récupérées en PHP ($pdo->execute) || par défault false car on a parfois aucun paramètre;

    public function query($query, $parameters = false) {

        if($parameters){
            $request = $this->pdo->prepare($query);
            $request->execute($parameters);
        }else{
            $request =  $this->pdo->query($query);
        }
        
            return $request; // On ne fait pas un fetch() immédiatement si on veut fetch all okaoù.
    }

    public function lastInsertId() {
           return $this->pdo->lastInsertId();
    }
}