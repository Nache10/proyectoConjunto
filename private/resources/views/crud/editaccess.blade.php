@extends('admin')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 CLASS="text-center mt-5 mb-5">Editing Access Point:  {{$pa->modelo}}</h1>
        </div>
        <div class="col-md-5 mr-5 card">
            <form action="/wordpressconjunto/admin/access/upload/{{$pa->id}}" method="POST" class="nachoform" id="editaccessform">
              <div class="form-group">
                  @csrf
                  
                  <input type="hidden" name="iduser" value="{{Auth::user()->id}}">
                  
                  <label class="labelnacho" for="modelo">Model: </label>
                  <input class="inputnacho form-control" type="text" name="modelo" value="{{$pa->modelo}}">

                  <label class="labelnacho" for="ubicacion">Ubication: </label>
                  <input class="inputnacho form-control" type="text" id="ubicacion" name="ubicacion" value="{{$pa->ubicacion}}">

                  <label class="labelnacho" for="latitud">Latitude: </label>
                  <input class="inputnacho form-control" type="text" id="latitud" name="latitud" value="{{$pa->latitud}}">

                  <label class="labelnacho" for="longitud">Longitude: </label>
                  <input class="inputnacho form-control" type="text" id="longitud" name="longitud" value="{{$pa->longitud}}" >

                  <label class="labelnacho" for="fechaalta">Instalation Date: </label>
                  <input class="inputnacho form-control" id="" type="date" name="fechaalta" value="{{$pa->fechaalta}}">
                  
                 </div>
            </form>
        </div>
        <div class="col-md-6 card pb-3">

            <div id="gmap" class="mt-3" style="width:100%; height:400px"></div>
            <input form="editaccessform" class="inputnacho nachosubmit form-control btn-secondary" type="submit" value="Edit Access Point">          
        </div>
    </div>
</div>

<script src="{{url('public/assets/js/mapa.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8Z7bzVkAdR04-O5KaGwcygL1GLmLwZfE&callback=initMap" type="text/javascript"></script>
@endsection