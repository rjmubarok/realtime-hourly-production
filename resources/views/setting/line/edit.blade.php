@extends('master')
@section('content')
    <div class="row mb-2">
        <div class="col-sm-12">
            <div class="card card-info" style="">
                <form action="{{ route('line_update',$data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="card-header bg-cyan">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="card-title text-bold mt-2">Line Edit</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body align-content-center">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="floor_id">Select Floor Name</label>
                                <select class="form-control" name="floor_id" id="floor_id">
                                    <option selected>Select Floor</option>
                                    @foreach($floors as $floor)
                                        <option value="{{$floor->id}}" {{ $data->floor_id == $floor->id ? 'selected' : '' }}>{{$floor->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">Line Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input class="form-control" type="text" name="name" value="{{ $data->name }}" id="name" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-sm btn-success w-100">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
