<?php

// Pour en faire l'appel, on écrit (exemple) || app::getDatabase
    class app{
        static $db = null;
        
        static function getDatabase(){
            if(!self::$db) {
                self::$db = new database('admin', 'admin', 'headenclouds');
            }
            
            return self::$db;
        }

        static function redirect($location){
            header("Location: $location");
        }

        static function getAuth() {
            return new auth(session::getInstance());
        }
    }