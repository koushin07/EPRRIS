<?php

namespace App\Rules\Transaction\Municipality;

use App\Models\Equipment;
use Illuminate\Contracts\Validation\Rule;

class EquipmentSiblings implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return  Equipment::where('equipment_name', $value)->first() != '';
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The Equipment is Not in List.';
    }
}
