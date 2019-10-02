@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard <a href="{{ route('admin.options_values.create') }}">+</a></div>


                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Option</th>
                            <th>Value</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Action</th>
                        </tr>

                        @foreach($values as $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->option->option_name }}</td>
                                <td>{{ $value->option_value }}</td>
                                <td>{{ $value->created_at }}</td>
                                <td>{{ $value->updated_at }}</td>
                                <td>
                                    <a href="{{ route('admin.options_values.edit', ['value' => $value->id]) }}">Edit</a><br />
                                    <a href="{{ route('admin.options_values.show', ['value' => $value->id]) }}">Show</a><br />

                                    <form action="{{ route('admin.options_values.destroy', ['value' => $value->id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" onclick="return confirm('Are your sure?')" name="deleteValue" value="Delete">
                                    </form>
                                </td>
                            </tr>

                        @endforeach

                    </table>

                    {{$values->links()}}

                </div>
            </div>
        </div>
    </div>
@endsection
