<?php

namespace App\Http\Requests\Transactions\Municipality;

use App\Rules\Transaction\Municipality\EquipmentSiblings;
use App\Rules\Transaction\Municipality\MunicipalitySiblings;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'equipment_name' => new EquipmentSiblings,
            'municipality_name' => new MunicipalitySiblings,
            'quantity'=>'required'

        ];
    }
}
