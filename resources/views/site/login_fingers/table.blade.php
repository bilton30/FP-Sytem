<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="login_fingers-table">
            <thead>
            <tr>
                <th>Date Time</th>
                <th>Date</th>
                <th>Time</th>
                <th>Device Name</th>
                <th>Device Id</th>
                <th>Person Name</th>
                <th>Card Number</th>
                <th>Uid</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($loginFingers as $loginFinger)
                <tr>
                    <td>{{ $loginFinger->date_time }}</td>
                    <td>{{ $loginFinger->date }}</td>
                    <td>{{ $loginFinger->time }}</td>
                    <td>{{ $loginFinger->device_name }}</td>
                    <td>{{ $loginFinger->device_id }}</td>
                    <td>{{ $loginFinger->person_name }}</td>
                    <td>{{ $loginFinger->card_number }}</td>
                    <td>{{ $loginFinger->uid }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['loginFingers.destroy', $loginFinger->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('loginFingers.show', [$loginFinger->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('loginFingers.edit', [$loginFinger->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $loginFingers])
        </div>
    </div>
</div>
