<?php

// function __autoload($clase) {
//     include 'clases/' . $clase . '.clase.php';
// }

function mi_autocargador($clase) {
    include 'clases/' . $clase . '.clase.php';
}

spl_autoload_register('mi_autocargador');

// O, utilizar una función anónima, a partir de PHP 5.3.0
spl_autoload_register(function ($clase) {
    include 'clases/' . $clase . '.clase.php';
});

?>