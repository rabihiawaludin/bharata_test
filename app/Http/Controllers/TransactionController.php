<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Transaction;
use App\Services\StockService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::with([
            'item',
            'user'
        ])->latest()->get();

        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = Item::all();
        return view('transactions.create', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, StockService $stockService)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'tipe' => 'required|in:masuk,keluar',
            'qty' => 'required|integer|min:1',
        ]);

       try {

            $stockService->process(
                $request->item_id,
                $request->tipe,
                $request->qty,
                auth()->id()
            );

            return redirect()
                ->route('transactions.index')
                ->with('success', 'Transaction has created successfully.');

        } catch (\Exception $e) {

            return back()->withErrors([
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
