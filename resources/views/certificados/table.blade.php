<table class="table">
    <thead>
    <th>Id Alumno</th>
			<th>Certificadora</th>
			<th>Certificado</th>
			<th>Fecha</th>
			<th>Observacion</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($certificados as $certificado)
        <tr>
            <td>{!! $certificado->id_alumno !!}</td>
			<td>{!! $certificado->certificadora !!}</td>
			<td>{!! $certificado->certificado !!}</td>
			<td>{!! $certificado->fecha !!}</td>
			<td>{!! $certificado->observacion !!}</td>
            <td>
                <a href="{!! route('certificados.edit', [$certificado->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('certificados.delete', [$certificado->id]) !!}" onclick="return confirm('Are you sure wants to delete this Certificado?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
