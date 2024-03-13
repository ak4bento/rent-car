<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="informasi-users-table">
            <thead>
            <tr>
                <th>User Id</th>
                <th>Address</th>
                <th>Telephone</th>
                <th>Sim</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($informasiUsers as $informasiUser)
                <tr>
                    <td>{{ $informasiUser->user_id }}</td>
                    <td>{{ $informasiUser->address }}</td>
                    <td>{{ $informasiUser->telephone }}</td>
                    <td>{{ $informasiUser->SIM }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['informasiUsers.destroy', $informasiUser->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('informasiUsers.show', [$informasiUser->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('informasiUsers.edit', [$informasiUser->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $informasiUsers])
        </div>
    </div>
</div>
