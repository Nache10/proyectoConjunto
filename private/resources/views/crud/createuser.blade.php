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
            <h1 CLASS="text-center mt-5 mb-5">Create a new user</h1>
        </div>
        <div class="col-md-6 offset-3 card">
            <form action="/wordpressconjunto/admin/users/createuser" method="POST" class="nachoform">
              <div class="form-group">
                  @csrf
                  <label class="labelnacho" for="name">Name: </label>
                  <input class="inputnacho form-control" type="text" name="name" placeholder="name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  <label class="labelnacho" for="Email">Email: </label>
                  <input class="inputnacho form-control" type="email" name="email" placeholder="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  <label class="labelnacho" for="username">Username: </label>
                  <input class="inputnacho form-control" type="text" name="username" placeholder="username">
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  <label class="labelnacho" for="password">Password: </label>
                  <input class="inputnacho form-control" type="password" name="password" >
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  <label class="labelnacho" for="password-confirm">Repeat password: </label>
                  <input class="inputnacho form-control" type="password" name="password-confirm">
                  <input class="inputnacho nachosubmit form-control btn-secondary" type="submit" value="Create User">
                 </div>
            </form>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{url('public/assets/js/nacho.js')}}"></script>
@endsection