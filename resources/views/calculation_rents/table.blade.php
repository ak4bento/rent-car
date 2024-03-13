<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="calculation-rents-table">
            <thead>
            <tr>
                <th>Car Plate</th>
                <th>Count Day</th>
                <th>Total Cost</th>
            </tr>
            </thead>
            <tbody>
            @foreach($calculationRents as $calculationRent)
                <tr>
                    <td>{{ $calculationRent->car->plate_number }}</td>
                    <td>{{ $calculationRent->count_day }}</td>
                    <td>{{ "Rp " . number_format($calculationRent->total_cost, 2, ",", ".") }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $calculationRents])
        </div>
    </div>
</div>
