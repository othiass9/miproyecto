<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Clase</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <form action="{{ url('clases')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
      
      <div class="form-group col-4">
        <label for="Nombre">{{'Nueva Clase'}}</label>
        <input type="text" class="form-control" name="clase" id="clase" value="" required>
      </div>
      <div class="form-group col-4" >
        <input type="submit" class="btn btn-primary" value="agregar">
        
   <div  role="alert">
    @include('flash-message')
</div>
      </div>
      </form>
      <div class="form-group col-4">
      <form  action="{{url ('estudiantes/')}}">
        <input type="submit" class="btn btn-secondary" value="Volver" />
    </form>
    </div>
    <table class="table" >
        <thead class="thead-light">  
          <tr>
              <th scope="col">Id clase</th>
              <th>clase</th>
              <th></th>
          </tr>
        </thead>  
        <tbody>
            @foreach($datos as $clases)
            <tr>
            
                <td scope="row">{{ $clases->id}}</td>
                <td scope="row">{{ $clases->clase}}</td>                
  
                <div class="d-flex flex-row">
                <td scope="row"  style="text-align: center;">
                  <form method="post" action="{{ url('/clases/'.$clases->id) }} ">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button type="submit" class="btn btn-danger" onclick="return confirm('desea eliminar la clase?')">Borrar</button>
                  </form>
                </td>
              </div>
            </tr>
            @endforeach
        </tbody>
      </table>
</body>
</html>