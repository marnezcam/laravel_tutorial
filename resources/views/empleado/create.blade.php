Formulario de creacion de empleado.
<body>
    

<form action="{{url('empleado')}}" method="post" enctype="multipart/form-data">
    @csrf
    @include('empleado.form',['modo'=>'Crear'])
</form>
</body>