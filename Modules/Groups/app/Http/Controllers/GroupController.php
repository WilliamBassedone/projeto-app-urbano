<?php

namespace Modules\Groups\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Support\Cacheable;
use Illuminate\Http\JsonResponse;
use Modules\Groups\Models\Group;
use Modules\Groups\Http\Requests\StoreGroupRequest;
use Modules\Groups\Http\Requests\UpdateGroupRequest;

class GroupController extends Controller
{

    use Cacheable;

    private const NS  = 'groups';
    private const TTL = 60; // segundos
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $key  = $this->versionedKey(self::NS, 'index:' . request('page', 1));
        $data = $this->remember($key, self::TTL, fn() => Group::orderByDesc('id')->paginate(15));
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGroupRequest $request): JsonResponse
    {
        $group = Group::create($request->validated());
        $this->bump(self::NS); // invalida listagens/detalhes
        return response()->json($group, 201);
    }

    /**
     * Show the specified resource.
     */
    public function show(Group $group): JsonResponse
    {
        $key  = $this->versionedKey(self::NS, "show:{$group->id}");
        $data = $this->remember($key, self::TTL, fn() => $group->refresh());
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGroupRequest $request, Group $group): JsonResponse
    {
        $group->update($request->validated());
        $this->bump(self::NS);
        return response()->json($group);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group): JsonResponse
    {
        $group->delete();
        $this->bump(self::NS);
        return response()->json([], 204);
    }
}
