<h1>Buscador de libros</h1>

<form action="result_libros.php" method="post">
    <label for="TextoBusqueda">Texto de búsqueda</label>
    <input type="text" id="TextoBusqueda" name="TextoBusqueda">
    <br>
    <br>
    <label for="BuscarEn">Buscar en:</label>
    <input type="radio" id="BuscarEn" name="BuscarEn"  value="Título del libro">Título del libro
    <input type="radio" id="BuscarEn" name="BuscarEn" value="Nombre del autor">Nombre del autor
    <input type="radio" id="BuscarEn" name="BuscarEn" value="Editorial">Editorial
    <br>
    <br>
    <label for="TipoDeLibro">Tipo de libro:</label>
    <select name="TipoLibro" id="TipoDeLibro" >
        <option value="Narrativa">Narrativa</option>
        <option value="Libros deTexto">Libros de texto</option>
        <option value="Guias y mapas">Guías y mapas</option>
    </select>
    <br>
    <br>
    <button type="submit" name="buscar">Buscar</button>

</form>

