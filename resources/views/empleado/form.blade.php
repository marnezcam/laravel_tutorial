
    <label for="Nombre">Nombre</label>
    <input type="text" name="Nombre" value="{{ $empleado->Nombre }}" id="Nombre">

    <label for="ApellidoPaterno">Apellido Paterno</label>
    <input type="text" name="ApellidoPaterno" value="{{ $empleado->ApellidoPaterno }}" id="ApellidoPaterno">

    <label for="ApellidoMaterno">Apellido Materno</label>
    <input type="text" name="ApellidoMaterno" value="{{ $empleado->ApellidoMaterno }}" id="ApellidoMaterno">

    <label for="Correo">Correo</label>
    <input type="text" name="Correo" value="{{ $empleado->Correo }}" id="Correo">

    <label for="Foto">Foto</label>
    <img src="{{ asset('storage').'/'.$empleado->Foto }}" height="80" alt="">
    {{ $empleado->Foto }}
    <input type="file" name="Foto" value="" id="Foto">

    <input type="Submit"  value="Guardar">