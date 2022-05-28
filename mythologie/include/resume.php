<?php
    //A limiter le nombre de caractère
    function resume($description, $nbChar){
        $resume=$description;
        if(strlen($description) >= $nbChar)
        $resume = substr($description, 0, $nbChar).' ...';
        return $resume;
    }

?>