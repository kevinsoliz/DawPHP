
<form action="presupuesto.php" method="post">
     <label for="departamentos">Departamento:</label>
    <select name="departamento" id="departamentos" >
        <option value="Informática">Informática</option>
        <option value="Lengua">Lengua</option>
        <option value="Matemáticas">Matemáticas</option>
        <option value="Inglés">Inglés</option>
    </select>
    <br>
    <button type="submit" name="enviar">Enviar</button>
</form>

<?php
    include("presupuesto.php");
?>