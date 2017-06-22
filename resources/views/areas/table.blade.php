<table class="table">
    <thead>
    <th>Nombre</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($areas as $area)
        <tr>
            <td>{!! $area->nombre !!}</td>
            <td>
                <a href="{!! route('areas.edit', [$area->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('areas.delete', [$area->id]) !!}" onclick="return confirm('Are you sure wants to delete this Area?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
