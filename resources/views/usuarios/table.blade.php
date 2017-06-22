<table class="table">
    <thead>
    <th>Rut</th>
			<th>Rol</th>
			<th>Usuario</th>
			<th>Password</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($usuarios as $usuario)
        <tr>
            <td>{!! $usuario->rut !!}</td>
			<td>{!! $usuario->rol !!}</td>
			<td>{!! $usuario->usuario !!}</td>
			<td>{!! $usuario->password !!}</td>
            <td>
                <a href="{!! route('usuarios.edit', [$usuario->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('usuarios.delete', [$usuario->id]) !!}" onclick="return confirm('Are you sure wants to delete this Usuario?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
