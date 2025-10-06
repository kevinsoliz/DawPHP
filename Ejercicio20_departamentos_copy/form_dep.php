<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
<style>
    form {
        width: 50%;
    }
</style>
<?php

if ($_POST) {
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
} else { ?>

    <form action=<?php echo $_SERVER["PHP_SELF"] ?> method="post">
        <label for="departamentos">Departamento:</label>
        <select name="departamento" id="departamentos">
            <option value="Informática">Informática</option>
            <option value="Lengua">Lengua</option>
            <option value="Matemáticas">Matemáticas</option>
            <option value="Inglés">Inglés</option>
        </select>
        <br>
        <button type="submit" name="enviar">Enviar</button>
    </form>

<?php } ?>