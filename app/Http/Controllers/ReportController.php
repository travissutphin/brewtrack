<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Store $store)
    {
        $reports = $store->reports;
        return view('reports.index', compact('store', 'reports'));
    }

    public function create(Store $store)
    {
        return view('reports.create', compact('store'));
    }

    public function store(Request $request, Store $store)
    {
        $validatedData = $request->validate([
            'sku' => 'required|string',
            'name' => 'required|string',
            'shelf_position' => 'required|string',
            'facing' => 'required|integer',
            'stock_level' => 'required|integer',
            'out_of_stock' => 'nullable|boolean',
            'price_accuracy' => 'nullable|boolean',
            'user_id' => 'required|exists:users,id',
        ]);

        $store->reports()->create($validatedData);

        return redirect()->route('stores.reports.index', $store)->with('success', 'Report created successfully.');
    }

    public function show(Store $store, Report $report)
    {
        return view('reports.show', compact('store', 'report'));
    }

    public function edit(Store $store, Report $report)
    {
        return view('reports.edit', compact('store', 'report'));
    }

    public function update(Request $request, Store $store, Report $report)
    {
        $validatedData = $request->validate([
            'sku' => 'required|string',
            'name' => 'required|string',
            'shelf_position' => 'required|string',
            'facing' => 'required|integer',
            'stock_level' => 'required|integer',
            'out_of_stock' => 'nullable|boolean',
            'price_accuracy' => 'nullable|boolean',
            'user_id' => 'required|exists:users,id',
        ]);

        $report->update($validatedData);

        return redirect()->route('stores.reports.index', $store)->with('success', 'Report updated successfully.');
    }

	public function checkIn(Store $store, Report $report)
	{
		$report->status = 'pending';
		$report->check_in = now();
		$report->save();

		return redirect()->route('stores.reports.show', [$store, $report])->with('success', 'Report checked in successfully.');
	}

    public function destroy(Store $store, Report $report)
    {
        $report->delete();

        return redirect()->route('stores.reports.index', $store)->with('success', 'Report deleted successfully.');
    }
}