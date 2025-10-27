<?php

if (isset($_POST)) {
    $departamento = $_POST["departamento"];
    $presupuesto = mb_strtoupper($departamento) . ":";

    if ($departamento === "Informática") {
        $presupuesto .= " 500 euros";
    } else if ($departamento === "Lengua") {
        $presupuesto .= " 300 euros";
    } else if ($departamento === "Matemáticas") {
        $presupuesto .= " 300 euros";
    } else {
        $presupuesto .= " 400 euros";
    }

    echo "<ul><li>$presupuesto</li></ul>";
}
