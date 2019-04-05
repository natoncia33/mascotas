<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mascota;
use DB;
class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ELOQUENT
        // $mascotas=mascota::orderBy('id','DESC')->paginate(3);
        // return view('mascota.index',compact('mascotas')); 

        //QUERYBUILDER
        $mascotas = DB::table('mascotas')->paginate(3);;

        foreach ($mascotas as $mascota)
        {
            //echo $mascota->nombre;
        }
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
        $v = \Validator::make($request->all(), [
            
            'nombre' => 'required',
            'edad' => 'numeric|required|min:1|max:99',
            'especie'    => 'required',
            'clasificacion' => 'required',
            'peso' => 'numeric|required|min:1|max:9999',
            'paisorigen' => 'required'

        ]);
 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        //ELOQUENT
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
        //ELOQUENT
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
        //ELOQUENT
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
        //ELOQUENT
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
        //ELOQUENT
        Mascota::find($id)->delete();
        return redirect()->route('mascota.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
