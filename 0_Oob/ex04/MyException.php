<?php

class MyException extends Exception {

    function message()
    {
        $errorMsg = "Error:" . "the tag <" . $this->element . "> is invalid.";

        return $errorMsg;
    }
}

?>