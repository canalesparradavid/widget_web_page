<?php

include_once "Services/Interfaces/IScreenFiller.php";

class ScreenFiller implements IScreenFiller {
    private IScreen $screen;

    public function __construct(IScreen $screen)
    {
        $this->screen = $screen;
    }

    public function fill(Array $widgets)
    {
        $this->loadHeader();
        foreach ($widgets as $widget) {
            if ($this->screen->fits($widget)) {
                $this->screen->put($widget);
            }
        }
        $this->loadFooter();
    }

    public function loadHeader()
    {
        $scripts = [];
        $styles = [
            "widget_container.css"
        ];

        foreach ($scripts as $script) {
            echo "<script src=\"www/js/$script\"></script>";
        }

        foreach ($styles as $style) {
            echo "<link rel=\"stylesheet\" href=\"www/css/$style\">";
        }
    }

    public function loadFooter()
    {
        $scripts = [];

        foreach ($scripts as $script) {
            echo "<script src=\"www/js/$script\"></script>";
        }
    }
}

?>
