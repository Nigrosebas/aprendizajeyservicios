<table class="table">
    <thead>
    <th>Nombre U</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($universities as $university)
        <tr>
            <td>{!! $university->nombre_u !!}</td>
            <td>
                <a href="{!! route('universities.edit', [$university->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('universities.delete', [$university->id]) !!}" onclick="return confirm('Are you sure wants to delete this University?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
