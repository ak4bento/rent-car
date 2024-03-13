<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="cars-table">
            <thead>
            <tr>
                <th>Type</th>
                <th>Model</th>
                <th>Plate Number</th>
                <th>Available</th>
                <th>Rental Rate</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cars as $car)
                <tr>
                    <td>{{ $car->type }}</td>
                    <td>{{ $car->model }}</td>
                    <td>{{ $car->plate_number }}</td>
                    <td>
                        @if ($car->isAvailableForRent())
                            Available
                        @else
                            Not Available
                        @endif
                    </td>
                    <td>{{ "Rp " . number_format($car->rental_rate, 2, ",", ".") }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['cars.destroy', $car->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('cars.show', [$car->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('cars.edit', [$car->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $cars])
        </div>
    </div>
</div>
