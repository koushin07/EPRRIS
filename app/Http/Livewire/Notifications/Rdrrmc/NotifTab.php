<?php

namespace App\Http\Livewire\Notifications\Rdrrmc;

use Livewire\Component;
use App\Models\CrossTransaction;

class NotifTab extends Component
{
    public function render()
    {
        return view('livewire.notifications.rdrrmc.notif-tab', [
            'borrows' =>  CrossTransaction::select(
                [
                    'cross_transactions.id',
                    'cross_transactions.created_at',
                    'cross_transactions.quantity',
                    'municipalities.municipality_name',
                    'equipment.equipment_name',
                    'equipment.model_number',
                ]
            )
                ->join('equipment', 'cross_transactions.equipment_id', '=', 'equipment.id')

                ->join('municipalities', 'equipment.municipality_id', '=', 'municipalities.id')
                ->where('rdrrmc_confirmation', '=', false)
                ->paginate(5),
        ]);
    }
}
