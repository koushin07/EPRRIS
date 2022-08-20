<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\UserService;
use App\Models\Province;
use App\Models\MunicipalityTransaction;
use App\Models\Municipality;
use App\Events\PtoPTransactionEvent;
use App\Events\MtoPTransactionEvent;
use App\Events\toAdminTransactionEvent;
use App\Models\User;

class Notif extends Component
{
    protected $UserService;
    protected $listeners = ['notif' => '$refresh'];


    public function mount(UserService $UserService)
    {
        $this->UserService = $UserService;
    }
    public function render()
    {
        switch (auth()->user()->role) {
            case "municipality":
                $notif = Municipality::find(auth()->user()->municipality_id);
                break;
            case "province":
                $notif = Province::find(auth()->user()->province_id);
                break;
            case "rdrrmc":
                $notif = User::where('role', 'rdrrmc')->first();
                break;
        }


        return view('livewire.notif', [
            'notification' => $notif->unreadNotifications,

        ]);
    }

    public function read()
    {
        switch (auth()->user()->role) {
            case "municipality":
                $muni = Municipality::find(auth()->user()->municipality_id);
                $muni->unreadNotifications->markAsRead();
                break;
            case "province":
                $prov = Province::find(auth()->user()->province_id);
                $prov->unreadNotifications->markAsRead();
                break;
            case "rdrrmc":
                $user = User::where('role', 'rdrrmc')->first();
                $user->unreadNotifications->markAsRead();
                break;
        }
        
    }
}
