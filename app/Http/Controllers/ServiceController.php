<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function Service()
    {
        return view('Service.index', [
            'title' => "Service"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function Create()
    {
        return view('Service.add', [
            'title' => "Add Service"
        ]);
    }
    public function index()
    {
        $services = Service::all();
        return response()->json(['message' => 'All Services found', 'data' => $services]);
    }

    public function show($id)
    {
        $service = Service::find($id);

        if (!$service) {
            return response()->json(['message' => 'Service not found'], 404);
        }

        return response()->json(['message' => 'Service found', 'data' => $service]);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'vehicle' => ['required'],
                'weight' => ['required'],
                'size' => ['required']
            ]);

            $service = new Service($request->all());
            $service->save();

            if ($service->id) {
                return response()->json(['message' => 'Service created', 'data' => $service]);
            } else {
                return response()->json(['message' => 'Service creation failed'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Service creation failed: ' . $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $service = Service::find($id);

        if (!$service) {
            return response()->json(['message' => 'Service not found'], 404);
        }

        try {
            $validatedData = $request->validate([
                'vehicle' => ['required'],
                'weight' => ['required'],
                'size' => ['required']
            ]);

            $service->update($request->all());

            if ($service->wasChanged()) {
                return response()->json(['message' => 'Service edited', 'data' => $service]);
            } else {
                return response()->json(['message' => 'No changes were made'], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Service edit failed: ' . $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        $service = Service::find($id);

        if (!$service) {
            return response()->json(['message' => 'Service not found'], 404);
        }

        try {
            $service->delete();

            $existingService = Service::find($id);

            if (!$existingService) {
                return response()->json(['message' => 'Service deleted']);
            } else {
                return response()->json(['message' => 'Service deletion failed'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Service deletion failed: ' . $e->getMessage()], 500);
        }
    }
}
