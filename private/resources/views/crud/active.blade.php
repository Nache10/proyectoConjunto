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
            <h1 CLASS="text-center mt-5 mb-5">Active Timeline Management</h1>
        </div>
        <div class="col-md-12">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Initial Date</th>
                  <th scope="col">Final Date</th>
                  <th scope="col">Initial Time</th>
                  <th scope="col">Final Time</th>
                  <th scope="col">Minimum period</th>
                  <th>comentario</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody>
        
                @foreach($actives as $active)
                    <tr>
                      <td>{{$active->fechainicial}}</td>
                      <td>{{$active->fechafinal}}</td>
                      <td>{{$active->horainicial}}</td>
                      <td>{{$active->horafinal}}</td>
                      <td>{{$active->periodominimo}}</td>
                      <td><p>{!!$active->comentario!!}</p></td>
                      <td><a href="/wordpressconjunto/admin/active/edit/{{$active->id}}" >Edit</a></td>
                      <td><a href="/wordpressconjunto/admin/active/delete/{{$active->id}}" class="botonborrar" >Delete</a></td>
                    </tr>
                @endforeach
                
              </tbody>
            </table>
            {{$actives->onEachSide(1)->links()}}

        </div>
    </div>
</div>
<script src="{{url('public/assets/js/nacho.js')}}"></script>
@endsection