@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="form-group">
    {!! Form::label('name', 'Name') !!}
    <div class="form-controls">
        <input class="form-control" name="name" type="text" value="{{ old('name', isset($cat) ? $cat->name : '') }}" id="name">
    </div>
</div>
<div class="form-group">
    {!! Form::label('date_of_birth', 'Date of Birth') !!}
    <div class="form-controls">
        {!! Form::text('date_of_birth', isset($cat) ? $cat->date_of_birth : null, ['class' =>
        'form-control datepicker']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('breed_id', 'Breed') !!}
    <div class="form-controls">
        {!! Form::select('breed_id', isset($breeds) ? $breeds : [], isset($cat) ? $cat->breed_id : null, ['class' => 'form-control']) !!}
    </div>
</div>
{!! Form::submit('Save Cat', ['class' => 'btn btn-primary']) !!}