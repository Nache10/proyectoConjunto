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
            <h1 CLASS="text-center mt-5 mb-5">Big Data Management</h1>
        </div>
        <div class="col-md-12">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Access point</th>
                  <th scope="col">Date</th>
                  <th scope="col">Hour</th>
                  <th scope="col">Mac</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody>
        
                @foreach($cacas as $caca)
                    <tr>
                      <td>{{$caca->idpuntoacceso}}</td>
                      <td>{{$caca->fecha}}</td>
                      <td>{{$caca->hora}}</td>
                      <td>{{$caca->mac}}</td>
                      <td><a href="/wordpressconjunto/admin/caca/delete/{{$caca->id}}" class="botonborrar">Delete</a></td>
                    </tr>
                @endforeach
                
              </tbody>
            </table>
            {{$cacas->onEachSide(1)->links()}}
        </div>
    </div>
</div>
<script src="{{url('public/assets/js/nacho.js')}}"></script>
@endsection