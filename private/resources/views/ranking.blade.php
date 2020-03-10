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
        <div class="col-lg-12">
            <h3 class="mt-5 mb-5 text-center">Ranking connections through time</h3>
            <form class="mb-5">
                <div class="text-center">
                    <label class="mr-2" for="dia"> Last Day:</label>
                    <input type="radio" name="ranking" id="dia" value="dia">
                    <label class="mr-2 ml-5" for="semana"> Last week:</label>
                    <input type="radio" name="ranking" id="semana" value="semana">
                    <label class="mr-2 ml-5" for="mes"> Last month:</label>
                    <input type="radio" name="ranking" id="mes" value="mes">
                    <label class="mr-2 ml-5" for="ano"> Last year:</label>
                    <input type="radio" name="ranking" id="ano" value="ano">
                    <label class="mr-2 ml-5" for="siempre"> Ever:</label>
                    <input type="radio" name="ranking" id="siempre" value="siempre" checked>
                    <input type="submit" class="inputnacho nachosubmit form-control btn btn-secondary" value="Check Ranking" id="enviarform">
                </div>
            </form>
            <table class="table table-striped mt-5">
              <thead>
                <tr>
                  <th scope="col">Top</th>
                  <th scope="col">Mac</th>
                  <th scope="col">Connections</th>
                </tr>
              </thead>
              <tbody id="rellenarTabla">
                <?php $count = 1; ?>
                @foreach($conexiones as $conexion)
                <tr>
                  <td>{{$count}}</td>
                  <td>{{$conexion->mac}}</td>
                  <td>{{$conexion->count}}</td>
                </tr>
                <?php $count=$count+1; ?>
                @endforeach
              </tbody>
            </table>
        </div>
        <div class="text-center">
            <canvas class="ml-4" id="rankingChart" style="height:300px; width:1100px; min-width:1100px; max-width:1100px"></canvas>
        </div>
    </div>
</div>
<script src=" https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js "></script>
<script src="{{url('public/assets/js/ranking.js')}}"></script>
@endsection