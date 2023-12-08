<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="invoice_category_infos-table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Uid</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($invoiceCategoryInfos as $invoiceCategoryInfo)
                <tr>
                    <td>{{ $invoiceCategoryInfo->title }}</td>
                    <td>{{ $invoiceCategoryInfo->uid }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['invoiceCategoryInfos.destroy', $invoiceCategoryInfo->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('invoiceCategoryInfos.show', [$invoiceCategoryInfo->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('invoiceCategoryInfos.edit', [$invoiceCategoryInfo->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $invoiceCategoryInfos])
        </div>
    </div>
</div>
