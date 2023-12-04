<?php

namespace App\Services;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;

class FirebaseService
{
    public static function connect()
    {
        $firebase = (new Factory)
            ->withServiceAccount(base_path(env(__DIR__ , '/configFirebase.json')))
            ->withDatabaseUri(env("https://deliverit-394707-default-rtdb.asia-southeast1.firebasedatabase.app/"));

        return $firebase->createDatabase();
    }
}
