<table class="table" id="profes">
    <thead>
    <th>Rut Profesor</th>
			<th>Nombre</th>
			<th>Email</th>
            <th>Rol</th>
            <th>Añadir</th>
    </thead>
    <tbody>
    @foreach($profesors as $profesor)
        <tr>
            <td>{!! $profesor->rut_profesor !!}</td>
			<td>{!! $profesor->nombre !!}</td>
			<td>{!! $profesor->email !!}</td>
            <td>Profesor</td>
            <td id="prof-{!! $profesor->id !!}" style="text-align:center"><button onclick="add2(this,'prof-{!! $profesor->id !!}')"  class="btn btn-primary btn-xs">Agregar</button> </td>
        </tr>
    @endforeach
        

    </tbody>
</table>

<link rel="stylesheet" href="{!! asset('package/jquery.dataTable.css')!!}" >
<script type="text/javascript" src="{!! asset('package/jquery.dataTable.js')!!}"></script>
<script type="text/javascript">
    $(document).ready(function () {
    $('#profes').dataTable({
        "fnInitComplete": function (oSettings, json) {
            $('#profes').show();
        }
    });
})
</script>
