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
<div class="col-md-12"><h1 class="text-center mt-5 mb-5">Graphs</h1>
</div>
    <div class="col-md-4">
      <canvas id="myChart" style="height:400px; width:400px"></canvas>
    </div>
    <div class="centrargrafica">
      <select class="text-center" id="modelo" name="modelo">
        @foreach($puntos as $punto)
          <option value="{{$punto->modelo}}">{{$punto->modelo}}</option>
        @endforeach
      </select>
      <canvas id="thirdChart" style=" width:600px"></canvas>
    </div>
    <div class="col-md-12">
        <div id="gmap" class="mt-3" style="width:100%; height:400px"></div>
    </div>
  </div>
</div>



<script src="{{url('public/assets/js/geo.js')}}"></script>

<script src=" https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js "></script>
<script src=" {{ url('public/assets/js/charts.js') }} "></script>
<script src="{{url('public/assets/js/mapadata.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8Z7bzVkAdR04-O5KaGwcygL1GLmLwZfE&callback=initMap" type="text/javascript"></script>
@endsection