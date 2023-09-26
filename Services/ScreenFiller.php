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
        foreach ($widgets as $widget) {
            if ($this->screen->fits($widget)) {
                $this->screen->put($widget);
            }
            else {
                echo $widget->name . " no entra.</br>";
            }
        }
    }
}

?>
