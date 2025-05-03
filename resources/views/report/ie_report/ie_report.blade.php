@extends('master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Search IE </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('ie_report_result') }}" method="post" target="_blank">
                @CSRF
                <div class="col">
{{--                    <label for="from"> Select Buyer</label>--}}
{{--                    <div class="col">--}}
{{--                        <select id="buyer_id" name="buyer_id" class="form-control" required>--}}
{{--                            @foreach($buyers as $buyer)--}}
{{--                                <option value={{$buyer->id}}>{{$buyer->name}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
                    <div class="col">
                        <label for="from"> Color</label>
                        <input type="text" name="color" id="color" class="form-control" placeholder="Please Enter the color Name"
                               required/>
                    </div>
                    <div class="col">
                        <label for="from">From Date</label>
                        <input type="date" name="from" id="from" class="form-control" value="{{ date('Y-m-d') }}"
                               required/>
                    </div>
                    <div class="col">
                        <label for="to">To Date</label>
                        <input type="date" name="to" id="to" class="form-control" value="{{ date('Y-m-d') }}" required/>
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
@endsection
