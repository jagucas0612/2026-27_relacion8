<?php 
define("RUTABASE", dirname(__FILE__));
//define("MODO_TRABAJO","produccion"); //en "produccion o en desarrollo
define("MODO_TRABAJO","desarrollo"); //en "produccion o en desarrollo

if (MODO_TRABAJO=="produccion")
    error_reporting(0);
    else 
        error_reporting(E_ALL);  

spl_autoload_register(function ($clase){
    $rutas=[RUTABASE."/scripts/clases/", RUTABASE."/aplicacion/clases"];
    foreach($rutas as $ruta) {
        $fichero=$ruta."$clase.php";
        if (file_exists($fichero)) {
            require_once($fichero);
            return;
        }
    }
    throw new Exception("La clase $clase no se ha encontrado.");
});


include(RUTABASE."/aplicacion/plantilla/plantilla.php");

//creo todos los objetos que necesita mi aplicación
const COLORESTEXTO = [
    "negro" => ["black", "FFFFFF"],
    "blanco" => ["white", "000000"],
    "rojo" => ["red", "FF0000"],
    "verde" => ["green", "00FF00"],
    "azul" => ["blue", "0000FF"],
    "amarillo" => ["yellow","FFFF00"],
    "morado" => ["purple","FF00FF"]
];
const COLORESFONDO = [
    "negro" => ["black", "FFFFFF"],
    "blanco" => ["white", "000000"],
    "rojo" => ["red", "FF0000"],
    "verde" => ["green", "00FF00"],
    "azul" => ["blue", "0000FF"],
    "amarillo" => ["yellow","FFFF00"],
    "morado" => ["purple","FF00FF"]
];

session_start();

$acl = new ACLArray();
$acceso = new Acceso();