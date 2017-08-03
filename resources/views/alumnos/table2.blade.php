<table class="table" id="alumnos">
    <thead>
    <th>Rut Alumno</th>
			<th>Nombre</th>
			<th>Email</th>
            <th>Rol</th>
            <th>Añadir</th>
    </thead>
    <tbody>
    @foreach($alumnos as $alumno)
        <tr>
            <td>{!! $alumno->rut_alumno !!}</td>
			<td>{!! $alumno->nombre !!}</td>
			<td>{!! $alumno->email !!}</td>
            <td>Alumno</td>
            <td id="alum-{!! $alumno->id !!}" style="text-align:center"><button onclick="add(this,'alum-{!! $alumno->id !!}')"  class="btn btn-primary btn-xs">Agregar</button> </td>
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
