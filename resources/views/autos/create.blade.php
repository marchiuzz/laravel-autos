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
                        <form action="{{ route('admin.autos.store') }}" method="post">
                            @csrf

                            <label for="make">Car Make</label>
                            <input type="text" name="make" id="make" value=""><br />

                            <label for="model">Car Model</label>
                            <input type="text" name="model" id="model" value="">


                            <input type="submit" name="submit" value="Add Car">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
