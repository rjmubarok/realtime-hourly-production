@extends('master')
@section('content')
<div class="card">
    <div class="card-header">
        <h3>Search Quality Check Date To Date </h3>
    </div>
    <div class="card-body">
        <form action="{{ route('quality_report_result') }}" method="post" target="_blank">
            @CSRF
            <div class="row">
                <div class="col-sm-6">
                    <label for="from">From Date</label>
                    <input type="date" name="from" id="from" class="form-control" value="{{ date('Y-m-d') }}"
                        required />
                </div>
                <div class="col-sm-6">
                    <label for="to">To Date</label>
                    <input type="date" name="to" id="to" class="form-control" value="{{ date('Y-m-d') }}" required />
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-success btn-sm mt-4">
                        <i class="fas fa-search"></i>search
                    </button>
                </div>
            </div>
        </form>
    </div>
    
</div>
</div>
@endsection