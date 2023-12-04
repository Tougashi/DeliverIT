<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Factory;
use Kreait\Laravel\Firebase\Facades\Firebase;


class FirebaseController extends Controller
{
    
    public function users()
    {  
        $database = Firebase::database();
        $reference = $database->getReference('users');
    
        $snapshot = $reference->getSnapshot();
        $data = $snapshot->getValue();
    
        // Mengembalikan data dalam respons HTTP
        return response()->json($data);
    
    }
    public function drivers()
    {  
        $database = Firebase::database();
        $reference = $database->getReference('drivers');
    
        $snapshot = $reference->getSnapshot();
        $data = $snapshot->getValue();
    
        // Mengembalikan data dalam respons HTTP
        return response()->json($data);
    
    }
    public function availableDrivers()
    {  
        $database = Firebase::database();
        $reference = $database->getReference('availableDrivers');
    
        $snapshot = $reference->getSnapshot();
        $data = $snapshot->getValue();
    
        // Mengembalikan data dalam respons HTTP
        return response()->json($data);
    
    }
    public function rideRequests()
    {  
        $database = Firebase::database();
        $reference = $database->getReference('rideRequests');
    
        $snapshot = $reference->getSnapshot();
        $data = $snapshot->getValue();
    
        // Mengembalikan data dalam respons HTTP
        return response()->json($data);
    
    }

}
