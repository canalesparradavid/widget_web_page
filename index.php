<?php

include_once "Models/Config.php";
include_once "Models/Screen.php";
include_once "Services/ScreenFiller.php";

$config_json_text = file_get_contents("config.json");

$config = Config::FromJSON($config_json_text);
$screen = new Screen($config->title, $config->width, $config->height);
$screenFiller = new ScreenFiller($screen);

$screenFiller->fill($config->widgets);
$screen->display();

?>
