<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, tr, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 2px 5px;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Raza</th>
            <th>Rol</th>
        </tr>
    </table>
</body>
<script>
    function tablaPersonajes() {
        
         let xhr = new XMLHttpRequest();
    
            xhr.open("GET", "mordor.php", true);
    
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {

                    let datos = JSON.parse(xhr.responseText);
                    console.log(datos);


                    for (let i = 0; i < datos.length; i++){

                        let fila = document.createElement('tr');
                        document.querySelector('table').appendChild(fila);

                     
                            let columna1 = document.createElement('td');
                            columna1.textContent = datos[i].nombre;
                            fila.appendChild(columna1);

                            let columna2 = document.createElement('td');
                            columna2.textContent = datos[i].raza;
                            fila.appendChild(columna2);

                            let columna3 = document.createElement('td');
                            columna3.textContent = datos[i].rol_clave;
                            fila.appendChild(columna3);
                        
                    }
                
                }
            };
    
            xhr.send();
    }

    tablaPersonajes();
</script>
</html>