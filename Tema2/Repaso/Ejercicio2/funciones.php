<?php

function mostrarFormulario($cantidad) {
    echo "<br><br><form method='post' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>";
    for ($i = 1; $i <= $cantidad; $i++) {
        echo "
            <label for='numero$i'>Numero $i</label>
            <input type='text' name='numeros[]' id='numero$i'>
            <br>
            <br>
        ";
    }
    echo "
        <label for='suma'>Suma</label>
        <input type='checkbox' name='opciones[]' id='suma' value='suma'>
        
         <label for='media'>Media</label>
        <input type='checkbox' name='opciones[]' id='media' value='media'>
        
         <label for='maximo'>Máximo</label>
        <input type='checkbox' name='opciones[]' id='maximo' value='maximo'>
        
         <label for='minimo'>Mínimo</label>
        <input type='checkbox' name='opciones[]' id='minimo' value='minimo'>
        <br>
        <br>
      <button type='submit'>Enviar</button>
    </form>";
}

function sumar($numeros) {
    $suma = 0;
    foreach ($numeros as $numero) {
        $suma += $numero;
    }

    return $suma;
}

function media($numeros) {
    return sumar($numeros) / count($numeros);
}

function maximo($numeros) {
    $maximo = 0;
    foreach ($numeros as $numero) {
        if ($maximo < $numero) {
            $maximo = $numero;
        }
    }

    return $maximo;
}

function minimo($numeros) {
    $minimo = $numeros[0];
    foreach ($numeros as $numero) {
        if ($minimo > $numero) {
            $minimo = $numero;
        }
    }

    return $minimo;
}