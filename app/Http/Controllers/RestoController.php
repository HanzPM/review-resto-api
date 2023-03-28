<?php

namespace App\Http\Controllers;

use App\Models\Resto;
use App\Http\Requests\StoreRestoRequest;
use App\Http\Requests\UpdateRestoRequest;

class RestoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Resto::all();            
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRestoRequest $request)
    {
        return Resto::create([
            ...$request->validated(),
            'user_id' => $request->user()->id
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Resto $resto)
    {
        return $resto;
    }

    public function update(UpdateRestoRequest $request, Resto $resto)
    {
        $resto->update($request->validated());

        return $resto->refresh();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resto $resto)
    {
        $resto->delete();

        return $resto;
    }

    public function reviews(Resto $resto) 
    {
        return $resto->reviews->load('user');
    }
}

