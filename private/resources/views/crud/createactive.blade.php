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
            <h1 class="text-center mt-5 mb-5">Create a new Active Timeline</h1>
        </div>
        <div class="col-md-5 mr-5 card">
            <form id="createactiveform" action="/wordpressconjunto/admin/active/createaccess" method="POST" class="nachoform">
              <div class="form-group">
                  @csrf
                  
                  <label class="labelnacho" for="fechainicial">Initial Date: </label>
                  <input class="inputnacho form-control" type="date" name="fechainicial" placeholder="Initial Date">

                  <label class="labelnacho" for="fechafinal">Final Date: </label>
                  <input class="inputnacho form-control" type="date" name="fechafinal" placeholder="Final Date">

                  <label class="labelnacho" for="horainicial">Initial Time: </label>
                  <input class="inputnacho form-control" type="time" name="horainicial" placeholder="Initial Time">

                  <label class="labelnacho" for="horafinal">Final Time: </label>
                  <input class="inputnacho form-control" type="time" name="horafinal" placeholder="Final Time" >

                  <label class="labelnacho" for="periodominimo">Minimial Period in between conections: </label>
                  <input class="inputnacho form-control" type="text" name="periodominimo" placeholder="Time in seconds in between connections">
                  
                 </div>
            </form>
        </div>
        <div class="col-md-6 card">
            <label class="labelnacho" for="comentario">Leave a comment: </label>   
            <textarea  form="createactiveform" class="ckeditor" name="comentario" id="comentario" rows="10" cols="80">                    
                Leave a comment here
            </textarea>
            
            <input form="createactiveform" class="inputnacho nachosubmit form-control btn-secondary" type="submit" value="Create Active Timeline">          
        </div>
    </div>
</div>
@endsection