<table class="table">
    <thead>
    <th>Rut Coordinador</th>
			<th>Email</th>
			<th>Telefono</th>
			<th>Foto Perfil</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($coordinadors as $coordinador)
        <tr>
            <td>{!! $coordinador->rut_coordinador !!}</td>
			<td>{!! $coordinador->email !!}</td>
			<td>{!! $coordinador->telefono !!}</td>
			<td>{!! $coordinador->foto_perfil !!}</td>
            <td>
                <a href="{!! route('coordinadors.edit', [$coordinador->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('coordinadors.delete', [$coordinador->id]) !!}" onclick="return confirm('Are you sure wants to delete this Coordinador?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
