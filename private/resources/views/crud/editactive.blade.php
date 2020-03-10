@extends('admin')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 CLASS="text-center mt-5 mb-5">Editing Active Timeline</h1>
        </div>
        <div class="col-md-5 mr-5 card">
            <form action="/wordpressconjunto/admin/active/upload/{{$active->id}}" method="POST" class="nachoform" id="editactiveform">
              <div class="form-group">
                  @csrf
                  
                  <label class="labelnacho" for="fechainicial">Initial Date: </label>
                  <input class="inputnacho form-control" type="date" name="fechainicial" value="{{$active->fechainicial}}">

                  <label class="labelnacho" for="fechafinal">Final Date: </label>
                  <input class="inputnacho form-control" type="date" name="fechafinal" value="{{$active->fechafinal}}">

                  <label class="labelnacho" for="horainicial">Initial Time: </label>
                  <input class="inputnacho form-control" type="time" name="horainicial" value="{{$active->horainicial}}">

                  <label class="labelnacho" for="horafinal">Final Time: </label>
                  <input class="inputnacho form-control" type="time" name="horafinal" value="{{$active->horafinal}}" >

                  <label class="labelnacho" for="periodominimo">Minimial Period in between conections: </label>
                  <input class="inputnacho form-control" type="text" name="periodominimo" value="{{$active->periodominimo}}">
              </div>
            </form>
        </div>
        <div class="col-md-6 card">
            <label class="labelnacho" for="comentario">Leave a comment: </label>   
            <textarea  form="editactiveform" class="ckeditor" name="comentario" id="comentario" rows="10" cols="80">                    
                {{$active->comentario}}
            </textarea>
            
            <input form="editactiveform" class="inputnacho nachosubmit form-control btn-secondary" type="submit" value="Edit Active Timeline">          
        </div>
    </div>
</div>
        
@endsection