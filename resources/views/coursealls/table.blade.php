<table class="table">
    <thead>
    <th>Nombre Carrera</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($coursealls as $courseall)
        <tr>
            <td>{!! $courseall->nombre_carrera !!}</td>
            <td>
                <a href="{!! route('coursealls.edit', [$courseall->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('coursealls.delete', [$courseall->id]) !!}" onclick="return confirm('Are you sure wants to delete this Courseall?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
