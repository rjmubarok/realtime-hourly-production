@extends('master')
@section('content')
    <div class="row mb-2">
        <div class="col-sm-12">
            <div class="card card-info" style="">
                <form action="{{ route('updateMenuPage', $single_menu->id ) }}" name="menuManagerForm" method="post"  enctype="multipart/form-data">
                    @csrf
                    <div class="card-header bg-cyan">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="card-title text-bold mt-2">Menu Edit</h3>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{route('viewMenuManager' )}}" class="btn btn-primary"> Menu List </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="index">Index</label>
                                    <input type="number" min="0" class="form-control" name="index" id="index" value="{{$single_menu->index}}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="title">Title
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="title" id="title" value="{{ $single_menu->title }}" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="parent_id">Parent Menu</label>

                                <select name="parent_id" id="parent_id" class="form-control" value="0">
                                    <option value="">Select</option>
                                    @foreach($menus as $data)

                                        <option value="{{$data->id}}" {{ $data->id == $single_menu->parent_id ? 'selected' : '' }}>
                                            {{ $data->title }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="url">URL</label>
                                    <span class="text-danger">*</span>
                                    <input type="text" class="form-control" name="url" id="url" value="{{$single_menu->url}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="status">Status
                                    <span class="text-danger">*</span>
                                </label>
                                <select name="status" id="status" class="form-control" required>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-sm btn-success w-100">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
