@extends('master')
@section('content')
<div class="row mb-2">
    <div class="col-sm-12">
        <div class="card card-info" style="">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>#SL</th>
                        <th>Floor</th>
                        <th>Line</th>
                        <th>OP Name & ID</th>
                        <th>Designation</th>
                        <th>Join Date</th>
                        <th>Salary</th>

                        <th>Present Work</th>
                        <th>Main Process</th>
                        <th>AVG Performance</th>
                        <th>AVG Grade</th>
                        <th>Propose Grade</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($operatorSkillMetrixs as $data)
                    <tr>
                        <td> {{$loop->iteration }} </td>
                        <td> {{$data->floor->name??''}} </td>
                        <td> {{$data->line->name??''}} </td>
                        <td> {{$data->operator->name??''}} </td>
                        <td> {{$data->designation->name??''}} </td>
                        <td> {{$data->join_date??''}} </td>
                        <td> {{$data->salary??''}} </td>

                        <td> {{$data->present_work ??''}} </td>
                        <td> {{$data->main_process ??''}} </td>
                        <td>
                        @php
                           $total= ($data->ol_performance + $data->snls_performance+
                            $data->vertical_performance+$data->dnls_performance+$data->performance);

                        @endphp
                        @php
                           $ol_performance= 0;
                           if($data->ol_performance>0)
                           $ol_performance+=1;

                           $snls_performance= 0;
                           if($data->snls_performance>0)
                           $snls_performance+=1;

                           $dnls_performance= 0;
                           if($data->dnls_performance>0)
                           $dnls_performance+=1;

                           $vertical_performance= 0;
                           if($data->vertical_performance>0)
                           $vertical_performance+=1;

                           $performance= 0;
                           if($data->performance>0)
                           $performance+=1;
                        $avg=$ol_performance+$snls_performance+$dnls_performance+$vertical_performance+$performance
                        @endphp
                        {{$total/$avg}}
                        </td>

                        <td>@if (($total/$avg) > 80)
                            <span class="text-success text-bold">A+</span>
                            @elseif (($total/$avg) >70)
                            <span class="text-success text-bold">A</span>
                            @elseif (($total/$avg) >65)
                            <span class="text-info text-bold">B+</span>
                            @elseif (($total/$avg) >55)
                            <span class="text-info text-bold">B-</span>
                            @elseif (($total/$avg) >45)
                            <span class="text-info text-bold">D</span>
                            @elseif (($total/$avg) >35)
                            <span class="text-danger text-bold">C</span>
                            @else
                           <span class="text-danger text-bold">F</span>
                                @endif
                        </td>
                        <td> {{$data->propose_salary??''}} </td>






                        <td>
                            <a class="btn btn-info btn-sm"
                                href="{{ route('op_p_skill_metrix_edit',$data->id)}} ">Edit</a>
                            <a class="btn btn-success btn-sm"
                                href="{{ route('op_p_skill_metrix_view',$data->id)}}">View</a>

                                <form action="{{route('op_p_skill_metrix_delete',$data->id)}}" method="POST">
                                    @method('DELETE')
                                     @csrf
                                    <a href="" data-id=" {{$data->id}} " data-toggle="tooltip" title="Delete" data-placement="bottom" class=" dltbtn btn btn-sm btn-danger"> delete </a>
                                </form>

                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="10">No Data Found</td>
                    </tr>
                    @endforelse

                </tbody>
                <tbody>


                </tbody>

            </table>
        </div>
    </div>



</div>
@endsection
@push('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
{{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('.dltbtn').click(function(e){
var form = $(this).closest('form');
var dataId = $(this).data('id');
e.preventDefault();
swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this imaginary file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
      form.submit();
    swal("Roman! Your imaginary file has been deleted!", {
      icon: "success",
    });
  } else {
    swal("Your imaginary file is safe!");
  }
});

});
</script>
@endpush
