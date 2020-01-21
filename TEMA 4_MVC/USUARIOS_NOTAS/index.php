<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>MVC</title>
        <link rel="stylesheet" href="assets/css/estilo.css>">
    </head>
    <body>
    <ul>

    <h1>EJEMPLO DE MVC</h1>

    <li><a href="index.php">Inicio</a></li>
    <li><a href="index.php?c=Notas&a=listarTodasNotas">Ver todas las notas</a></li>
    <li><a href="index.php?c=Notas&a=insertarNotas">Insertar notas</a></li>


    </ul>
        <?php
        session_start();

        require_once 'models/Database.php';
        require_once 'helpers/utils.php';

        // carga todos los controladores

        require_once 'controllers/UsuariosController.php';
        require_once 'controllers/NotasController.php';


        if(!isset($_GET['c']) || !isset($_GET['a'])) {
            $controlador = new UsuariosController();
            $controlador -> index();
        }

        else {
            $nombre_controlador = $_GET['c'].'Controller';
            if (class_exists($nombre_controlador)) {
                $controlador = new $nombre_controlador();
                if (method_exists($controlador,$_GET['a'])) {
                    $action = $_GET['a'];
                    $controlador -> $action();
            }
                else {
                    echo "La página no existe";       
        }
    }
            else {
                echo "La página no existe";
            }
            }

        ?>
    </body>
</html>