@extends('master')
@section('content')
    <div class="row mb-2">
        <div class="col-sm-12">
            <div class="card card-info" style="">
                <form action="{{ route('updateAimsObjective', $single_aimsObject->id ) }}" name="editAimsObjectiveForm" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="mission">
                        <div class="card-header bg-cyan">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-title text-bold mt-2">Edit Aims</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="{{route('viewAimsObjective' )}}" class="btn btn-primary"> Aims & Objectives List </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body align-content-center">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="aims_title_en">Aims Title (English)
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="aims_title_en" id="aims_title_en"
                                               value="{{$single_aimsObject->aims_title_en}}"
                                               required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="aims_title_bn">Aims Title (Bengali)
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="aims_title_bn" id="aims_title_bn"
                                               value="{{$single_aimsObject->aims_title_bn}}"
                                               required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="url">Aims Photo</label>
                                        <span class="text-danger">*</span>
                                        <input type="file" class="form-control" name="aims_image" multiple id="gallery-photo-add">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <input type="hidden" id="aims_old_image" name="aims_old_image"
                                           value="{{ $single_aimsObject->aims_image }}">
                                    <img src="{{ asset('backend/aims_objective/' . $single_aimsObject->aims_image) }}" alt="Aims Image"
                                         height="100px" width="100px">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="description"> Aims Description ( English )
                                            <span class="text-danger">*</span>
                                        </label>
                                        <textarea class="form-control" id="summary-ckeditor-aims-en"
                                                  name="aims_description_en">{{$single_aimsObject->aims_description_en}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="description"> Aims Description ( Bengla )
                                            <span class="text-danger">*</span>
                                        </label>
                                        <textarea class="form-control" id="summary-ckeditor-aims-bn"
                                                  name="aims_description_bn">{{$single_aimsObject->aims_description_bn}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="vision">
                        <div class="card-header bg-cyan">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-title text-bold mt-2">Edit Objective</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body align-content-center">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="objective_title_en">Objective Title (English)
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="objective_title_en" id="objective_title_en"
                                               value="{{$single_aimsObject->objective_title_en}}"
                                               required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="objective_title_bn">Objective Title (Bangla)
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="objective_title_bn" id="objective_title_bn"
                                               value="{{$single_aimsObject->objective_title_bn}}"
                                               required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="url">Objective Photo</label>
                                        <span class="text-danger">*</span>
                                        <input type="file" class="form-control" name="objective_image" multiple id="gallery-photo-add">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="hidden" id="objective_old_image" name="objective_old_image"
                                           value="{{ $single_aimsObject->objective_image }}">
                                    <img src="{{ asset('backend/aims_objective/' . $single_aimsObject->objective_image) }}" alt="Objective Image"
                                         height="100px" width="100px">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="description">Objective Description (English)
                                            <span class="text-danger">*</span>
                                        </label>
                                        <textarea class="form-control" id="summary-ckeditor-objective-en"
                                                  name="objective_description_en">{{$single_aimsObject->objective_description_en}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="description">Objective Description (Bengali)
                                            <span class="text-danger">*</span>
                                        </label>
                                        <textarea class="form-control" id="summary-ckeditor-objective-bn"
                                                  name="objective_description_bn">{{$single_aimsObject->objective_description_bn}}</textarea>
                                    </div>
                                </div>
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
@push('script')
    <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('summary-ckeditor-aims-en', {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('summary-ckeditor-aims-bn', {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('summary-ckeditor-objective-en', {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('summary-ckeditor-objective-bn', {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endpush
