<!-- Car Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('car_id', 'Car:') !!}
    {!! Form::number('car_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Start Rent Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_rent', 'Start Rent:') !!}
    {!! Form::text('start_rent', null, ['class' => 'form-control','id'=>'start_rent']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#start_rent').datepicker()
    </script>
@endpush

<!-- Finish Rent Field -->
<div class="form-group col-sm-6">
    {!! Form::label('finish_rent', 'Finish Rent:') !!}
    {!! Form::text('finish_rent', null, ['class' => 'form-control','id'=>'finish_rent']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#finish_rent').datepicker()
    </script>
@endpush