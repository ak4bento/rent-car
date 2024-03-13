<!-- Car Id Field -->
<div class="col-sm-12">
    {!! Form::label('car_id', 'Car Id:') !!}
    <p>{{ $calculationRent->car_id }}</p>
</div>

<!-- Count Day Field -->
<div class="col-sm-12">
    {!! Form::label('count_day', 'Count Day:') !!}
    <p>{{ $calculationRent->count_day }}</p>
</div>

<!-- Total Cost Field -->
<div class="col-sm-12">
    {!! Form::label('total_cost', 'Total Cost:') !!}
    <p>{{ $calculationRent->total_cost }}</p>
</div>

