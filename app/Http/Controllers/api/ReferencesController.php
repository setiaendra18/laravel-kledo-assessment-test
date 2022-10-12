<?php
namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Models\References;
use Illuminate\Http\Request;

class ReferencesController extends Controller
{
    public function index()
    {
        $references= References::all();
        return response()->json($references, http_response_code(200));
    }
}
