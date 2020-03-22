<?php 
	function isOnlyCharacter($var){
			if(!isset($var)||empty($var))
				return 7;
            if(strlen($var)<2){
                return 2;
            }
            if(strlen($var)>10){
                return 3;
            }
            if (preg_match("/^([a-zA-Z]+\s)*[a-zA-Z]+$/",$var))
            {
                return 1;
            }
            return 4;
        return false;
	}

	function isOnlyNumber($var){
        $var = trim($var," ");
		if(!isset($var)||empty($var))
				return 7;
        if (preg_match("/^\d+$/", $var))
        {
            return 1;
        }
        return 5;
        
    }

    function validateUserEmail($var){
    	if(!isset($var)||empty($var))
				return 7;
            if (preg_match("/^\w+([\.-]?\w+)*@nhs.net$/", $var))
            {
                return 1;
            }else if (preg_match("/^\w+([\.-]?\w+)*@[0-9a-zA-Z]+.nhs.uk$/", $var))
            {
                return 1;
            }
            return 6;   
    }
