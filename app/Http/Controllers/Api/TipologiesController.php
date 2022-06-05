<?php

namespace App\Http\Controllers\Api;

use App\Tipology;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TipologiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipologies = Tipology::with('users')->orderBy('name', 'asc')->get()->all();

        return response()->json([
            'tipologies' => $tipologies,
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $tipology = Tipology::with('users')->where('slug', $slug)->first();

        if ($tipology) {
            // Nel caso trovera il post c'è la mostrerà
            return response()->json([
                'tipology' => $tipology,
                'success' => true
            ]);
        } else {
            // Nel caso non lo troverà il post ci mostrerà la pagina 404 di errore
            return response()->json([
                'tipology' => 'post non trovato',
                'success' => false
            ], 404);
        }
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
    public function update(Request $request, $id)
    {
        //
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
    }
}
