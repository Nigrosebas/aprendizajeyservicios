<table class="table">
    <thead>
    <th>Id University</th>
			<th>Id Faculty</th>
			<th>Name Course</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($courses as $course)
        <tr>
            <td>{!! $course->id_university !!}</td>
			<td>{!! $course->id_faculty !!}</td>
			<td>{!! $course->name_course !!}</td>
            <td>
                <a href="{!! route('courses.edit', [$course->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('courses.delete', [$course->id]) !!}" onclick="return confirm('Are you sure wants to delete this Course?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
