<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;


class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['empleados']=Empleado::paginate(5);
        //En esta linea el arreglo empleados tendra hasta 5
        //paginas de informacio usando el modelo Empleado 

        return view('empleado.index',$datos);
        //En esta linea nos regresa la vista index
        //pero al poner la variable $datos 
        //se envia toda la iformacion de arreglo a
        //la vista index

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //En este comando proximo se solicita guardar toda la informacion en la variable $datosEmpleados
        //$datosEmpleado = request()->all();
        //----------------------------------
        //En esta siguiente linea se solicita toda la informacion enviada a exsepcion de el dato token
        $datosEmpleado = request()->except('_token');
        if($request->hasFile('Foto')){
            $datosEmpleado['Foto']=$request->file('Foto')->store('uploads','public');
        }
        Empleado::insert($datosEmpleado);
        return response()->json($datosEmpleado);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)    
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado=Empleado::findOrFail($id);
        return view('empleado.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosEmpleado = request()->except(['_token', '_method']);
        //En esta parte se recuperan los datos que se envian de la pagina
        //a excepcion de del token y el metodo PATH 
        //para posteriormente ser actualizados en la base de datos
        Empleado::where('id','=',$id)->update($datosEmpleado);
        //El modelo Empleado solicita el registro que tenga la siguiente id
        //despues de eso se hace un update o actualizacon del registro
        $empleado=Empleado::findOrFail($id);
        return view('empleado.edit', compact('empleado'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Empleado::destroy($id);
        return redirect('empleado');
    }
}
