<?php

include_once "Models/Config.php";
include_once "Models/Screen.php";
include_once "Services/ScreenFiller.php";

$a = file_get_contents("config.json");
$b = json_decode($a);

$config = Config::FromJSON($a);
$screen = new Screen($config->title, $config->width, $config->height);
$screenFiller = new ScreenFiller($screen);

$screenFiller->fill($config->widgets);
$screen->display();

?>
