@extends('master')
@section('content')

<div class="card-body">
    <div class="row">

        @if(count($tableData) > 0)


        <table id="customTable" class="table table-striped table-responsive table-bordered table-sm">
            <thead>
                <tr style="background-color:#110c3b;color:white;font-size:18px;">
                    <th>Floor</th>
                    <th>Line Name</th>
                    <th>Buyer Name</th>
                    <th>Style</th>
                    <th>Output</th>
                    <th>Size</th>
                    <th>Color</th>
                    <th>PO</th>
                    <th>Style</th>
                    <th>process</th>
                    <th>MC</th>
                    <th>Defect Code </th>
                    <th>Operator Name</th>
                    <th>Ten Card</th>
                    <th>Defect Quantity</th>
                    <th>created_at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($tableData as $data)
                <tr>
                    <td>{{ $data->floor->name??'' }}</td>
                    <td>{{ $data->line->name??'' }}</td>
                    <td>{{ $data->buyer_name??'' }}</td>

                    <td>{{ $data->style??'' }}</td>
                    <td>@if ($data->output=='1')
                        QC Pass
                        @elseif($data->output=='2')
                        Rectified
                        @elseif($data->output=='3')
                        Reject
                        @else
                        Defected
                    @endif</td>
                    <td>{{ $data->size??'' }}</td>
                    <td>
                        {{ $data->color ??''}}
                    </td>
                    <td>
                        {{ $data->po ??''}}
                    </td>
                    <td>{{ $data->style??'' }}</td>
                    <td>{{ $data->process??'' }}</td>
                    <td>{{ $data->mc??'' }}</td>
                    <td>{{ $data->defect_code }}</td>
                    <td>{{ $data->op_name??'' }}</td>
                    <td>{{ $data->ten_cards??'' }}</td>
                    <td>{{ $data->defect_quantity??'' }}</td>
                    <td>{{ $data->created_at->format('M-d-D-Y')??'' }}</td>
                    <td>
                        <a href="{{ route('quelity_edit', $data->id) }}" class="btn btn-sm btn-info p-1"
                            title="Edit"><i class="fas
                            fa-edit"></i></a>
                    </td>

                </tr>
                @endforeach

            </tbody>

        </table>

        @else
        <p>No report data available.</p>
        @endif
    </div>
</div>





@endsection

@push('meta')
<meta http-equiv="refresh" content="20">
@endpush

@push('script')


<script>
    $(document).ready(function () {
            $('#customTable').DataTable({
                "scrollX": true
            });
            $('.dataTables_length').addClass('bs-select');
        });
</script>
@endpush
