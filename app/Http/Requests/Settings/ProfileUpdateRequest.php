<?php

namespace App\Http\Requests\Settings;

use App\Concerns\ProfileValidationRules;
use App\Enums\Roles;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    use ProfileValidationRules;

    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $canUpdateRole = $this->user()->can('updateRole', $this->user());

        return [
            ...$this->profileRules($this->user()->id),
            'role' => [
                Rule::when($canUpdateRole, [
                    'required',
                    Rule::enum(Roles::class),
                ], [
                    'prohibited',
                ]),
            ],
        ];
    }
}
