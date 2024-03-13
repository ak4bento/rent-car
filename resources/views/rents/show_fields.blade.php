<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $rent->user_id }}</p>
</div>

<!-- Car Id Field -->
<div class="col-sm-12">
    {!! Form::label('car_id', 'Car Id:') !!}
    <p>{{ $rent->car_id }}</p>
</div>

<!-- Start Rent Field -->
<div class="col-sm-12">
    {!! Form::label('start_rent', 'Start Rent:') !!}
    <p>{{ $rent->start_rent }}</p>
</div>

<!-- Finish Rent Field -->
<div class="col-sm-12">
    {!! Form::label('finish_rent', 'Finish Rent:') !!}
    <p>{{ $rent->finish_rent }}</p>
</div>

