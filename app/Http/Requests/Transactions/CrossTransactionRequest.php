<?php

namespace App\Http\Requests\Transactions;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Transaction\Municipality\MunicipalitySiblings;
use App\Rules\Transaction\Municipality\EquipmentSiblings;

class CrossTransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'municipality_name' => new MunicipalitySiblings,
            'equipment_name' => new EquipmentSiblings,
            'quantity' => 'required',
        ];
    }
}
