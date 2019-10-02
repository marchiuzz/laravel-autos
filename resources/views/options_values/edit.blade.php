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
                        <form action="{{ route('admin.options_values.update', ['value' => $value->id]) }}" method="POST">
                            @csrf
                            @method('put')

                            <label for="make">Option Name</label>
                            <input type="text" name="option_value" id="option_value" value="{{ old('option_value', $value->option_value) }}"><br />

                            <select name="options">

                                @foreach($options as $optionId => $optionName)
                                    <option value="{{ $optionId }}" {{ $value->option->id == $optionId ? "selected" : "" }}>{{ $optionName }}</option>
                                @endforeach
                            </select><br />

                            <input type="submit" name="submit" value="Update">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
