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
            // 'photos.*' validation removed to allow mixed types (File or Base64 string)
        ]);

        $validated['ip'] = $request->ip();

        $problem = Problem::create($validated);

        if ($request->has('photos')) {
            foreach ($request->photos as $photo) {
                $path = null;

                // Case 1: Base64 String
                if (is_string($photo)) {
                    // Check if it's a valid Base64 image string
                    if (preg_match('/^data:image\/(\w+);base64,/', $photo, $type)) {
                        $data = substr($photo, strpos($photo, ',') + 1);
                        $type = strtolower($type[1]); // jpg, png, gif

                        if (!in_array($type, ['jpg', 'jpeg', 'gif', 'png', 'svg'])) {
                            continue; // Skip invalid types
                        }

                        $data = base64_decode($data);

                        if ($data === false) {
                            continue; // Skip invalid base64
                        }

                        $filename = \Illuminate\Support\Str::random(40) . '.' . $type;
                        $path = 'problems/' . $filename;
                        \Illuminate\Support\Facades\Storage::disk('public')->put($path, $data);
                    }
                }
                // Case 2: Multipart File (UploadedFile)
                elseif ($photo instanceof \Illuminate\Http\UploadedFile) {
                    if ($photo->isValid()) {
                        $path = $photo->store('problems', 'public');
                    }
                }

                // If a path was generated (upload successful), save to DB
                if ($path) {
                    $problem->photos()->create([
                        'archive' => $path,
                    ]);
                }
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
