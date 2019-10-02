@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>


                    @if($errors->any())

                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>

                        </div>
                    @endif


                    <div class="card-body">
                        <form action="{{ route('admin.options.values.store') }}" method="post">
                            @csrf

                            <label for="make">Option Name</label>
                            <input type="text" name="option_value" id="option_value" value="{{ old('option_value') }}"><br />

                            <select name="options">
                            @foreach($options as $optionId => $optionName)
                                <option value="{{ $optionId }}">{{ $optionName }}</option>
                            @endforeach
                            </select><br />

                            <input type="submit" name="submit" value="Add Value">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
