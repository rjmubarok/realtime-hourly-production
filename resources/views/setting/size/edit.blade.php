@extends('master')
@section('content')
    <div class="row mt-5">
        <div class="col-md-6 offset-3">
            <div class="card">
                <div class="card-title">
                    <h2 class="text-center">Size Edit</h2>
                </div>
                <div class="card-body">

                        <form action="{{ route('sizeUpdate',$size->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="col-12">
                                <label for="floor_id">Select Floor Name</label>
                                <select class="form-control" name="floor_id" id="floor_id">
                                    <option selected>Select Floor</option>
                                    @foreach($floors as $floor)
                                        <option @if ( $size->line_id == $floor->id) selected @endif value="{{$floor->id}}">{{$floor->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="line_id">Select Line Name</label>
                                <select class="form-control" name="line_id" id="line_id">
                                    <option selected>Select Line</option>
                                    @foreach($lines as $line)
                                        <option @if ( $size->line_id == $line->id) selected @endif  value="{{$line->id}}">{{$line->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="">Size Name</label>
                                <input type="text" name="name" value="{{$size->name}}" placeholder="Enter Size Name"
                                            class="form-control" />
                            </div>
                            <button type="submit" class="btn btn-success ml-3 mt-3">Update</button>
                        </form>

                </div>
            </div>
        </div>


    </div>
@endsection


