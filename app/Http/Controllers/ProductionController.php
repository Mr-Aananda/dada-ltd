<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductionRequest;
use App\Repositories\Production\ProductionRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductionExport;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

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
        // Initialize the query
        $query = $this->productionRepository->query();

        // Check for search inputs and filter the query accordingly
        if (request()->filled('buyer')) {
            $query->where('buyer', 'like', '%' . request()->input('buyer') . '%');
        }

        if (request()->filled('ps')) {
            $query->where('ps', 'like', '%' . request()->input('ps') . '%');
        }

        if (request()->filled('ps_date')) {
            $query->where('ps_date', request()->input('ps_date'));
        }

        if (request()->filled('style')) {
            $query->where('style', 'like', '%' . request()->input('style') . '%');
        }

        // Fetch the filtered productions with pagination
        $productions = $query->paginate(25);

        // Return the view with the filtered productions
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

        // Add the user_id from the authenticated user
        $data['user_id'] = Auth::id();

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
        // Fetch the existing production data
        $production = $this->productionRepository->find($id);

        // Fetch validated data
        $data = $request->validated();
        $data['user_id'] = Auth::id();

        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Store the new image and update the data
            $data['image'] = $request->file('image')->store('production_images', 'public');

            // Optionally, delete the old image if you want to clean up (ensure you handle this carefully)
            if ($production->image) {
                Storage::disk('public')->delete($production->image);
            }
        } else {
            // If no new image, retain the existing image in the data
            $data['image'] = $production->image;  // Keep the existing image
        }

        // Use repository to update the production data
        $this->productionRepository->update($id, $data);

        // Redirect with a success message
        return redirect()->route('production.index')->with('success', 'Production updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function exportExcel($id)
    {
        // Fetch the production record by ID
        $production = $this->productionRepository->find($id);

        // Pass the production instance to the export class
        return Excel::download(new ProductionExport($production), 'production_details.xlsx');
    }

    public function exportPdf($id)
    {
        $production = $this->productionRepository->find($id);
        $pdf = FacadePdf::loadView('production.pdf', compact('production'));

        return $pdf->download('production_details_' . $id . '.pdf');
    }

}
