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
                        <form action="{{ route('admin.options.update', ['option' => $option->id]) }}" method="POST">
                            @csrf
                            @method('put')

                            <label for="make">Option Name</label>
                            <input type="text" name="option_name" id="option_name" value="{{ old('name', $option->name) }}"><br />


                            <input type="submit" name="submit" value="Update">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
