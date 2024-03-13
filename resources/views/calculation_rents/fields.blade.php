<!-- Car Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('car_id', 'Car Plat Number:') !!}
    {!! Form::number('car_id', $car->id, ['class' => 'form-control', 'required']) !!}

    {!! Form::label('plate_number', 'Car Plat Number:') !!}
    {!! Form::text('plate_number', $car->plate_number, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Count Day Field -->
<div class="form-group col-sm-6">
    {!! Form::label('count_day', 'Count Day:') !!}
    {!! Form::number('count_day', $calculationRent->countRentDays(), ['class' => 'form-control', 'required']) !!}
</div>

<!-- Total Cost Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_cost', 'Total Cost:') !!}
    {!! Form::number('total_cost', ($calculationRent->countRentDays()*$car->rental_rate), ['class' => 'form-control', 'required']) !!}
</div>