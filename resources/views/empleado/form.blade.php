    <h1>{{$modo}} empleado</h1>
    @if(count($errors)>0)
        <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
            <li>
                {{$error}}
            </li>
            @endforeach
    </ul>
    </div>
    @endif
    <label for="Nombre">Nombre</label>
    <input type="text" class="form-control" name="Nombre" 
    value="{{isset($empleado->Nombre)?$empleado->Nombre:old('Nombre') }}" id="Nombre">

    <label for="ApellidoPaterno">Apellido Paterno</label>
    <input type="text" class="form-control" name="ApellidoPaterno" 
    value="{{ isset($empleado->ApellidoPaterno)?$empleado->ApellidoPaterno:old('ApellidoPaterno')}}" id="ApellidoPaterno">

    <label for="ApellidoMaterno">Apellido Materno</label>
    <input type="text" class="form-control" name="ApellidoMaterno" 
    value="{{ isset($empleado->ApellidoMaterno)?$empleado->ApellidoMaterno:old('ApellidoMaterno') }}" id="ApellidoMaterno">

    <label for="Correo">Correo</label>
    <input type="text" class="form-control" name="Correo" value="{{ isset($empleado->Correo)?$empleado->Correo:old('Correo') }}" id="Correo">
        <label for="Foto">Foto</label>
        @if(isset($empleado->Foto))
         <img src="{{ asset('storage').'/'.$empleado->Foto }}" height="80" alt="">
        @endif
    <input type="file" name="Foto" value="" id="Foto">

    <input type="Submit"  value="{{$modo}}">
    <a href="{{url('empleado/')}}">Regresar</a>