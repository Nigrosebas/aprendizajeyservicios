
{!! Form::hidden('id_university', Auth::user()->coordinador->universidad->id, ['class' => 'form-control']) !!}

<!-- Id Faculty Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id_faculty', 'Facultad:') !!}
	{!! Form::select('id_faculty', $facultades,null, ['class' => 'form-control']) !!}
</div>

<!-- Name Course Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('name_course', 'Nombre del Curso:') !!}
	{!! Form::text('name_course', null, ['class' => 'form-control']) !!}
</div>
<!-- Submit Field -->
<div class="form-group col-sm-6 col-lg-4">
    <h2>{!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}</h2>
</div>
</br>
</br>
        <div class="row">
            @if($coursealls->isEmpty())
                <div class="well text-center">No Coursealls found.</div>
            @else
                @include('coursealls.table')
            @endif
        </div>
        @include('common.paginate', ['records' => $coursealls])
<script type="text/javascript">

    function añadir(button) {
    var row = button.parentNode.parentNode;
    var cells = row.querySelectorAll('td:not(:last-of-type)');
    var rut = cells[0].innerText;
    document.getElementById("name_course").value = rut;
}
</script>