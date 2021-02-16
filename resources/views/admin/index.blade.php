@extends('layouts.admin')

@section('content')
    <h1>Admin Dashboard</h1>
    <div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Position</th>
                <th>Created</th>
                <th>Update</th>
            </tr>
            </thead>
            <tfoot>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Position</th>
                <th>Created</th>
                <th>Update</th>
            </tfoot>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->status}}</td>
                        <td>{{$user->position}}</td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                        <td>{{$user->updated_at->diffForHumans()}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
