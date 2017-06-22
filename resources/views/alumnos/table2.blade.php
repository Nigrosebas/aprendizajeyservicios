<table class="table" id="alumnos">
    <thead>
    <th>Rut Alumno</th>
			<th>Nombre</th>
			<th>Email</th>
            <th>Añadir</th>
    </thead>
    <tbody>
    @foreach($alumnos as $alumno)
        <tr>
            <td>{!! $alumno->rut_alumno !!}</td>
			<td>{!! $alumno->nombre !!}</td>
			<td>{!! $alumno->email !!}</td>
            <td><button onclick="add(this)"  class="btn btn-primary btn-xs">Agregar</button> </td>
        </tr>
    @endforeach
        

    </tbody>
</table>

<link rel="stylesheet" href="{!! asset('package/jquery.dataTable.css')!!}" >
<script type="text/javascript" src="{!! asset('package/jquery.dataTable.js')!!}"></script>
<script type="text/javascript">
    $(document).ready(function () {
    $('#alumnos').dataTable({
        "fnInitComplete": function (oSettings, json) {
            $('#alumnos').show();
        }
    });
})
</script>
