<?php

namespace App\Services;

use App\Events\StockUpdated;
use App\Models\Item;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Exception;

class StockService
{
    public function process(
        int $itemId,
        string $tipe,
        int $qty,
        int $userId
    ) {

        return DB::transaction(function () use (
            $itemId,
            $tipe,
            $qty,
            $userId
        ) {

            $item = Item::lockForUpdate()->findOrFail($itemId);
            if ($tipe === 'keluar') {

                if ($item->stok < $qty) {
                    throw new Exception('Stok tidak cukup');
                }

                $item->stok -= $qty;
            }

            if ($tipe === 'masuk') {
                $item->stok += $qty;
            }

            $item->save();
            broadcast(new StockUpdated($item->fresh()));

            return Transaction::create([
                'item_id' => $itemId,
                'tanggal' => now(),
                'tipe' => $tipe,
                'qty' => $qty,
                'user_id' => $userId,
            ]);
        });
    }
}