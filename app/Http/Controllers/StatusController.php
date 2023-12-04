<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStatusRequest;
use App\Http\Requests\UpdateStatusRequest;

class StatusController extends Controller
{
    public function index()
    {
        $statuses = Status::all();
        return response()->json(['message' => 'All Status Found', 'data' => $statuses]);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'status' => ['required', 'unique:status'],
                // Tambahkan validasi lain sesuai kebutuhan.
            ]);
    
            $status = new Status($request->all());
            $status->save();
    
            if ($status->id) {
                // Jika status berhasil dibuat dan memiliki ID, kembalikan pesan sukses.
                return response()->json(['message' => 'Status created', 'data' => $status]);
            } else {
                // Jika status tidak memiliki ID, kembalikan pesan gagal.
                return response()->json(['message' => 'Status creation failed'], 500);
            }
        } catch (\Exception $e) {
            // Tangkap pengecualian jika ada kesalahan saat membuat status.
            return response()->json(['message' => 'Status creation failed: ' . $e->getMessage()], 500);
        }
    }
    

    public function show($id)
    {
        $status = Status::find($id);
    
        if (!$status) {
            // Jika ID tidak ditemukan, kembalikan pesan kesalahan.
            return response()->json(['message' => 'Status not found'], 404);
        }
    
        // Jika ID ditemukan, kembalikan pesan sukses dan data status.
        return response()->json(['message' => 'Status found', 'data' => $status]);
    }
    

    public function update(Request $request, $id)
    {
        $status = Status::find($id);
    
        if (!$status) {
            // Jika ID tidak ditemukan, kembalikan pesan kesalahan.
            return response()->json(['message' => 'Status not found'], 404);
        }
    
        try {
            $validatedData = $request->validate([
                'status' => ['required'],
                // Tambahkan validasi lain sesuai kebutuhan.
            ]);
    
            $status->update($request->all());
    
            // Periksa apakah ada perubahan saat melakukan pembaruan
            if ($status->wasChanged()) {
                // Jika ada perubahan, kembalikan pesan sukses.
                return response()->json(['message' => 'Status edited', 'data' => $status]);
            } else {
                // Jika tidak ada perubahan, kembalikan pesan bahwa tidak ada perubahan yang dilakukan.
                return response()->json(['message' => 'No changes were made'], 200);
            }
        } catch (\Exception $e) {
            // Tangkap pengecualian jika ada kesalahan saat mengedit status.
            return response()->json(['message' => 'Status edit failed: ' . $e->getMessage()], 500);
        }
    }
    

   public function destroy($id)
{
    $status = Status::find($id);

    if (!$status) {
        // Jika ID tidak ditemukan, kembalikan pesan kesalahan.
        return response()->json(['message' => 'Status not found'], 404);
    }

    try {
        $status->delete();

        // Periksa apakah status masih ada setelah dihapus.
        $existingStatus = Status::find($id);

        if (!$existingStatus) {
            // Jika status telah dihapus, kembalikan pesan sukses.
            return response()->json(['message' => 'Status deleted']);
        } else {
            // Jika status masih ada setelah penghapusan, kembalikan pesan bahwa penghapusan gagal.
            return response()->json(['message' => 'Status deletion failed'], 500);
        }
    } catch (\Exception $e) {
        // Tangkap pengecualian jika ada kesalahan saat menghapus status.
        return response()->json(['message' => 'Status deletion failed: ' . $e->getMessage()], 500);
    }
}

}

