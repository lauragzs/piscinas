<?php

namespace App\Http\Controllers;
use App\Models\Piscina;
use Illuminate\Http\Request;

class PiscinaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $piscinas=Piscina::all();
        return view('Piscinas.piscina', ['piscinas'=>$piscinas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

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
        $piscina= new Piscina($request->all());
        $piscina->save();
        //dd($piscina);
        return redirect()->action([PiscinaController::class, 'index']);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        //
        $piscina=Piscina::findorFail($id);
        return view('Piscinas.piscina_ver',['piscina'=>$piscina]);
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        //
        $piscina=Piscina::FindOrFail($id);
        $piscina->cliente=$request->cliente;
        $piscina->pais=$request->pais;
        $piscina->telefono=$request->telefono;
        $piscina->profundidad=$request->profundidad;
        $piscina->largo=$request->largo;
        $piscina->ancho=$request->ancho;
        $piscina->longitud=$request->longitud;

        $piscina->save();
        return back()->with("correcto", "Piscina modificada correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        //
        $piscina=Piscina::findOrFail($id);
        $piscina->delete();
        return redirect()->action([PiscinaController::class,'index']);
    }
}
