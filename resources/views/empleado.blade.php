<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body style="background-color:rgb(209, 204, 230);">
<div class="parent">
        <div class="div1" style="margin-left: 5%;">
            <h1>Lista de Empleados</h1>
                <table class="table table-bordered" id="tablaEmp" style="width: 100%;">
                    <thead>
                        <tr style="text-align: center;border-color: blue;">
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Puesto</th>
                            <th>Salario</th>
                            <th>Fecha de Ingreso</th>
                            <th class="disabled">idUsuario</th>
                            <th class="disabled">activo</th>
                            <th >acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
        </div>
        <div class="div2" style="padding-left: 10%;">
        <h2 class="mb-3"> ➕Agregar Nuevo Empleado</h2>
            <form id="formAgregarEmp" style="width: 70%;margin-top:0%;">
                @csrf
                <div class="mb-3" >
                    <label for="nombre" class="form-label" style="margin-bottom: 0px;">Nombre</label>
                    <input type="text" class="form-control" id="idNombre" name="nombre" style="margin-top: 0px;"required>
                </div>
                <div class="mb-3">
                    <label for="apellido" class="form-label" style="margin-bottom: 0px;">Apellido</label>
                    <input type="text" class="form-control" id="idApellido" name="apellido" required>
                </div>
                <div class="mb-3">
                    <label for="puesto" class="form-label" style="margin-bottom: 0px;">Puesto</label>
                    <input type="text" class="form-control" id="idPuesto" name="puesto" required>
                </div>
                <div class="mb-3">
                    <label for="salario" class="form-label" style="margin-bottom: 0px;">Salario</label>
                    <input type="text" class="form-control" id="idSalario" name="salario" required>
                </div>
                <div class="mb-3">
                    <label for="fechaIngreso" class="form-label" style="margin-bottom: 0px;">Fecha de Ingreso</label>
                    <input type="date" class="form-control" id="idFechaIngreso" name="fechaIngreso" required>
                </div>

                <!-- no necesario -->
                <div class="mb-3" style="display: none;">
                    <label for="activo" class="form-label">Activo</label>
                    <select class="form-select" id="activo" name="activo" required>
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <!--  -->

                <div class="mb-3">
                    <label for="usuario" class="form-label" style="margin-bottom: 0px;">Usuario</label>
                    <input type="text" class="form-control" id="idUsuario" name="apellido" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label" style="margin-bottom: 0px;">Contraseña</label>
                    <input type="text" class="form-control" id="idPassword" name="password" required>
                </div>
                <button type="submit" class="btn btn-success w-100">Agregar Empleado</button>
            </form>
        </div>
</div>
<div id="modalEditar" class="modal" style="display: none;">
    <div class="modal-content">
        <h4>Editar Empleado</h4>
        <button id="btn-closeModal">Cerrar</button>
        <form id="formEditar">
        @csrf
            <input type="hidden" id="edit-idEmpleado">
            <div class="form-grid">
                <div class="form-group">
                    <label for="edit-nombre">Nombre:</label>
                    <input type="text" id="edit-nombre" required>
                </div>
                <div class="form-group">
                    <label for="edit-apellido">Apellido:</label>
                    <input type="text" id="edit-apellido" required>
                </div>
                <div class="form-group">
                    <label for="edit-puesto">Puesto:</label>
                    <input type="text" id="edit-puesto" required>
                </div>
                <div class="form-group">
                    <label for="edit-salario">Salario:</label>
                    <input type="text" id="edit-salario" required>
                </div>

                <div class="form-group">
                    <label for="edit-fechaIngreso">Fecha de Ingreso:</label>
                    <input type="date" id="edit-fechaIngreso" required>
                </div>
                <div class="form-group">
                    <input type="hidden" id="edit-idUsuario" >
                </div>
                <div class="form-group">
                    <label for="edit-usuario" style="color: green;">Usuario:</label>
                    <input type="text" id="edit-usuario" required>
                </div>
                <div class="form-groupch">
                    <label for="cambiar-password" class="checkbox-label">
                    <input type="checkbox" id="chEdit">
                    Cambiar contraseña
                    </label>
                    <input type="text" id="edit-contraseña" style="height: 35px;margin-top:20px; margin-left: 2px;" disabled  placeholder="contraseña nueva">
                </div>
            </div>
            <button type="submit" class="btn-submit">Guardar Cambios</button>
        </form>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{{ asset('js/empleado.js') }}"></script>
</body>
</html>

