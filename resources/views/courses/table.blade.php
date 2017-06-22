<table class="table">
    <thead>
			<th>Nombre Carrera</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($courses as $course)
        <tr>
			<td>{!! $course->nombre_carrera !!}</td>
            <td>
                <a href="{!! route('courses.edit', [$course->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('courses.delete', [$course->id]) !!}" onclick="return confirm('Are you sure wants to delete this Course?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
