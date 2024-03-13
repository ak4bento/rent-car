<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::text('type', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Model Field -->
<div class="form-group col-sm-6">
    {!! Form::label('model', 'Model:') !!}
    {!! Form::text('model', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Plate Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('plate_number', 'Plate Number:') !!}
    {!! Form::text('plate_number', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Rental Rate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rental_rate', 'Rental Rate:') !!}
    {!! Form::number('rental_rate', null, ['class' => 'form-control', 'required']) !!}
</div>