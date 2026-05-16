<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\StockService;
use Illuminate\Http\Request;

class TransactionApiController extends Controller
{
    public function store(
        Request $request,
        StockService $stockService
    ) {

        $request->validate([
            'item_id' => 'required',
            'tipe' => 'required',
            'qty' => 'required|integer|min:1',
            'user_id' => 'required',
        ]);

        try {

            $transaction = $stockService->process(
                $request->item_id,
                $request->tipe,
                $request->qty,
                $request->user_id
            );

            return response()->json([
                'success' => true,
                'data' => $transaction
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 422);

        }
    }
}