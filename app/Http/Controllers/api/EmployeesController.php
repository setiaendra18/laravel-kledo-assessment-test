<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;
use Illuminate\Database\QueryException;

class EmployeesController extends Controller
{
    public function index()
    {
        $empoyees= Employees::all();
        $response = [
            'message' => 'empolyees',
            'data' => $empoyees,
        ];
        return response()->json($response, http_response_code(200));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => 'required|min:2|unique:employees,name',
            "salary" => 'required|int|min:2000000|max:10000000',
          
        ]);

        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
                HttpFoundationResponse::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        try {
            $employees = Employees::create($request->all());

            $response = [
                'message' => 'Berhasil disimpan',
                'data' => $employees,
            ];

            return response()->json($response, HttpFoundationResponse::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Gagal " . $e->errorInfo,
            ]);
        }
    }
    public function overtime()
    {
        //get data overtime
    }
    public function overtime_pays()
    {

    }
}
