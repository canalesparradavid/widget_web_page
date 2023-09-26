<?php

include_once "Models/Widget.php";

class EmailWidget extends Widget {

    public function build() : String
    {
        return "email";
    }
}

?>
