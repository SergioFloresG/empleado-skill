<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class SkillArray implements Rule
{
    protected $message = '';

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
     * @param  string $attribute
     * @param  mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (!is_array($value)) {
            $this->message = __('validation.skills.not_array');
            return false;
        }
        $total = count($value);
        if (count(array_filter(array_keys($value), 'is_string')) !== $total) {
            $this->message = __('validation.skills.skill_name');
            return false;
        }


        foreach ($value as $k => $v) {
            if (!is_numeric($v) || $v < 1 || $v > 5) {
                $this->message = __('validation.skills.skill_number', ['skill' => $k]);
                return false;
            }
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}
