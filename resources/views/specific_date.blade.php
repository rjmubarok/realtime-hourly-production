@extends('master')
@section('content')
    <div class="row">

        <div class="col-sm-12">
            <div class="card card-info" style="">
                <form action="{{ route('specific_date_data') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header bg-cyan">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="card-title text-bold mt-2">Specific Date Production Edit And Update</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body align-content-center">
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="floor_id">Select Floor Name</label>
                                <select class="form-control" name="floor_id" id="floor_id">
                                    <option selected>Select Floor</option>
                                    @foreach ($floors as $floor)
                                        <option value="{{ $floor->id }}">{{ $floor->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="floor_id"> Specific Date</label>
                                <input type="date" name="date" class="form-control" id="start_date">
                            </div>
                            <div class="col-md-3 mt-4">
                                <label></label>
                                <button type="submit" class="btn btn-sm btn-success mt-3">Submit</button>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>


    </div>
@endsection


@push('script')
@endpush
