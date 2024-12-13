$('#tabla-productos').DataTable({
    "responsive": true,
    "columnDefs": [
      // { targets: [1,2,3], render: $.fn.dataTable.render.number( ',', '.', 2, '$ ' ) },
      {
        responsivePriority: 1,
        targets: 0
      }
    ],
    "order": [
      [0, "asc"]
    ],
    "pageLength": 15,
    "lengthChange": false,
    // "paging":   false,
    // "ordering": false,
    // "info":     false
    "language": {
      "decimal": ".",
      "thousands": ",",
      search: "Buscar Producto:",
      lengthMenu: "Mostrar _MENU_ registros por página",
      zeroRecords: "No hay registros para mostrar",
      info: "Mostrando página _PAGE_ de _PAGES_",
      infoEmpty: "No hay registros disponibles",
      infoFiltered: "(filtrado de _MAX_ de registros)",
      paginate: {
        first: "Primera",
        previous: "Anterior",
        next: "Siguiente",
        last: "Última"
      }
    },
    // Habilitar búsqueda insensible a acentos con el plugin accent-neutralise
    "search": {
      "caseInsensitive": true, // Habilita la búsqueda insensible a mayúsculas y minúsculas
      "accentNeutralise": true // Habilita la búsqueda insensible a acentos
    }
});

$('.formulario-eliminar').submit(function(e){
    e.preventDefault();

    Swal.fire({
        title: '¿Estas Seguro?',
        text: "¡No podrás modificarlo después!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: '¡Si, Eliminar!'
      }).then((result) => {
        if (result.value) {
            this.submit()
          }
    })
});