<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Report;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReportController extends Controller
{
	public function index(Store $store)
	{
		$reports = $store->reports()
						 ->latest()  // This will order by created_at desc
						 ->paginate(15);  // Adjust the number as needed
		return view('reports.index', compact('store', 'reports'));
	}

    public function create(Store $store)
    {
        return view('reports.create', compact('store'));
    }

    public function store(Request $request, Store $store)
    {
		$validatedData = $request->validate([
			'notes_manager' => 'nullable|string',
			'shelf_position' => 'required|string',
			'facing' => 'required|string',
			'stock_level' => 'required|string',
			'out_of_stock' => 'nullable|string',
			'price_accuracy' => 'nullable|string',
			'status' => 'required|in:open,pending,closed',
			'check_in' => 'nullable|date',
			'check_out' => 'nullable|date|after:check_in',
		]);

		// Convert check_in time to UTC
		if ($request->has('check_in')) {
			$validatedData['check_in'] = Carbon::parse($request->check_in)->utc();
		} else {
			$validatedData['check_in'] = Carbon::now()->utc();
		}

		// Convert check_out time to UTC if provided
        if ($request->has('check_out')) {
            $validatedData['check_out'] = Carbon::parse($request->check_out)->utc();
        }
		
		$validatedData['user_id'] = auth()->id();
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
			'notes_manager' => 'nullable|string',
			'shelf_position' => 'required|string',
			'facing' => 'required|string',
			'stock_level' => 'required|string',
			'out_of_stock' => 'nullable|string',
			'price_accuracy' => 'nullable|string',
			'status' => 'required|in:open,pending,closed',
			'check_in' => 'nullable|date',
			'check_out' => 'nullable|date|after:check_in',
		]);

		// Convert check_in time to UTC
		if ($request->has('check_in')) {
			$validatedData['check_in'] = Carbon::parse($request->check_in)->utc();
		} else {
			$validatedData['check_in'] = Carbon::now()->utc();
		}

		// Convert check_out time to UTC if provided
        if ($request->has('check_out')) {
            $validatedData['check_out'] = Carbon::parse($request->check_out)->utc();
        }
		
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