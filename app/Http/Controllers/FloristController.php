<?php

namespace App\Http\Controllers;

use App\Models\Florist;
use Illuminate\Http\Request;

class FloristController extends Controller
{
    public function index()
    {
        $florists = Florist::all();
        return view('florists.index', compact('florists'));
    }

    public function create()
    {
        return view('florists.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required',
            'email'   => 'required|email|unique:florists,email',
            'phone'   => 'nullable',
            'address' => 'nullable',
        ]);

        Florist::create($validated);

        return redirect()->route('florists.index')
                         ->with('success', 'Florist created successfully.');
    }

    public function show(Florist $florist)
    {
        return view('florists.show', compact('florist'));
    }

    public function edit(Florist $florist)
    {
        return view('florists.edit', compact('florist'));
    }

    public function update(Request $request, Florist $florist)
    {
        $validated = $request->validate([
            'name'    => 'required',
            'email'   => 'required|email|unique:florists,email,'.$florist->id,
            'phone'   => 'nullable',
            'address' => 'nullable',
        ]);

        $florist->update($validated);

        return redirect()->route('florists.index')
                         ->with('success', 'Florist updated successfully.');
    }

    public function destroy(Florist $florist)
    {
        $florist->delete();
        return redirect()->route('florists.index')
                         ->with('success', 'Florist deleted successfully.');
    }
}
