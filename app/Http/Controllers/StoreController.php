<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
	public function dashboard()
	{
		$storeCount = Store::count();
		$stores = Store::all();
		return view('dashboard', compact('storeCount', 'stores'));
	}
    
	public function index()
    {
        $stores = Store::all();
        return view('stores.index', compact('stores'));
    }

    public function create()
    {
        return view('stores.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'store_name' => 'required',
            'store_address' => 'required',
            'store_city' => 'required',
            'store_state' => 'required',
            'store_zip' => 'required',
            'store_longitude' => 'nullable|numeric',
            'store_latitude' => 'nullable|numeric',
        ]);

        Store::create($validatedData);

        return redirect()->route('stores.index')->with('success', 'Store created successfully.');
    }

    public function show(Store $store)
    {
		$store->load('reports');
        return view('stores.show', compact('store'));
    }

    public function edit(Store $store)
    {
        return view('stores.edit', compact('store'));
    }

    public function update(Request $request, Store $store)
    {
        $validatedData = $request->validate([
            'store_name' => 'required',
            'store_address' => 'required',
            'store_city' => 'required',
            'store_state' => 'required',
            'store_zip' => 'required',
            'store_longitude' => 'nullable|numeric',
            'store_latitude' => 'nullable|numeric',
        ]);

        $store->update($validatedData);

        return redirect()->route('stores.index')->with('success', 'Store updated successfully.');
    }

    public function destroy(Store $store)
    {
        $store->delete();

        return redirect()->route('stores.index')->with('success', 'Store deleted successfully.');
    }
	
	public function reports(Store $store)
	{
		$reports = $store->reports;
		return view('reports.index', compact('store', 'reports'));
	}

}