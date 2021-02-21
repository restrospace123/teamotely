@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
            <div class="col-md-8">
            <form method="POST" action="process-form">
                <div class="card">
                    <div class="card-header">{{ __('Fill the form') }}</div>
                    <div class="col-md-12">
                            @csrf
                            <div class="card-body">
                                <label><strong>Put CSV Data</strong></label>
                                <br>
                                <textarea name="csv" id="csv" class="form-control @error('csv') is-invalid @enderror">{{ old('csv') }}</textarea>
                                @error('csv')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                    </div>
                    <div class="col-md-12 text-right">
                            <div class="card-body">
                                <button type="submit" name="submit" class="btn btn-danger">Submit</button>
                            </div>
                    </div>
                    
                </div>
                </form>
            </div>
 
    </div>
    <br>
    <div class="row justify-content-center">
        @if(Session::has('table'))
         {!!Session::get('table')!!}
        @endif
    </div>
</div>
@endsection
