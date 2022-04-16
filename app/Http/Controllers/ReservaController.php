<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reserva;
use App\Models\Solicitud;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $reservas = Reservas::orderBy('id', 'desc')->get();
        // return view('admin.reservas.index', compact('reservas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.reservas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'nombre_docente' => 'required',
        // ]);
        // Reservas::create($request->all());

        // $reserva = new Reserva();
        // $reserva->nombre_docente =$request->nombre_docente;
        

   
        // return redirect()->route('reservas.index')
        //                 ->with('success','Reservas se ah creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservas  $reservas
     * @return \Illuminate\Http\Response
     */
    public function show(Reserva $reserva)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservas  $reservas
     * @return \Illuminate\Http\Response
     */
    public function edit(Reserva $reserva)
    {
        // //
        // $reservas = Reservas::find($reservas);

        // return view('reservas.edit')->with('reservas', $reservas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reserva $reserva)
    {
        //
        // $reservas = Reserva::find($reservas);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reserva $reserva)
    {
        // $reserva->delete();
  
        // return redirect()->route('reservas.index');
    }
}
