<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatabaseController extends Controller
{
    public function index()
    {
        // Get all table names from the database
        $tables = DB::select('SHOW TABLES');

        // Extract table names into an array
        $tableNames = array_map(function ($table) {
            return $table->{"Tables_in_" . env('DB_DATABASE')}; // Assuming you're using MySQL
        }, $tables);

        // Pass the table names to the view
        return view('welcome', ['tables' => $tableNames]);
    }
}
