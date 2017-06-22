<table class="table">
    <thead>
    <th>Rut Encargado</th>
			<th>Nombre Encargado</th>
			<th>Email Encargado</th>
			<th>Telefono Encargado</th>
			<th>Nombre Empresa</th>
			<th>Clasificacion</th>
			<th>Web</th>
			<th>Pais</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($empresas as $empresa)
        <tr>
            <td>{!! $empresa->rut_encargado !!}</td>
			<td>{!! $empresa->nombre_encargado !!}</td>
			<td>{!! $empresa->email_encargado !!}</td>
			<td>{!! $empresa->telefono_encargado !!}</td>
			<td>{!! $empresa->nombre_empresa !!}</td>
			<td>{!! $empresa->clasificacion !!}</td>
			<td>{!! $empresa->web !!}</td>
			<td>{!! $empresa->pais !!}</td>
            <td>
                <a href="{!! route('empresas.edit', [$empresa->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('empresas.delete', [$empresa->id]) !!}" onclick="return confirm('Are you sure wants to delete this Empresa?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
