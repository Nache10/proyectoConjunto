@extends('admin')
@section('content')
@if(Session::has('alerta'))
  <div class="alert alert-{{ Session::get('status')}}" role="alert">
    {{ Session::get('mensaje')}}
  </div>
  <?php Session::forget('alerta');Session::forget('status');Session::forget('mensaje'); ?>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 CLASS="text-center mt-5 mb-5">User Management</h1>
        </div>
        <div class="col-md-12">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Username</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody>
        
                @foreach($users as $user)
                    <tr>
                      <td>{{$user->id}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->username}}</td>
                      <td><a href="/wordpressconjunto/admin/users/edit/{{$user->id}}" >Edit</a></td>
                      <td><a href="/wordpressconjunto/admin/users/delete/{{$user->id}}" class="botonborrar">Delete</a></td>
                    </tr>
                @endforeach
                
              </tbody>
            </table>
            {{$users->onEachSide(1)->links()}}
        </div>
    </div>
</div>
<script src="{{url('public/assets/js/nacho.js')}}"></script>
@endsection