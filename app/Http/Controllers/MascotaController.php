<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mascota;
class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mascotas=mascota::orderBy('id','DESC')->paginate(3);
        return view('mascota.index',compact('mascotas')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Mascota.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[ 'nombre'=>'required', 'edad'=>'required', 'especie'=>'required', 'clasificacion'=>'required', 'peso'=>'required', 'paisorigen'=>'required']);
        Mascota::create($request->all());
        return redirect()->route('mascota.index')->with('exito','La mascota fue registrada !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mascota=Mascota::find($id);
        return view('mascota.show',compact('mascota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 
        $mascota=Mascota::find($id);
        return view('mascota.edit',compact('mascota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[ 'nombre'=>'required', 'edad'=>'required', 'especie'=>'required', 'clasificacion'=>'required', 'peso'=>'required', 'paisorigen'=>'required']);
 
        Mascota::find($id)->update($request->all());
        return redirect()->route('mascota.index')->with('success','Registro actualizado satisfactoriamente');
 
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Mascota::find($id)->delete();
        return redirect()->route('mascota.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
