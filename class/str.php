<?php

class str{

    static function random($length){
        $alphaNum = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
            return substr(str_shuffle(str_repeat($alphaNum, $length)), 0, $length);
    }
}