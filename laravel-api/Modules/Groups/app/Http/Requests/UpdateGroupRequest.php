<?php

namespace Modules\Groups\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGroupRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        /** @var Group|null $group */
        $group = $this->route('group');

        return [
            'name'         => 'sometimes|required|string|max:100|unique:groups,name,' . ($group?->id ?? 'NULL'),
            'can_view'     => 'sometimes|boolean',
            'can_create'   => 'sometimes|boolean',
            'can_edit'     => 'sometimes|boolean',
            'can_delete'   => 'sometimes|boolean',
            'can_toggle'   => 'sometimes|boolean',
            'can_download' => 'sometimes|boolean',
            'can_upload'   => 'sometimes|boolean',
        ];
    }
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
