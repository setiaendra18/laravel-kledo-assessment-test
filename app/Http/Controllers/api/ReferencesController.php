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
        $response = [
            'message' => 'REFERENCES',
            'data' => $references,
        ];
        return response()->json($response, http_response_code(200));
    }
}
