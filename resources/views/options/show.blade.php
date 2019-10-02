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
                            <th>Values</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Action</th>
                        </tr>

                            <tr>
                                <td>{{ $option->id }}</td>
                                <td>{{ $option->option_name }}</td>
                                <td>
                                    @foreach($option->values as $value)
                                        {{$value->option_value}}<br/>
                                    @endforeach
                                </td>
                                <td>{{ $option->created_at }}</td>
                                <td>{{ $option->updated_at }}</td>
                                <td>
                                    <form action="{{ route('admin.options.destroy', ['option' => $option->id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" onclick="return confirm('Are your sure?')" name="deleteOption" value="Delete">
                                    </form>
                                </td>
                            </tr>
                    </table>


                </div>
            </div>
        </div>
    </div>
@endsection
