@extends('admin')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 CLASS="text-center mt-5 mb-5">Editing User:  {{$user->name}}</h1>
        </div>
        <div class="col-md-6 offset-3 card">
            <form action="/wordpressconjunto/admin/users/upload/{{$user->id}}" method="POST" class="nachoform">
              <div class="form-group">
                  @csrf
                  <label class="labelnacho" for="name">Name: </label>
                  <input class="inputnacho form-control" type="text" name="name" value="{{$user->name}}">
                  <label class="labelnacho" for="Email">Email: </label>
                  <input class="inputnacho form-control" type="email" name="email" value="{{$user->email}}">
                  <label class="labelnacho" for="username">Username: </label>
                  <input class="inputnacho form-control" type="text" name="username" value="{{$user->username}}">
                  <input class="inputnacho nachosubmit form-control btn-secondary" type="submit" value="Edit">
                 </div>
            </form>
        </div>
    </div>
</div>
        
@endsection