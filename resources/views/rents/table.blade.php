<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="rents-table">
            <thead>
            <tr>
                <th>Car</th>
                <th>Start Rent</th>
                <th>Finish Rent</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($rents as $rent)
                <tr>
                    <td>
                        {{ $rent->car->type }} ({{ $rent->car->plate_number }}) 
                        <a class="btn btn-secondary btn-xs" href="{{ route('calculationRents.create', $rent->car->id) }}">
                            Return
                        </a>
                    </td>
                    <td>{{ $rent->start_rent }}</td>
                    <td>{{ $rent->finish_rent }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['rents.destroy', $rent->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('rents.show', [$rent->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('rents.edit', [$rent->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $rents])
        </div>
    </div>
</div>
