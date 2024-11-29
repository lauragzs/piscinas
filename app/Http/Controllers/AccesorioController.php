<?php

namespace App\Http\Controllers;
use App\Models\Accesorio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccesorioController extends Controller
{
    //
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
        $accesorios=Accesorio::all();    
        return view('Accesorio.accesorio',['accesorios'=>$accesorios]);
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
        $accesorios = new Accesorio($request->except('foto'));

        if ($request->hasFile('foto')) {
            $fotoFile = $request->file('foto');
            $path = 'assets/img/';
            $filename = date('YmdHis') . "." . $fotoFile->getClientOriginalExtension();
            $fotoFile->move(public_path($path), $filename);

            $accesorios->foto = $path . $filename;
        }

        $accesorios->save();
        return redirect()->action([AccesorioController::class, 'index']);
        /*
        $accesorios= new Accesorio($request->all());
        $accesorios->save();
        //dd($accesorios);
        return redirect()->action([AccesorioController::class, 'index']);*/
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
    }
}
