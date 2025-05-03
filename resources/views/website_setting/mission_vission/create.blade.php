@extends('master')
@section('content')
    <div class="row mb-2">
        <div class="col-sm-12">
            <div class="card card-info" style="">
                <form action="{{ route('saveMissionVision' ) }}" name="missionVisionForm" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mission">
                        <div class="card-header bg-cyan">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-title text-bold mt-2">Create Mission</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="{{route('viewMissionVision' )}}" class="btn btn-primary"> Mission & Vision List </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body align-content-center">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="mission_title">Mission Title
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="mission_title" id="mission_title" value="{{old('title')}} required>
                                    </div>
                                </div>
                            </div>
                            <div class=" row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="url">Mission Photo</label>
                                                <span class="text-danger">*</span>
                                                <input type="file" class="form-control" name="mission_image" multiple id="gallery-photo-add">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="description">Description
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <textarea class="form-control" id="summary-ckeditor" name="mission_description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="vision">
                                <div class="card-header bg-cyan">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h3 class="card-title text-bold mt-2">Create Vision</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body align-content-center">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="mission_title">Vision Title
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" name="vision_title" id="vision_title" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="url">Vision Photo</label>
                                                <span class="text-danger">*</span>
                                                <input type="file" class="form-control" name="vision_image" multiple id="gallery-photo-add">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="description">Vision Description
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <textarea class="form-control" id="summary-ckeditor2" name="vision_description"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-sm btn-success w-100">Submit</button>
                                    </div>
                                </div>
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
        CKEDITOR.replace('summary-ckeditor', {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('summary-ckeditor2', {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endpush
