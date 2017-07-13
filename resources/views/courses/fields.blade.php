
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
<style type="text/css">
.pace {
  -webkit-pointer-events: none;
  pointer-events: none;

  -webkit-user-select: none;
  -moz-user-select: none;
  user-select: none;
}

.pace-inactive {
  display: none;
}

.pace .pace-progress {
  background: #ed2e12;
  position: fixed;
  z-index: 2000;
  top: 0;
  right: 100%;
  width: 100%;
  height: 2px;
}
</style>