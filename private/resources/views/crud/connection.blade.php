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
            <h1 CLASS="text-center mt-5 mb-5">Connection Management</h1>
        </div>
        <div class="col-md-12">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col"><a class="text-dark" id="tdhover" href="connection?order=idpuntoacceso">Access point</a></th>
                  <th scope="col"><a class="text-dark" id="tdhover" href="connection?order=fecha">Date</a></th>
                  <th scope="col"><a class="text-dark" id="tdhover" href="connection?order=hora">Hour</a></th>
                  <th scope="col"><a class="text-dark" id="tdhover" href="connection?order=mac">Mac</a></th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody>
        
                @foreach($connections as $connection)
                    <tr>
                      <td>{{$connection->idpuntoacceso}}</td>
                      <td>{{$connection->fecha}}</td>
                      <td>{{$connection->hora}}</td>
                      <td>{{$connection->mac}}</td>
                      <td><a href="/wordpressconjunto/admin/connection/delete/{{$connection->id}}" class="botonborrar">Delete</a></td>
                    </tr>
                @endforeach
                
              </tbody>
            </table>
            {{$connections->appends($_GET)->onEachSide(1)->links()}}

        </div>
    </div>
</div>
<script src="{{url('public/assets/js/nacho.js')}}"></script>
@endsection