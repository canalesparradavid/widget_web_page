<?php

include_once "Models/Interfaces/IBuildableFromJSON.php";

interface IWidget extends IBuildableFromJSON {
    public function build() : String;
}

?>
