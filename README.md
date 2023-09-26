# Widget Web Page
Este proyecto consiste de una página web modularizada en Widgets individuales y ampliables desarrollada con PHP 8.2.9.

### Instalación
Para instalar esta web siga los siguientes pasos:

1. Clonar el repositorio en una carpeta local
    ```bash
    git clone https://github.com/canalesparradavid/widget_web_page.git
    ```

2. Moverse dentro de la carpeta y abrir un servidor PHP
    ```bash
    cd widget_web_page
    php -S localhost:8000
    ```
3. Personalizar la configuración

    El fichero `config.json` toma el siguiente formato
    ```json
        {
            "title": "Titulo",
            "dimensions": [height,width],
            "theme": theme,
            "widgets": [
                {
                    "name": "Nombre Widget",
                    "route": "widgets/widget",
                    "position": {
                        "x": x,
                        "y": y
                    },
                    "dimension": {
                        "width": width,
                        "height": height
                    }
                }
            ]
        }
    ```

Donde `x`, `y`, `width` y `height` son enteros mayores o igual que 1 y `theme` toma alguno de los siguientes valores:

- Light
- Dark
- LightBlue
- DarkBlue

### Creación de Widgets
Se pueden crear nuevos widgets bajo el directorio de `widgets` en la raiz del proyecto y con el formato de nombre de fichero y clase  MiNuevoWidget**Widget**.php. El nombre de la clase debe coincidir con la subruta del fichero; por ejemplo, para el widget **MiNuevoWidget** la ruta será widget/**miNuevoWidget**/.

Estos Widgets extenderan la funcionalidad de la clase `Widget` implementada en el fichero `Models/Widget.php` y sobrescribirá el método `public function build() : String` en el que devolverá el contenido HTML del widget.

Una vez se ha creado el nuevo widget, este se vinculará a nuestra página web configurandolo en el fichero `config.json` como se puede observar en el ejemplo en el apartado de instalación.

Cabe destacar que en caso de que un widget no encajase en la matriz de widgets ya sea porque es demasiado grande o se solapa con otro widget, este se descartará y no aparecera en la pantalla.

**Ejemplo**: Supongamos que quiero crear un widget que me liste los ultimos email que he recibido.

* Paso 1: Creo el directorio `/widgets/email`.
* Paso 2: Creo un fichero dentro de `/widgets/email` llamado `EmailWidget.php`.
* Paso 3: Implemento `EmailWidget.php` de la siguiente forma:

```php
<?php

include_once "Models/Widget.php";

class EmailWidget extends Widget {
    public function build() : String
    {
        $html = "";

        /*

            Código para generar el HTML

        */

        return $html;
    }
}

?>
```
* Paso 4: Añadir el widget en el fichero `config.json`.

```json
{
    "title": "Titulo",
    "dimensions": [4,6],
    "theme": "Dark",
    "widgets": [
        {
            "name": "Email",
            "route": "widgets/email",
            "position": {
                "x": 1,
                "y": 1
            },
            "dimension": {
                "width": 1,
                "height": 1
            }
        }
    ]
}
```
* Paso 5: Ejecutar el programa.
