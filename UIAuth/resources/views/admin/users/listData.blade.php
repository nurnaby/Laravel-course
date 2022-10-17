@extends('admin.layout.default')
@section('title', 'users')
@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Users List</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <a href="{{ url('/userCreate') }}" class="btn btn-danger btn-rounded">Add New</a>

                </ul>
            </div>
        </div>
        <hr>
        <table class="table datatable-basic">
            <thead>
                <tr>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>password</th>

                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($users))
                    @foreach ($users as $key => $user)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</a></td>
                            <td>{{ $user->password }}</td>

                            <td class="text-center">
                                <a href="{{ url('users/edit', $user->id) }}"><i class=" icon-pencil5"></i></a>

                                <form action="{{ url('users/delete', $user->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit"><i class=" icon-trash"></i></button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">NO data found</td>
                    </tr>
                @endif

            </tbody>
        </table>

    </div>
@endsection
