$(document).ready(function () {
    
    $.ajax({
        url: '/empleados/listar', 
        type: 'GET',
        success: function (data) {
            let tabla = '';
            data.forEach(function (empleado) {
                if(empleado.activo===1){
                tabla += `
                    <tr style='border-color:blue; text-align:center;'>
                        <td>${empleado.idEmpleado}</td>
                        <td>${empleado.nombre}</td>
                        <td>${empleado.apellido}</td>
                        <td>${empleado.puesto}</td>
                        <td>${empleado.salario}</td>
                        <td>${empleado.fechaIngreso}</td>
                        <td class="disabled">${empleado.idUsuario}</td>
                        <td class="disabled">${empleado.activo}</td>
                        <td>
                            <button class="btn-editar" id="btnEditar"
                                data-id="${empleado.idEmpleado}" 
                                data-nombre="${empleado.nombre}" 
                                data-apellido="${empleado.apellido}" 
                                data-puesto="${empleado.puesto}" 
                                data-salario="${empleado.salario}" 
                                data-fechaingreso="${empleado.fechaIngreso}" 
                                data-idusuario="${empleado.idUsuario}" 
                                data-activo="${empleado.activo}">
                                Editar
                            </button>
                                <button id="btnDeshabilitar" class= "btn-desactivar"
                                    data-id="${empleado.idEmpleado}">
                                    eliminar
                                </button>
                        </td>
                    </tr>
                    `;
                }
                else{

                }
            });
            $('#tablaEmp tbody').html(tabla); 
        },
        error: function () {
            alert('Error al cargar los datos.');
        }
    });
    

    $(document).on('click', '#btnEditar', function () {
        //boton
        const idEmpleado = $(this).data('id');
        const nombre = $(this).data('nombre');
        const apellido = $(this).data('apellido');
        const puesto = $(this).data('puesto');
        const salario = $(this).data('salario');
        const fechaIngreso = $(this).data('fechaingreso');
        const idUsuario = $(this).data('idusuario');
        const activo = $(this).data('activo');
    
        //vars-modal
        $('#edit-idEmpleado').val(idEmpleado);
        $('#edit-nombre').val(nombre);
        $('#edit-apellido').val(apellido);
        $('#edit-puesto').val(puesto);
        $('#edit-salario').val(salario);
        $('#edit-fechaIngreso').val(fechaIngreso);
        $('#edit-idUsuario').val(idUsuario);
        $('#edit-activo').val(activo);
    
        $('#modalEditar').show();
    });
    $(document).on('click','#btn-closeModal',function(){
        $('#modalEditar').hide();
    });
    
    $('#formAgregarEmp').on('submit',function(e){
        e.preventDefault
        const formulario ={
            nombre: $('#idNombre').val(),
            apellido: $('#idApellido').val(),
            puesto: $('#idPuesto').val(),
            salario: $('#idSalario').val(),
            fechaIngreso: $('#idFechaIngreso').val(),
            usuario: $('#idUsuario').val(),
            password: $('#idPassword').val(),
            _token: $('input[name="_token"]').val()
        };

        $.ajax({
            url: 'empleados/agregarEmp',
            type: 'POST',
            data: formulario,
            success: function(response){
                alert('empleado agregado exitosamente');
                //DEBO AGREGAR LA FUNCION PARA RECARGAR LA TABLA DE MANERA DINAMICA
                location.reload();
            },
            error: function(xhr,status,error){
                console.error(xhr.responseText);
                alert('error al agregar empleado');
            }
        })

    });
});
