<table class="table">
    <thead>
    <th>Id Alumno</th>
			<th>Periodo</th>
			<th>Empresa</th>
			<th>Pais</th>
			<th>Ciudad</th>
			<th>Cargo</th>
			<th>Contactoempresa</th>
			<th>Urlempresa</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($experienciaprofesionals as $experienciaprofesional)
        <tr>
            <td>{!! $experienciaprofesional->id_alumno !!}</td>
			<td>{!! $experienciaprofesional->periodo !!}</td>
			<td>{!! $experienciaprofesional->empresa !!}</td>
			<td>{!! $experienciaprofesional->pais !!}</td>
			<td>{!! $experienciaprofesional->ciudad !!}</td>
			<td>{!! $experienciaprofesional->cargo !!}</td>
			<td>{!! $experienciaprofesional->contactoempresa !!}</td>
			<td>{!! $experienciaprofesional->urlempresa !!}</td>
            <td>
                <a href="{!! route('experienciaprofesionals.edit', [$experienciaprofesional->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('experienciaprofesionals.delete', [$experienciaprofesional->id]) !!}" onclick="return confirm('Are you sure wants to delete this Experienciaprofesional?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
