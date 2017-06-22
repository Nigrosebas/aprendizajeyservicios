<table class="table" id="alumnos">
    <thead>
    <th>Rut Alumno</th>
			<th>Fecha Nacimiento</th>
			<th>Email</th>
			<th>Telefono</th>
			<th>Region</th>
			<th>Ciudad</th>
			<th>Direccion</th>
			<th>Foto Perfil</th>
			<th>Licencia Conducir</th>
			<th>Descripcion</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($alumnos as $alumno)
        <tr>
            <td>{!! $alumno->rut_alumno !!}</td>
			<td>{!! $alumno->fecha_nacimiento !!}</td>
			<td>{!! $alumno->email !!}</td>
			<td>{!! $alumno->telefono !!}</td>
			<td>{!! $alumno->region !!}</td>
			<td>{!! $alumno->ciudad !!}</td>
			<td>{!! $alumno->direccion !!}</td>
			<td>{!! $alumno->foto_perfil !!}</td>
			<td>{!! $alumno->licencia_conducir !!}</td>
			<td>{!! $alumno->descripcion !!}</td>
            <td>
                <a href="{!! route('alumnos.edit', [$alumno->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('alumnos.delete', [$alumno->id]) !!}" onclick="return confirm('Are you sure wants to delete this Alumno?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
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
