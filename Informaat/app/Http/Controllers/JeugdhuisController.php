<?php

namespace App\Http\Controllers;

use App\Jeugdhuis;
use Illuminate\Http\Request;

class JeugdhuisController extends Controller
{
    public function __construct() 
    {
        $this->middleware('isAdmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jeugdhuizen = Jeugdhuis::all();

        return view('jeugdhuis.index', compact('jeugdhuizen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jeugdhuis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate(request(), [
            'name' => 'required|min:2|max:255',
            'village' => 'required|min:2|max:255',
            'zipcode' => 'required|min:1|max:255',
            
        ]);

        Jeugdhuis::create([
            'name' => request('name'),

            'village' => request('village'),

            'zipcode' => request('zipcode'),

            'points' => 0,
            
        ]);

        // redirect to homepage
        session()->flash('message', 'Jeugdhuis toegevoegd');

        return redirect('/jeugdhuizen');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jeugdhuis  $jeugdhuis
     * @return \Illuminate\Http\Response
     */
    public function show(Jeugdhuis $jeugdhuis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jeugdhuis  $jeugdhuis
     * @return \Illuminate\Http\Response
     */
    public function edit(Jeugdhuis $jeugdhuis)
    {
        return view('jeugdhuis.edit', compact('jeugdhuis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jeugdhuis  $jeugdhuis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jeugdhuis $jeugdhuis)
    {
        $this->validate(request(), [
            'name' => 'required|min:2',
            'village' => 'required',
            'zipcode' => 'required',
            
        ]);
        
        $jeugdhuis->update($request->all());
        
        session()->flash('message', 'Jeugdhuis aangepast');
        return redirect('jeugdhuizen/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jeugdhuis  $jeugdhuis
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, Jeugdhuis $jeugdhuis)
    {
        $jeugdhuis->delete($request->all());
        
        session()->flash('message', 'Jeugdhuis verwijderen');

        return redirect('/jeugdhuizen');
    }
}
