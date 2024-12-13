// Busqueda de Centros de Trabajo
    document.getElementById('texto').addEventListener('keyup', function() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("texto");
        filter = input.value.toLowerCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        for (i = 1; i < tr.length; i++) { // Empieza en 1 para evitar el encabezado de la tabla
            tr[i].style.display = "none"; // Oculta todas las filas inicialmente
            td = tr[i].getElementsByTagName("td");

            for (var j = 0; j < td.length; j++) { // Itera sobre las columnas de cada fila
                if (td[j]) {
                    txtValue = td[j].textContent || td[j].innerText;
                    if (txtValue.toLowerCase().indexOf(filter) > -1) {
                        tr[i].style.display = ""; // Muestra la fila si coincide con la búsqueda
                        break; // Deja de comprobar el resto de columnas si ya encontró una coincidencia
                    }
                }
            }
        }
    });
