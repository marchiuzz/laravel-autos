@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard <a href="{{ route('admin.options.create') }}">+</a></div>


                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Action</th>
                        </tr>

                        @foreach($options as $option)
                            <tr>
                                <td>{{ $option->id }}</td>
                                <td>{{ $option->option_name }}</td>
                                <td>{{ $option->created_at }}</td>
                                <td>{{ $option->updated_at }}</td>
                                <td>
                                    <a href="{{ route('admin.options.edit', ['option' => $option->id]) }}">Edit</a><br />
                                    <a href="{{ route('admin.options.show', ['option' => $option->id]) }}">Show</a><br />

                                    <form action="{{ route('admin.options.destroy', ['option' => $option->id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" onclick="return confirm('Are your sure?')" name="deleteOption" value="Delete">
                                    </form>
                                </td>
                            </tr>

                        @endforeach

                    </table>

                    {{$options->links()}}

                </div>
            </div>
        </div>
    </div>
@endsection
