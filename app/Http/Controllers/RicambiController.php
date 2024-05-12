<?php

namespace App\Http\Controllers;

use App\Models\Ricambi;
use Illuminate\Http\Request;

class RicambiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ricambi = Ricambi::all();
        return view('ricambi.index', compact('ricambi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ricambi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate ([
            'matricola' => 'required',
            'componente' => 'required',
            'prezzo' => 'required',
            'rivenditori' => 'required',
            'macchina' => 'required',
        ]);

        Ricambi::create($request->all());

        return redirect () -> route('ricambi.index')
                           -> with('success', 'Ricambio inserito correttamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ricambi $ricambi)
    {
        $ricambi = Ricambi::findOrFail($id);
        return view('ricambi.show', compact('ricambi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ricambi $ricambi)
    {
        $ricambi = Ricambi::findOrFail($id);
        return view('ricambi.edit', compact('ricambi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ricambi $ricambi)
    {
        $request -> validate([
            'matricola' => 'required',
            'componente' => 'required',
            'prezzo' => 'required',
            'rivenditori' => 'required',
            'macchina' => 'required',
        ]);

        $ricambi = Ricambi::findOrFail($id);
        $ricambi -> update($request->all());

        return redirect() -> route('ricambi.index')
                          -> with ('success', 'Ricambio aggiornato con successo.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ricambi $ricambi)
    {
        $ricambi = Ricambi::findOrFail($id);
        $ricambi->delete();

        return redirect() -> route('ricambi.index')
                          -> with ('success', 'Ricambio eliminato con successo.');
    }
}
