<table class="table" id="todosloscursos">
    <thead>
    <th>Nombre Carrera</th>
    <th width="50px">Acciones</th>
    </thead>
    <tbody>
    @foreach($coursealls as $courseall)
        <tr>
            <td>{!! $courseall->nombre_carrera !!}</td>
            <td>
            @if(Auth::check())
                @if(Auth::user()->rol=='Administrador') 
                {
                    <a href="{!! route('coursealls.edit', [$courseall->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="{!! route('coursealls.delete', [$courseall->id]) !!}" onclick="return confirm('Are you sure wants to delete this Courseall?')"><i class="glyphicon glyphicon-remove"></i></a>}
                @endif
                @if(Auth::user()->rol=='Coordinador')
               <a onclick="añadir(this)"  class="btn btn-primary btn-xs">Agregar</a>
                @endif
            @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<link rel="stylesheet" href="{!! asset('package/jquery.dataTable.css')!!}" >
<script type="text/javascript" src="{!! asset('package/jquery.dataTable.js')!!}"></script>
<script type="text/javascript">
    $(document).ready(function () {
    $('#todosloscursos').dataTable({
        "fnInitComplete": function (oSettings, json) {
            $('#todosloscursos').show();
        }
    });
})

</script>