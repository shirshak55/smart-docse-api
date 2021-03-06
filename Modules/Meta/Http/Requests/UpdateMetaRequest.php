<?php

namespace Modules\Meta\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMetaRequest extends FormRequest
{
    /**
     * Determine if the meta is authorized to make this request.
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
     * @return array
     */
    public function rules()
    {
        $meta = $this->route('meta');

        if (! $meta->metable_type) {
            return [
                'route' => "required|unique:metas,route,{$meta->id}",
            ];
        }

        return [];
    }
}
