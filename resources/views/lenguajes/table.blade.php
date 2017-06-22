<table class="table">
    <thead>
    <th>Nombre</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($lenguajes as $lenguaje)
        <tr>
            <td>{!! $lenguaje->nombre !!}</td>
            <td>
                <a href="{!! route('lenguajes.edit', [$lenguaje->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('lenguajes.delete', [$lenguaje->id]) !!}" onclick="return confirm('Are you sure wants to delete this Lenguaje?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
