@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard <a href="{{ route('admin.autos.create') }}">+</a></div>


                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Make</th>
                            <th>Model</th>
                            <th>Options</th>
                            <th>Categories</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Action</th>
                        </tr>

                        @foreach($autos as $auto)
                            <tr>
                                <td>{{ $auto->id }}</td>
                                <td>{{ $auto->make }}</td>
                                <td>{{ $auto->model }}</td>
                                <td>
                                    @foreach($auto->categories as $category)
                                        {{$category->name}} <br/>
                                    @endforeach
                                </td>
                                <td>

                                    @foreach($auto->option_value as $optionValue)
                                        {{$optionValue->option->option_name}}:  {{$optionValue->option_value}}<br/>

                                    @endforeach
                                </td>
                                <td>{{ $auto->created_at }}</td>
                                <td>{{ $auto->updated_at }}</td>
                                <td>
                                    <a href="{{ route('admin.autos.edit', ['auto' => $auto->id]) }}">Edit</a><br/>
                                    <a href="{{ route('admin.autos.show', ['auto' => $auto->id]) }}">Show</a><br/>

                                    <form action="{{ route('admin.autos.destroy', ['auto' => $auto->id]) }}"
                                          method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" onclick="return confirm('Are your sure?')"
                                               name="deleteAuto" value="Delete">
                                    </form>


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
