<table class="table">
    <thead>
    <th>Id Alumno</th>
			<th>Idioma</th>
			<th>Lectura</th>
			<th>Escritura</th>
			<th>Conversacion</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($idiomas as $idioma)
        <tr>
            <td>{!! $idioma->id_alumno !!}</td>
			<td>{!! $idioma->idioma !!}</td>
			<td>{!! $idioma->lectura !!}</td>
			<td>{!! $idioma->escritura !!}</td>
			<td>{!! $idioma->conversacion !!}</td>
            <td>
                <a href="{!! route('idiomas.edit', [$idioma->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('idiomas.delete', [$idioma->id]) !!}" onclick="return confirm('Are you sure wants to delete this Idioma?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
