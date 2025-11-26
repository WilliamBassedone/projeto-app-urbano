<?php

namespace Modules\Problems\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Problems\Models\Problem;

class ProblemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $problems = Problem::with('photos')->get();

        $problems->transform(function ($problem) {
            $problem->photos->transform(function ($photo) {
                $photo->url = asset('storage/' . $photo->archive);
                return $photo;
            });
            return $problem;
        });

        return response()->json($problems);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('problems::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'id_categorie' => 'required|exists:problems_categories,id',
            'geolocation' => 'nullable|string',
            'photos' => 'nullable|array',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $validated['ip'] = $request->ip();

        $problem = Problem::create($validated);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('problems', 'public');
                $problem->photos()->create([
                    'archive' => $path,
                ]);
            }
        }

        $problem->load('photos');
        $problem->photos->transform(function ($photo) {
            $photo->url = asset('storage/' . $photo->archive);
            return $photo;
        });

        return response()->json($problem, 201);
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $problem = Problem::with('photos')->findOrFail($id);

        $problem->photos->transform(function ($photo) {
            $photo->url = asset('storage/' . $photo->archive);
            return $photo;
        });

        return response()->json($problem);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('problems::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {}
}
