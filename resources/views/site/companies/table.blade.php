<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="companies-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Website</th>
                <th>Nuit</th>
                <th>Contact1</th>
                <th>Contact2</th>
                <th>Prefix</th>
                <th>Address</th>
                <th>Status</th>
                <th>Uid</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($companies as $company)
                <tr>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->email }}</td>
                    <td>{{ $company->website }}</td>
                    <td>{{ $company->nuit }}</td>
                    <td>{{ $company->contact1 }}</td>
                    <td>{{ $company->contact2 }}</td>
                    <td>{{ $company->prefix }}</td>
                    <td>{{ $company->address }}</td>
                    <td>{{ $company->status }}</td>
                    <td>{{ $company->uid }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['companies.destroy', $company->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('companies.show', [$company->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('companies.edit', [$company->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $companies])
        </div>
    </div>
</div>
