<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;

class CouriersController extends Controller
{
    /**
     * Display a listing of the resource. 
     */
    public function Couriers()
    {
        $database = Firebase::database();
        $reference = $database->getReference('drivers');
    
        $snapshot = $reference->getSnapshot();
        $data = $snapshot->getValue();
        $total = count($data);
        return view('Couriers.index', [
            'title' => "Couriers",
            'userDrivers' => $data,
            'totalDrivers' => $total
        ]);
    }



    
    public function Edit()
    {
        return view('Couriers.edit', [
            'title' => "Courier Edit"
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    
    public function delete($driversId)
    {
        // Path ke data pengguna yang akan dihapus
        $path = 'drivers/' . $driversId;
    
        try {
            // Hapus data dari Firebase Realtime Database
            Firebase::database()->getReference($path)->remove();
    
            return redirect()->back()->with('success', 'Pengguna berhasil dihapus.');
        } catch (\Kreait\Firebase\Exception\FirebaseException $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }


    public function History()
    {
        return view('Couriers.History.index', [
            'title' => "History Delivery"
        ]);
    }
    
    public function Delivery()
    {
        return view('Couriers.History.edit', [
            'title' => "Edit Delivery History"
        ]);
    }
}
