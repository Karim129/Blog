@extends('layouts.dashboard')


@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row d-flex justify-content-between align-items-center mx-5">
                <div class="">
                    <h1 class="m-0"> Users</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">User</li>

                    </ol>
                </div><!-- /.col -->
                <div>
                    @can('user-create')
                        <div class="d-flex justify-content-between align-items-center mt-4 mb-2">
                            <a href="{{ route('users.create') }}" class="btn btn-primary">Create New User</a>
                        </div>
                    @endcan
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="container">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Image</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td><img src="{{ asset($user->image) }}" alt="" width="50px"
                                        height="50px"></td>
                                <td>
                                    @foreach ($user->roles as $role)
                                        {{ $role->name }}
                                    @endforeach
                                </td>
                                <td>
                                    @can('user-edit')
                                        <a href="{{ route('users.edit', $user) }}" class="btn btn-primary">Edit</a>
                                    @endcan
                                    @can('user-delete')
                                        <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>



            </div>
        </div>
    </section>
    <div class="styled-pagination">
        {{ $users->onEachSide(1)->links() }}
    </div>
@endsection
