<?php

namespace App\Rules\RoomRule;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Room\RoomType;

class RoomTypeRule implements Rule
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
        $mount = RoomType::count();
        if ($value > $mount || $value < 0) return false;
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Vui lòng nhập đúng type room id.';
    }
}
