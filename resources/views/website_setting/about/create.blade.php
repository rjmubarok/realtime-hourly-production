@extends('master')
@section('content')
    <div class="row mb-2">
        <div class="col-sm-12">
            <div class="card card-info" style="">
                <form action="{{ route('saveAbout' ) }}" name="menuManagerForm" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header bg-cyan">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="card-title text-bold mt-2">Create About</h3>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{route('viewAbout' )}}" class="btn btn-primary"> About List </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body align-content-center">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="description">Description
                                        <span class="text-danger">*</span>
                                    </label>
                                    <textarea class="form-control" id="summary-ckeditor" name="description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
{{--                            <div class="col-sm-6">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="url">Upload Photo</label>--}}
{{--                                    <span class="text-danger">*</span>--}}
{{--                                    <input type="file" class="form-control" name="image" multiple id="gallery-photo-add">--}}
{{--                                </div>--}}
{{--                            </div>--}}
                                                        <div class="gallery"></div>
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
@push('script')
    <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor', {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endpush
