<?php

namespace App\Http\Controllers;

use App\Models\Bouquet;
use App\Models\Florist;
use Illuminate\Http\Request;

class BouquetController extends Controller
{
    public function index()
    {
        $bouquets = Bouquet::all();
        return view('bouquets.index', compact('bouquets'));
    }

    public function create()
    {
        // Get all florists to select from when creating a bouquet
        $florists = Florist::all();
        return view('bouquets.create', compact('florists'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required',
            'price'      => 'required|numeric',
            'description'=> 'nullable',
            'florist_id' => 'nullable|exists:florists,id',
        ]);

        Bouquet::create($validated);

        return redirect()->route('bouquets.index')
                         ->with('success', 'Bouquet created successfully.');
    }

    public function show(Bouquet $bouquet)
    {
        return view('bouquets.show', compact('bouquet'));
    }

    public function edit(Bouquet $bouquet)
    {
        $florists = Florist::all();
        return view('bouquets.edit', compact('bouquet', 'florists'));
    }

    public function update(Request $request, Bouquet $bouquet)
    {
        $validated = $request->validate([
            'name'       => 'required',
            'price'      => 'required|numeric',
            'description'=> 'nullable',
            'florist_id' => 'nullable|exists:florists,id',
        ]);

        $bouquet->update($validated);

        return redirect()->route('bouquets.index')
                         ->with('success', 'Bouquet updated successfully.');
    }

    public function destroy(Bouquet $bouquet)
    {
        $bouquet->delete();
        return redirect()->route('bouquets.index')
                         ->with('success', 'Bouquet deleted successfully.');
    }
}
