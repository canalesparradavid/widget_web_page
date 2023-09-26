<?php

include_once "Models/Interfaces/IWidget.php";
include_once "Models/Interfaces/IScreen.php";
include_once "Models/Config.php";
//include_once "widgets/dummy/Dummy.php";

class Screen implements IScreen {
    private Array $widgets = [];
    private Array $screenMatrix = [];
    private Array $auxScreenMatrix = [];
    private String $title;
    private int $width;
    private int $height;

    public function __construct(String $title, int $width, int $height)
    {
        $this->title = $title;
        $this->width = $width;
        $this->height = $height;

        for ($row = 0; $row < $height; $row++) {
            for ($column = 0; $column < $width; $column++) {
                $this->screenMatrix[$row][$column] = 0;
                $this->auxScreenMatrix[$row][$column] = 0;
            }
        }
    }

    public function fits(IWidget $widget) : bool
    {
        $x = $widget->x;
        $y = $widget->y;
        $width = $widget->width;
        $height = $widget->height;

        if ($x + $width > $this->width || $y + $height > $this->height) return false;

        for ($row = $y; $row < $height + $y; $row++) {
            for ($column = $x; $column < $width + $x; $column++) {
                if ($this->screenMatrix[$row][$column] != 0) return false;
            }
        }

        return true;
    }

    public function put(IWidget $widget) : void
    {$this->widgets[] = $widget;

        $x = $widget->x;
        $y = $widget->y;
        $width = $widget->width;
        $height = $widget->height;

        for ($row = $y; $row < $height + $y; $row++) {
            for ($column = $x; $column < $width + $x; $column++) {
                $this->screenMatrix[$row][$column] = count($this->widgets);
            }
        }
    }

    public function display() : void
    {
        echo "<table>";
        for ($row = 0; $row < $this->height; $row++) {
            echo "<tr>";
            for ($column = 0; $column < $this->width; $column++) {
                $numeroWidget = $this->screenMatrix[$row][$column];

                if ($this->auxScreenMatrix[$row][$column] != 0) continue;

                if ($numeroWidget == 0) {
                    echo "<td><span class=\"emptycell\">.</span></td>";
                    continue;
                }

                $widget = $this->widgets[$numeroWidget - 1];
                $colSpan = $widget->width;
                $rowSpan = $widget->height;

                for ($i = 0; $i < $colSpan; $i++) {
                    for ($j = 0; $j < $rowSpan; $j++) {
                        $this->auxScreenMatrix[$row + $j][$column + $i] = -1;
                    }
                }

                echo "<td class=\"widgetcell\" colspan=\"$colSpan\" rowspan=\"$rowSpan\">".
                    $widget->name.
                    "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }

    public function displayMatrix() : void
    {
        echo "<table>";
        for ($row = 0; $row < $this->height; $row++) {
            echo "<tr>";
            for ($column = 0; $column < $this->width; $column++) {
                echo "<td>" . $this->screenMatrix[$row][$column] . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}

?>
