<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;

class firebaseConnectionController extends Controller
{
    public function index(){
        $path = base_path('storage/firebase/firebase.json');

        if(!file_exists($path)) {
            die("This File Path .{$path}. is not Exists");
        }
        
        try {

            $factory = (new Factory)
        ->withServiceAccount($path)
        ->withDatabaseUri('https://aniproj-a722e-default-rtdb.firebaseio.com/');

            $database = $factory->createDatabase();
            $reference = $database->getReference('contacts');
            $reference->set(['connection' => true]);
            $snapShot = $reference->getSnapshot();
            $value = $snapShot->getValue();

            return response([
                'message' => true,
                'value' => $value
            ]);
            
        }catch(Exception $e) {
            return response([
                'message' => $e->getMessage(),
                'status' => 'False', 
            ]);
        }
    }
}
