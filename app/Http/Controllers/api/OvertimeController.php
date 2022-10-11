<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Employees;
use App\Models\Overtimes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class OvertimeController extends Controller
{
    public function index()
    {
        $overtime = Overtimes::all();
        $response = [
            'message' => 'Overtimes',
            'data' => $overtime,
        ];
        return response()->json($response, http_response_code(200));
    }
}
