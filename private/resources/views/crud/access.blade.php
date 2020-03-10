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
            <h1 CLASS="text-center mt-5 mb-5">Access Points Management</h1>
        </div>
        <div class="col-md-12">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Model</th>
                  <th scope="col">Ubication</th>
                  <th scope="col">Latitude</th>
                  <th scope="col">Longitude</th>
                  <th scope="col">Instalation Date</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody>
        
                @foreach($accesspoints as $point)
                    <tr>
                      <td>{{$point->modelo}}</td>
                      <td>{{$point->ubicacion}}</td>
                      <td>{{$point->latitud}}</td>
                      <td>{{$point->longitud}}</td>
                      <td>{{$point->fechaalta}}</td>
                      <td><a href="/wordpressconjunto/admin/access/edit/{{$point->id}}" >Edit</a></td>
                      <td><a href="/wordpressconjunto/admin/access/delete/{{$point->id}}" class="botonborrar">Delete</a></td>
                    </tr>
                @endforeach
                
              </tbody>
            </table>
            {{$accesspoints->onEachSide(1)->links()}}
        </div>
    </div>
</div>
<script src="{{url('public/assets/js/nacho.js')}}"></script>
@endsection