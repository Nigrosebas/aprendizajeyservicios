<table class="table">
    <thead>
			<th>Nombre Facultad</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($faculties as $faculty)
        <tr>
			<td>{!! $faculty->nombre_facultad !!}</td>
            <td>
                <a href="{!! route('faculties.edit', [$faculty->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('faculties.delete', [$faculty->id]) !!}" onclick="return confirm('Are you sure wants to delete this Faculty?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
