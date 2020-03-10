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
            <h1 CLASS="text-center mt-5 mb-5">Create a new Access Point</h1>
        </div>
        <div class="col-md-5 mr-5 card">
            <form action="/wordpressconjunto/admin/access/createaccess" method="POST" class="nachoform" id="createaccessform">
              <div class="form-group">
                  @csrf
                  
                  <input type="hidden" name="iduser" value="{{Auth::user()->id}}">
                  <label class="labelnacho" for="modelo">Model: </label>
                  <input class="inputnacho form-control" type="text" name="modelo" placeholder="Model">

                  <label class="labelnacho" for="ubicacion" >Ubication: </label>
                  <input class="inputnacho form-control" id="ubicacion" type="text" name="ubicacion" placeholder="Ubication">

                  <label class="labelnacho" for="latitud" >Latitude: </label>
                  <input class="inputnacho form-control" id="latitud" type="text" name="latitud" placeholder="Latitude">

                  <label class="labelnacho" for="longitud" >Longitude: </label>
                  <input class="inputnacho form-control" id="longitud" type="text" name="longitud" placeholder="Longitude" >

                  <label class="labelnacho" for="fechaalta">Instalation Date: </label>
                  <input class="inputnacho form-control" type="date" name="fechaalta" placeholder="Instalation Date">
                  
                 </div>
            </form>
        </div>
        <div class="col-md-6 card pb-3">

            <div id="gmap" class="mt-3" style="width:100%; height:400px"></div>
            <input form="createaccessform" class="inputnacho nachosubmit form-control btn-secondary" type="submit" value="Create Access Point">          
        </div>
    </div>
</div>
        
        
<script src="{{url('public/assets/js/mapa.js')}}"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8Z7bzVkAdR04-O5KaGwcygL1GLmLwZfE&callback=initMap" type="text/javascript"></script>
@endsection