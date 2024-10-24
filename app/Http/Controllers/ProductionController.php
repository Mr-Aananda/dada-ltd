<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductionRequest;
use App\Models\Production;
use App\Repositories\Production\ProductionRepositoryInterface;
use Illuminate\Http\Request;

class ProductionController extends Controller
{
    protected $productionRepository;

    public function __construct(ProductionRepositoryInterface $productionRepository)
    {
        $this->productionRepository = $productionRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productions = $this->productionRepository->paginate(25);
        return view('production.index', compact('productions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('production.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductionRequest $request)
    {
        // Handle the image file upload
        $data = $request->validated(); // Fetch only validated data

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('production_images', 'public');
        }

        // Use repository to save production data into the database
        $this->productionRepository->create($data);

        // Redirect with a success message
        return redirect()->route('production.index')->with('success', 'Production created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $production = $this->productionRepository->find($id);
        return view('production.show', compact('production'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $production = $this->productionRepository->find($id);
        return view('production.edit', compact('production'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductionRequest $request, string $id)
    {
        // Fetch validated data
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('production_images', 'public');
        }

        // Use repository to update the production data
        $this->productionRepository->update($id, $data);

        // Redirect with a success message
        return redirect()->route('production.index')->with('success', 'Production updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Use repository to delete the production data
        $this->productionRepository->delete($id);

        // Redirect with a success message
        return redirect()->route('production.index')->with('success', 'Production deleted successfully.');
    }
}
