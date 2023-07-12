<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTableRequest;
use App\Http\Resources\TableResource;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables = Auth::user()->store->tables;
        return response()->json(["success" => true, "data" => TableResource::collection($tables), "message" => "Get all table are successfully."], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTableRequest $request)
    {
        $checkTable = Auth::user()->store->tables->contains('table_number', $request->table_number);
        if ($checkTable) return response()->json(['success' => false, 'message' => ["table" => "The table number already exists."]], 409);
        return Response()->json(['success' => true, 'message' => 'Create a new table is successfully.', 'data'=> new TableResource(Table::storeTable($request)) ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateTableRequest $request, string $id)
    {
        $contains = Auth::user()->store->tables->contains('id', $id);
        if (!$contains) return Response()->json(['success' => false, 'message' => ['table'=> 'The table id is not found.']], 404);
        $checkTable = Auth::user()->store->tables->contains('table_number', $request->table_number);
        if ($checkTable) return response()->json(['success' => false, 'message' => ["table" => "The table number already exists."]], 409);
        return Response()->json(['success' => true, 'message' => 'Update the table is successfully.', 'data'=> new TableResource(Table::storeTable($request, $id)) ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contains = Auth::user()->store->tables->contains('id', $id);
        if (!$contains) return Response()->json(['success' => false, 'message' => ['table'=> 'The table id is not found.']], 404);
        Table::find($id)->delete();
        return Response()->json(['success' => true, 'message' => 'Delete the table is successfully.'], 200);
    }
}
