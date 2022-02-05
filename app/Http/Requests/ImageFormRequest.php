<?php

namespace App\Http\Requests;

use App\Constants\Constant;
use App\Models\Provider;
use Illuminate\Foundation\Http\FormRequest;

class ImageFormRequest extends FormRequest
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
     * @return array
     * @throws \JsonException
     */
    public function rules()
    {
        return [
            'name' => ['bail', 'required', 'string'],
            'provider' => ['bail', 'required', 'exists:App\Models\Provider,id'],
            'image_file' => [
                'bail',
                'required',
                ...explode(';', Provider::find(request()->input('provider'))->toArray()['rules'])
            ] // new custom method for rules
        ];
    }
}
