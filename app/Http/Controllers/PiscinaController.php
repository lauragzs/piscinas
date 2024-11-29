<?php

namespace App\Http\Controllers;
use App\Models\Piscina;
use App\Models\Accesorio;
use App\Models\Filtro;
use App\Models\Detalle_filtro;
use App\Models\Detalle_accesorio;

use Illuminate\Support\Facades\DB;
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
        $accesorio = Accesorio::all()/*->select('accesorios.nombre as accesorio')->get()*/;
        $filtro = Filtro::all()/*->select('filtros.modelo as filtro','filtros.area as areaf',
            'filtros.velocidad as velocidadf')->get()*/;
        $item = Filtro::all();
        $piscinas = Piscina::all()/*DB::table('piscinas')
            ->select('piscinas.nombrep','piscinas.cliente','piscinas.pais','piscinas.telefono',
            'piscinas.tipo','piscinas.profundidad','piscinas.area','piscinas.perimetro', 'piscinas.volumen',
            'piscinas.tipologia','piscinas.caudal','piscinas.succion','piscinas.impulsion')->get()*/;
        return view('Piscinas.piscina',[
            'accesorio' => $accesorio,
            'filtro' => $filtro,
            'piscinas' => $piscinas,
            'item' => $item
        ]);
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
        DB:: beginTransaction();
        $piscina=new Piscina;
        $piscina->nombrep=$request->get('nombrep');
        $piscina->cliente=$request->get('cliente');
        $piscina->pais=$request->get('pais');
        $piscina->telefono=$request->get('telefono');
        $piscina->tipo=$request->get('tipo');
        $piscina->profundidad=$request->get('profundidad');
        $piscina->largo=$request->get('largo');
        $piscina->ancho=$request->get('ancho');
        $piscina->longitud=$request->get('longitud');
        $piscina->area=$request->get('area');
        $piscina->perimetro=$request->get('perimetro');
        $piscina->volumen=$request->get('volumen');
        $piscina->tipologia=$request->get('tipologia');
        $piscina->caudal=$request->get('caudal');
        $piscina->succion=$request->get('succion');
        $piscina->impulsion=$request->get('impulsion');
        //dd($request->all());

        //dd($piscina);
        $piscina->save();

        $accesorio_id=$request->get('accesorio_id');
        $cantidadac=$request->get('cantidadac');
        $cont2=0;
        while($cont2<count($accesorio_id)){
            $detallea=new Detalle_accesorio;
            $detallea->piscina_id=$piscina->id;
            $detallea->accesorio_id=$accesorio_id[$cont2];
            $detallea->cantidad=$cantidadac[$cont2];
        
            $detallea->save();
            $cont2=$cont2+1;
        }

        $filtro_id=$request->get('filtro_id');
        $cantidadf=$request->get('cantidadf');
        $cont=0;
        while($cont<count($filtro_id)){
            $detallef=new Detalle_filtro;
            $detallef->piscina_id=$piscina->id;
            $detallef->filtro_id=$filtro_id[$cont];
            $detallef->cantidad=$cantidadf[$cont];
        
            $detallef->save();
            $cont=$cont+1;
        }
        
        //dd($detallea);
        DB::commit();
        
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
