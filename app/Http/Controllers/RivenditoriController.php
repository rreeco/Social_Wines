<?php

//AGGIORNATO IL DI'  11/05/2024, mancano view!!!

//i parametri nella funzione "validate()" (in questo caso macchina e ricambi) 
//sono i campi da cui è composta la tabella

namespace App\Http\Controllers;

use App\Models\Rivenditori;
use Illuminate\Http\Request;

class RivenditoriController extends Controller      //questa classe diventa la classe UTENTI

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rivenditori = Rivenditori::all();
        return view('rivenditori.index', compact('rivenditori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rivenditori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate ([
            'macchina' => 'required|max:255',
            'ricambi'  => 'required',
        ]);

        Rivenditori::create($request->all());

        return redirect()->route('rivenditori.index')
                         ->with ('success', 'Rivenditore inserito correttamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rivenditori $rivenditori)
    {
        $rivenditori = Rivenditori::findOrFail($id);
        return view('rivenditori.show', compact('rivenditori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rivenditori $rivenditori)
    {
        $rivenditori = Rivenditori::findOrFail($id);
        return view('rivenditori.edit', compact('rivenditori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rivenditori $rivenditori)
    {
        $request->validate([
            'macchina' => 'required!max:255',
            'ricambi'  => 'required',
        ]);

        $rivenditori = Rivenditori::findOrFail($id);
        $rivenditori -> update($request->all());

        return redirect()->route('rivenditori.index')
                         ->with ('success', 'Rivenditore aggiornato con successo.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rivenditori $rivenditori)
    {
        $rivenditori = Rivenditori::findOrFail($id);
        $rivenditori -> delete();

        return redirect()->route('rivenditori.index')
                         ->with( 'success', 'Rivenditore eliminato con successo.');
    }
}
