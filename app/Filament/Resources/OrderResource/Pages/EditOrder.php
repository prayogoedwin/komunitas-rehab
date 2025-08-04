<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

use App\Models\ProdukStokVarian;
use App\Models\Member;

use Illuminate\Support\Facades\Cache;

class EditOrder extends EditRecord
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
            ->before(function () {
                    $order = $this->record;

                    // 1. Kembalikan stok produk varian
                    $varian = ProdukStokVarian::find($order->produk_stok_varians_id);
                    if ($varian) {
                        $varian->increment('stok', $order->jumlah);
                    }

                    // 2. Kembalikan poin ke member
                    $member = Member::find($order->member_id);
                    if ($member) {
                        $member->increment('poin_terkini', $order->poin_total);
                    }

                    Cache::forget('produk_varians_' . $order->produk_id);
                }),
        ];
    }
}
