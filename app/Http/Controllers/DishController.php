<?php

namespace App\Http\Controllers;

use App\Dish;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        $dishes = Dish::where('user_id', Auth::id())->orderBy('created_at','asc')->get();

        return view('admin.dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dishes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'cover' => 'url|image',
            'description' => 'string|nullable',
            'ingredients' => 'string|required',
            'price' => 'numeric',
            'cover' => 'file|mimes:jpg,jpeg,gif,png,svg|nullable',
            'visible' => 'boolean',
            'user_id' => 'numeric',
        ]);

        $data = $request->all();

        if(array_key_exists('cover', $data)) {
            $cover_path = Storage::put('uploads', $data['cover']);
            $data['cover'] = $cover_path;
        };

        $slug = Dish::getUniqueSlug($data['name']);

        $dish = new Dish();
        $dish->fill($data);
        $dish->slug = $slug;
        $dish->user_id = Auth::id();

        $dish->save();

        return redirect()->route('admin.dishes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        $user = Auth::user();
        return view('admin.dishes.edit', compact('dish','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'cover' => 'file|mimes:jpg,jpeg,gif,png,svg|nullable',
            'description' => 'string',
            'ingredients' => 'string',
            'price' => 'numeric',
            'visible' => 'boolean',
        ]);
        
        // dd($product);
        $data = $request->all();

        if( $dish->name != $data['name'] ){
            $slug = Dish::getUniqueSlug($data['name']);
            $data['slug'] = $slug;
        };

        if(array_key_exists('cover', $data)) {
            $cover_path = Storage::put('uploads', $data['cover']);
            $data['cover'] = $cover_path;
        };
        
        $dish->update($data);
        return redirect()->route('admin.dishes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();

        return redirect()->route('admin.dishes.index');
    }
}
