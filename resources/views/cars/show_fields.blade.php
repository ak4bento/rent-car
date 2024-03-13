<!-- Type Field -->
<div class="col-sm-12">
    {!! Form::label('type', 'Type:') !!}
    <p>{{ $car->type }}</p>
</div>

<!-- Model Field -->
<div class="col-sm-12">
    {!! Form::label('model', 'Model:') !!}
    <p>{{ $car->model }}</p>
</div>

<!-- Plate Number Field -->
<div class="col-sm-12">
    {!! Form::label('plate_number', 'Plate Number:') !!}
    <p>{{ $car->plate_number }}</p>
</div>

<!-- Rental Rate Field -->
<div class="col-sm-12">
    {!! Form::label('rental_rate', 'Rental Rate:') !!}
    <p>{{ $car->rental_rate }}</p>
</div>

