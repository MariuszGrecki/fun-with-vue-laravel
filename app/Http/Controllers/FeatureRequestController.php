<?php

namespace App\Http\Controllers;

use App\Enums\FeatureRequestStatus;
use App\Http\Requests\StoreFeatureRequest;
use App\Http\Resources\FeatureRequestResource;
use Illuminate\Http\Request;
use App\Models\Product;

class FeatureRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product, Request $request)
    {
        $query = $product->featureRequests()
            ->leftJoin('users', 'users.id', '=', 'feature_requests.author_id')
            ->select('feature_requests.*')
            ->with('tags');

        $query->when($request->query('status'), function ($query, $status) {
            $enum = FeatureRequestStatus::tryFrom($status);

            if ($enum !== null) {
                 $query->where('status', $status);
            }
        });

        $query->when($request->query('search'), function ($query, $search) {
            $query->where(fn ($q) => $q->where('title', 'ILIKE', "%{$search}%")->orWhere('description', 'ILIKE', "%{$search}%"));
        });

        $query->when($request->query('tag_id'), function ($query, $tagId) {
            $query->whereHas('tags', fn ($q) => $q->where('tags.id', $tagId));
        });

        $sortMap = [
            'title' => 'feature_requests.title',
            'created_at'=> 'feature_requests.created_at',
            'author' => 'users.name',
        ];

        $sort = $request->query('sort', 'created_at');
        $direction = str_starts_with($sort, '-') ? 'desc' : 'asc';
        $column = ltrim($sort, '-');

        if (isset($sortMap[$column])) {
            $query->orderBy($sortMap[$column], $direction);
        }

        return FeatureRequestResource::collection($query->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFeatureRequest $request, Product $product)
    {
        $featureRequest = $product->featureRequests()->create($request->validated());
        $featureRequest->tags()->sync($request->validated('tag_ids', []));

        $featureRequest->load('tags');
        return FeatureRequestResource::make($featureRequest)->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
