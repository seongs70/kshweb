<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Controllers\classes\Database;

class DatabaseController extends Database{
    public function index(Request $request){
            $database = new Database('Board', 'BoardNumber');
            //$database->insert($request);
            // $database->update($request);
            $database->save($request);
            //return print($database->findById(11));
            //return $database->findAll();
    }
}
