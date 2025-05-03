@extends('master')
@section('content')
<div class="row mb-2">
    <div class="col-sm-12">
        <div class="card-body table-responsive" id="institue">


                <!---- Branch View table  ----->
                <table class="table table-bordered table-striped mt-3 branch_view_table">
                    <tbody>
                        <tr>
                            <th>Floor</th>
                            <td>{{ $data->floor->name ??''}}</td>
                        </tr>
                        <tr>
                            <th>Line Name</th>
                            <td>{{ $data->line->name ??''}}</td>
                        </tr>

                        <tr>
                            <th>Operator Name</th>
                            <td>{{ $data->operator->name ??'' }}</td>
                        </tr>
                        <tr>
                            <th>Operator Salary</th>
                            <td>{{ $data->salary??'' }}</td>
                        </tr>

                        <tr>
                            <th>Designation</th>
                            <td>{{ $data->designation->name ??""}}</td>
                        </tr>
                        <tr>
                            <th>Join Date</th>
                            <td>{{ $data->join_date ??""}}</td>
                        </tr>
                        <tr>
                            <th>AVG Performance</th>
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
                        </tr>
                        <tr>
                            <th> Grade</th>
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
                        </tr>
                        <tr>
                            <th>Proposed Grade</th>
                            <td>{{ $data->propose_salary??'' }}</td>
                        </tr>
                        <tr>
                            <th>Over Lock </th>
                            <td>
                                @forelse ($ol as $ols)
                                    {{$ols}},
                                @empty

                                  <h3>The   Operator  dose operate this Machine</h3>
                                @endforelse
                            </td>
                        </tr>
                        <tr>
                            <th>Over Lock Performance</th>
                            <td>{{ $data->ol_performance }}</td>
                        </tr>
                        <tr>
                            <th>Single Needle lock stitch  </th>
                            <td>
                                @forelse ($snls as $snls_data)
                                    {{$snls_data}},
                                @empty
                                  The   Operator  dose operate this Machine
                                @endforelse
                            </td>
                        </tr>
                        <tr>
                            <th>Single Needle lock stitch  Performance</th>
                            <td>{{ $data->snls_performance }}</td>
                        </tr>

                        <tr>
                            <th>Vertical  </th>
                            <td>
                                @forelse ($vertical as $vertical_data)
                                    {{$vertical_data}},
                                @empty
                                  The   Operator  dose operate this Machine
                                @endforelse
                            </td>
                        </tr>
                        <tr>
                            <th>Vertical  Performance</th>
                            <td>{{ $data->vertical_performance }}</td>
                        </tr>
                        <tr>
                            <th>Double Needle Lock STS  </th>
                            <td>
                                @forelse ($dnls as $dnls_data)
                                    {{$dnls_data}},
                                @empty
                                  The   Operator  dose operate this Machine
                                @endforelse
                            </td>
                        </tr>
                        <tr>
                            <th>Double Needle Lock STS  Performance</th>
                            <td>{{ $data->dnls_performance }}</td>
                        </tr>

                        <tr>
                            <th>kansai  </th>
                            <td>
                                @forelse ($kansai as $kansai_data)
                                    {{$kansai_data}},
                                @empty
                                  The   Operator  dose operate this Machine
                                @endforelse
                            </td>
                        </tr>

                        <tr>
                            <th>FOA  </th>
                            <td>
                                @forelse ($foa as $foa_data)
                                    {{$foa_data}},
                                @empty
                                  The   Operator  dose operate this Machine
                                @endforelse
                            </td>
                        </tr>


                        <tr>
                            <th>Snap  </th>
                            <td>
                                @forelse ($snap as $snap_data)
                                    {{$snap_data}},
                                @empty
                                  The   Operator  dose operate this Machine
                                @endforelse
                            </td>
                        </tr>


                        <tr>
                            <th>bh  </th>
                            <td>
                                @forelse ($bh as $bh_data)
                                    {{$bh_data}},
                                @empty
                                  The   Operator  dose operate this Machine
                                @endforelse
                            </td>
                        </tr>
                        <tr>
                            <th>bt  </th>
                            <td>
                                @forelse ($bt as $bt_data)
                                    {{$bt_data}},
                                @empty
                                  The   Operator  dose operate this Machine
                                @endforelse
                            </td>
                        </tr>
                        <tr>
                            <th>cs  </th>
                            <td>
                                @forelse ($cs as $cs_data)
                                    {{$cs_data}},
                                @empty
                                  The   Operator  dose operate this Machine
                                @endforelse
                            </td>
                        </tr>
                        <tr>
                            <th>Performance </th>
                            <td>
                                {{$data->performance}}
                            </td>
                        </tr>



                    </tbody>
                </table>

                <!---- /Branch View table ----->



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
    swal("Poof! Your imaginary file has been deleted!", {
      icon: "success",
    });
  } else {
    swal("Your imaginary file is safe!");
  }
});

});
</script>
@endpush
