<table class="table">
    <thead>
    <th>Id University</th>
			<th>Code Background</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($backgrounds as $background)
        <tr>
            <td>{!! $background->id_university !!}</td>
			<td>{!! $background->code_background !!}</td>
            <td>
                <a href="{!! route('backgrounds.edit', [$background->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('backgrounds.delete', [$background->id]) !!}" onclick="return confirm('Are you sure wants to delete this Background?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
