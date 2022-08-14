<?php

namespace App\Rules\Transaction\Municipality;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Municipality;

class MunicipalitySiblings implements Rule
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
        return  Municipality::where('municipality_name', $value)->first() != '';
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The Municipality is not in the List.';
    }
}
