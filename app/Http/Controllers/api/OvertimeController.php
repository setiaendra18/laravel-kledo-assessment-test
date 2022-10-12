<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Overtimes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class OvertimeController extends Controller
{
    public function index()
    {
        $overtime = Overtimes::all();
        return response()->json($overtime, http_response_code(200));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'employee_id' => 'required',
            'date' => 'required',
            'time_started' => 'required|before:time_ended',
            'time_ended' => 'required|after:time_started',
        ]);
        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
            );
        }
        try {
            $employees = Overtimes::create($request->all());
            $response = [
                'message' => 'Data Empolyees Berhasil Disimpan',
                'data' => $employees,
            ];
            return response()->json($response);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "gagal" . $e->errorInfo,
            ]);
        }
    }
    public function overtime_calculation()
    {
        $overtime_cal = Overtimes::join('employees', 'employees.id', '=', 'overtimes.employee_id')
        ->get();
        return response()->json($overtime_cal, http_response_code(200));
    }
}
