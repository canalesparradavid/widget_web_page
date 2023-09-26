<?php

interface IScreen {
    public function fits(IWidget $widget) : bool;
    public function put(IWidget $widget) : void;
    public function display() : void;
}

?>
