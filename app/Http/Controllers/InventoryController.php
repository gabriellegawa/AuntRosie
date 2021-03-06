<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Recipes;

class InventoryController extends Controller
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
    public function index(Inventory $inventories)
    {
        $inventories = $inventories::where('quantity', '>', '0')->get();
        return view('inventories.index',compact('inventories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recipes = Recipes::all();
        return view('inventories.create', compact('recipes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'recipes_id' => 'required|numeric|min:0|not_in:0',
            'price' => 'required|numeric|min:0|not_in:0|regex:/^\d*(\.\d{2})?$/',
            'production_date' => 'required|Date',
            'quantity' => 'required|numeric|min:0|not_in:0'
        ]);

        $inventory =  new Inventory(request(['recipes_id','price','production_date','quantity']));
        $inventory->save();

        return redirect()->action([InventoryController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inventory = Inventory::find($id);
        
        return view('inventories.show', compact(['inventory']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventory = Inventory::find($id);
        
        return view('inventories.edit', compact(['inventory']));
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
        $inventory = Inventory::find($id);

        $validatedData = $request->validate([
            'price' => 'required|numeric|min:0|not_in:0|regex:/^\d*(\.\d{2})?$/',
            'production_date' => 'required|Date',
            'quantity' => 'required|numeric|min:0|not_in:0'
        ]);

        $inventory->price = $request->input('price');
        $inventory->production_date = $request->input('production_date');
        $inventory->quantity = $request->input('quantity');

        $inventory->save();

        return redirect()->action([InventoryController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventory = Inventory::find($id);
        $inventory->delete();

        return redirect()->action([InventoryController::class, 'index']);
    }
}
