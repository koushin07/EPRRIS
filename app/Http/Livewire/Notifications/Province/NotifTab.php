<?php

namespace App\Http\Livewire\Notifications\Province;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\User;
use App\Models\CrossTransaction;
use App\Events\toAdminTransactionEvent;
use App\Events\MunicipalityTransactionEvent;

class NotifTab extends Component
{
    use WithPagination;
    protected $listeners = ['notif' => '$refresh'];
    public function render()
    {
        return view('livewire.notifications.province.notif-tab', [
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
                ->where('self_province_confirmation', '=', false)
                ->paginate(5),
        ]);
    }
    public function decision($decision, $id)
    {

        switch ($decision) {
            case "accept":
                $borrow = CrossTransaction::find($id);
                $borrow->self_province_confirmation = true;
                $admin = User::where('role', 'rdrrmc')->get();
                toAdminTransactionEvent::dispatch($admin);
                break;

            case "deny":
                $borrow = CrossTransaction::find($id);
                $borrow->delete();
                break;
        }
        $borrow->save();
    }
}
