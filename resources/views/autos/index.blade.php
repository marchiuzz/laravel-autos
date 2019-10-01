@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard <a href="{{ route('admin.autos.create') }}">+</a></div>


                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Make</th>
                            <th>Model</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Action</th>
                        </tr>

                        @foreach($autos as $auto)
                            <tr>
                                <td>{{ $auto->id }}</td>
                                <td>{{ $auto->make }}</td>
                                <td>{{ $auto->model }}</td>
                                <td>{{ $auto->created_at }}</td>
                                <td>{{ $auto->updated_at }}</td>
                                <td>
                                    <a href="">Edit</a><br />
                                    <a href="">Show</a><br />
                                    <a href="">Delete</a>
                                </td>
                            </tr>

                        @endforeach

                    </table>

                    {{$autos->links()}}

                </div>
            </div>
        </div>
    </div>
@endsection
