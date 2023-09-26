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
