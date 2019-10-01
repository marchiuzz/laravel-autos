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

                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->created_at }}</td>
                                <td>{{ $category->updated_at }}</td>
                                <td>
                                    <a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}">Edit</a><br />
                                    <a href="{{ route('admin.categories.show', ['category' => $category->id]) }}">Show</a><br />

                                    <form action="{{ route('admin.categories.destroy', ['category' => $category->id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" onclick="return confirm('Are your sure?')" name="deleteCategory" value="Delete">
                                    </form>
                                </td>
                            </tr>

                        @endforeach

                    </table>

                    {{$categories->links()}}

                </div>
            </div>
        </div>
    </div>
@endsection
