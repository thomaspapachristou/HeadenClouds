<?php

    
    class validator{       
        private $data;             // $data = Les données qu'on récupère avec $_POST
        private $errors = [];       // ||$errorValid = Les erreurs lors de la saisie

        public function __construct($data){
            $this->data = $data;
        }

        private function getField($field) {
            if(!isset($this->data[$field])) {
                return null;
            }
            return $this->data[$field];
        }

        public function pseudoIsValid($field, $errorValid) {                       // ||$field = Le champs (username, password, etc)
            if(!preg_match('/^[a-z0-9_A-Z]+$/', $this->getField($field))) {
                $this->errors[$field] = $errorValid;
            }
        }

        // Puisque isAvailable nécessite la connexion de la DB, cette fonction sera forcément appeler avec la fonction statique PDO.
        // $db est alors forcément déclaré dans le fichier où on fait appel à cette fonction, d'où le $db ici.
        // Pas de dépendance entre objet :)
        public function isAvailable($field, $db, $table, $errorValid) {
            $availableOrNot = $db->query("SELECT id FROM $table WHERE $field = ?", [$this->getField($field)])->fetch();
            if($availableOrNot) {
                $this->errors[$field] = $errorValid;
              }
        }

        public function isEmail($field, $errorValid) {
            if(!filter_var($this->getField($field), FILTER_VALIDATE_EMAIL)) {
                $this->errors[$field] = $errorValid;
            }
        }

        public function isConfirmed($field, $errorValid) {
            // erreur si je n'utilise pas de variable ????
            $valueVerification = $this->getField($field);
            if(empty($valueVerification) || $valueVerification != $this->getField($field . '_confirm')) {
                $this->errors[$field] = $errorValid;
            }
        }

        public function isSubmitted() {
            return empty($this->errors);
        }

        public function getErrors() {
            return $this->errors;
        }
    }