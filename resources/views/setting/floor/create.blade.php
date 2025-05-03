@extends('master')
@section('content')
    <div class="row mb-2">
        <div class="col-sm-12">
            <div class="card card-info" style="">
                <form action="{{ route('floorSave') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header bg-cyan">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="card-title text-bold mt-2">Floor Setup</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body align-content-center">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">Floor Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input class="form-control" type="text" name="name" id="name" required>

                                </div>
                            </div>
                            {{--                            <div class="col-sm-6">--}}
                            {{--                                <div class="form-group">--}}
                            {{--                                    <label for="description">Assign Floor--}}
                            {{--                                        <span class="text-danger">*</span>--}}
                            {{--                                    </label>--}}
                            {{--                                    <select name="" id="" class="form-control">--}}
                            {{--                                        <option value="">1st Floor</option>--}}
                            {{--                                        <option value="">Second  Floor</option>--}}
                            {{--                                    </select>--}}

                            {{--                                </div>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-sm btn-success w-100">Save</button>
                    </div>
                </form>

            </div>
        </div>
@endsection
