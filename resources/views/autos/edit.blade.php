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
                        <form action="{{ route('admin.autos.update', ['auto' => $auto->id]) }}" method="POST">
                            @csrf
                            @method('put')

                            <label for="make">Car Make</label>
                            <input type="text" name="make" id="make" value="{{ old('make', $auto->make) }}"><br/>

                            <label for="model">Car Model</label>
                            <input type="text" name="model" id="model" value="{{ old('model', $auto->model) }}"><br/>

                            @foreach($categories as $categoryId => $name)
                                <input type="checkbox" name="categories[]" value="{{$categoryId}}"

                                    {{ in_array($categoryId, $selectedCategories) ? "checked" : "" }}
                                >{{  $name }}<br/>
                            @endforeach


                            <br/>
                            @foreach($options as $option)
                                <b>{{ucfirst($option->option_name)}}</b>
                                <select name="options[]">
                                    <option value="">Choose</option>
                                    @foreach($option->values as $value)
                                        <option
                                            value="{{ $value->id }}" {{in_array($value->id, $selectedOptionValues) ? "selected" : ""}}>
                                            {{ $value->option_value }}
                                        </option>
                                    @endforeach
                                </select>
                                <br/>
                            @endforeach

                            <br/>

                            <input type="submit" name="submit" value="Update">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
