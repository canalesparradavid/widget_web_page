<?php

include_once "Models/ThemeType.php";
include_once "Models/Widget.php";
include_once "Models/Interfaces/IConfig.php";

class Config implements IConfig {
    public String $title;
    public int $width;
    public int $height;
    public ThemeType $theme;
    public Array $widgets = [];

    public function __construct(String $title,
                                int $x,
                                int $y,
                                ThemeType $theme,
                                Array $widgets)
    {
        $this->title = $title;
        $this->width = $x;
        $this->height = $y;
        $this->theme = $theme;
        $this->widgets = $widgets;
    }

    public static function FromJSON(String $json_text) : Config
    {
        $json = json_decode($json_text);
        $widget_array = $json->{"widgets"};

        $title = $json->{"title"} ?? "UNDEFINED";
        $dimensions = $json->{"dimensions"} ?? [0,0];
        $theme = constant("ThemeType::{$json->{"theme"}}") ?? ThemeType::Light;

        $widgets = [];
        foreach($widget_array as $widget) {
            $widgets[] = Widget::FromJSON(json_encode($widget));
        }

        return new Config($title, $dimensions[1], $dimensions[0], $theme, $widgets);
    }
}

?>
