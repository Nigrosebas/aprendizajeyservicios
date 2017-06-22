<table class="table">
    <thead>
    <th>Rut Profesor</th>
			<th>Email</th>
			<th>Telefono</th>
			<th>Foto Perfil</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($profesors as $profesor)
        <tr>
            <td>{!! $profesor->rut_profesor !!}</td>
			<td>{!! $profesor->email !!}</td>
			<td>{!! $profesor->telefono !!}</td>
			<td>{!! $profesor->foto_perfil !!}</td>
            <td>
                <a href="{!! route('profesors.edit', [$profesor->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('profesors.delete', [$profesor->id]) !!}" onclick="return confirm('Are you sure wants to delete this Profesor?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
