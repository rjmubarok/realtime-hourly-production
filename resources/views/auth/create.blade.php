@extends('master')
@section('content')
    <div class="row mb-2">
        <div class="col-sm-12">
            <div class="card card-info" style="">
                <form action="{{ route('user.create' ) }}" name="userCreateForm" method="post">
                    @csrf
                    <div class="card-header bg-cyan">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="card-title text-bold mt-2">User Create</h3>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{route('user.list' )}}" class="btn btn-primary"> User List </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <span class="text-danger">*</span>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter ...">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email">Email
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Enter ..." required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="floor_id">Select Floor </label>
                                    <select class="form-control" name="floor_id" id="floor_id">
                                        <option selected>Select Floor</option>
                                        @foreach($floors as $floor)
                                            <option value="{{$floor->id}}">{{$floor->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="line_id">Select Line </label>
                                    <select class="form-control customSelect2" name="line_id" id="line_id">
                                        <option selected>Select Line</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="user_type">Select User Type </label>
                                    <select class="form-control customSelect2" name="user_type" id="user_type" required>
                                        <option selected>Select Type</option>
                                        {{-- <option value="4">Operator</option> --}}
                                        <option value="2">User</option>
                                        <option value="1">Admin</option>
                                        @if(auth()->user()->user_type==1)
                                        <option value="3">Floor Admin</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-sm btn-success w-100">save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function () {

            $('#floor_id').on('change', function () {
                var idFloor = this.value;
                $("#line_id").html('');
                $.ajax({
                    url: "{{route('fetchFloor')}}",
                    type: "POST",
                    data: {
                        floor_id: idFloor,
                        _token: '{{csrf_token()}}'
                    },

                    success: function (result) {
                        $('#line_id').html('<option value="">Select Line</option>');

                        $.each(result, function (key, value) {
                            $("#line_id").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });

    </script>
@endpush
