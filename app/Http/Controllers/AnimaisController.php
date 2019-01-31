<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animal;
use App\Http\Resources\AnimaisResource;

class AnimaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $animal = new Animal;

        $animal->nome = $request->nome;
        $animal->raca = $request->raca;
        $animal->idade = $request->idade;
        $animal->save();
        return new AnimalResource($animal);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $animal = Animal::findOrFail($id);
        return response()->json([$animal]);
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
        $animal = Animal::findOrFail($id);

        if($request->nome)
          $animal->nome = $request->nome;
        if($request->raca)
          $animal->raca = $request->raca;
        if($request->idade)
          $animal->idade = $request->idade;
        $animal->save();
        return response()->json([$id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Animal::destroy($id);
        return response()->json(['DELETADO']);
    }
    public function list(){
        return Animal::all();

    }
}
