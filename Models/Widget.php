<?php

include_once "Models/Interfaces/IWidget.php";

class Widget implements IWidget
{

    public String $name;
    public int $x;
    public int $y;
    public int $width;
    public int $height;
    public Array $dimension;
    public String $route;

    public function __construct(String $name,
                                String $route,
                                int $x,
                                int $y,
                                int $width,
                                int $height)
    {
        $this->name = $name;
        $this->route = $route;
        $this->x = $x;
        $this->y = $y;
        $this->width = $width;
        $this->height = $height;
    }

    public static function FromJSON(String $json_text) : IWidget
    {
        $json = json_decode($json_text);

        $name = $json->{"name"} ?? "";
        $route = $json->{"route"} ?? "widgets/dummy";
        $position = $json->{"position"} ?? Array("X"=>-1,"Y"=>-1);
        $dimension = $json->{"dimension"} ?? Array("X"=>-1,"Y"=>-1);

        $className = explode("/", $route);
        $className = ucfirst($className[count($className)-1]) . "Widget";

        include_once $route . "/" . $className . ".php";
        $widget = new $className(
            $name,
            $route,
            ($position->{"X"} ?? $position->{"x"} ?? -1) - 1,
            ($position->{"Y"} ?? $position->{"y"} ?? -1) - 1,
            $dimension->{"width"} ?? $dimension->{"x"} ?? -1,
            $dimension->{"height"} ?? $dimension->{"y"} ?? -1);

        return $widget;
    }

    public function build() : String
    {
        return "";
    }
}

?>
