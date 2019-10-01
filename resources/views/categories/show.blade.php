@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard <a href="{{ route('admin.categories.create') }}">+</a></div>


                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Action</th>
                        </tr>

                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->created_at }}</td>
                                <td>{{ $category->updated_at }}</td>
                                <td>
                                    <form action="{{ route('admin.categories.destroy', ['category' => $category->id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" onclick="return confirm('Are your sure?')" name="deleteAuto" value="Delete">
                                    </form>
                                </td>
                            </tr>
                    </table>


                </div>
            </div>
        </div>
    </div>
@endsection
