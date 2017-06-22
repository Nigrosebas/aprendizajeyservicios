<table class="table">
    <thead>
    <th>Id Alumno</th>
			<th>Periodo</th>
			<th>Nivel</th>
			<th>Institucion</th>
			<th>Nombre</th>
			<th>Estado</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($formacionacademicas as $formacionacademica)
        <tr>
            <td>{!! $formacionacademica->id_alumno !!}</td>
			<td>{!! $formacionacademica->periodo !!}</td>
			<td>{!! $formacionacademica->nivel !!}</td>
			<td>{!! $formacionacademica->institucion !!}</td>
			<td>{!! $formacionacademica->nombre !!}</td>
			<td>{!! $formacionacademica->estado !!}</td>
            <td>
                <a href="{!! route('formacionacademicas.edit', [$formacionacademica->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('formacionacademicas.delete', [$formacionacademica->id]) !!}" onclick="return confirm('Are you sure wants to delete this Formacionacademica?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
