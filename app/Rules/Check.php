<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

use App\Models\Category;

class Check implements Rule
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
        return $value > 0 && $value <= Category::count();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Выберите категорию повторно!';
    }
}
