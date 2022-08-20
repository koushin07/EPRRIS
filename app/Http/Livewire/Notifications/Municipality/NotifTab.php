<?php

namespace App\Http\Livewire\Notifications\Municipality;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\MunicipalityTransaction;

class NotifTab extends Component
{
    use WithPagination;
    protected $listeners = ['notif' => '$refresh'];
    public function render()
    {

        return view('livewire.notifications.municipality.notif-tab', [
            'borrows' => MunicipalityTransaction::select(
                [
                    'municipality_transactions.id',
                    'municipality_transactions.created_at',
                    'municipalities.municipality_name',
                    'equipment.equipment_name',
                    'equipment.model_number',
                ]
            )
                ->join('equipment', 'municipality_transactions.equipment_id', '=', 'equipment.id')
                ->where('equipment.municipality_id', '=', auth()->user()->municipality_id)
                ->join('municipalities', 'equipment.municipality_id', '=', 'municipalities.id')
                ->where('confirm', '=', 1)
                ->paginate(5)
        ]);
    }

    public function decision($decision, $id)
    {
        switch ($decision) {
            case "accept":
                $borrow = MunicipalityTransaction::find($id);
                $borrow->confirm = 2;
                break;

            case "deny":
                $borrow = MunicipalityTransaction::find($id);
                $borrow->confirm = 0;
                break;
        }
    }
}
