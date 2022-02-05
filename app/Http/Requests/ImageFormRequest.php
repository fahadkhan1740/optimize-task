<?php

namespace App\Http\Requests;

use App\Constants\Constant;
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
     */
    public function rules()
    {
//        $imageFileRules = [
//            'required'
//        ];
//
//        if (request()->input('provider') === Constant::GOOGLE) {
//            $imageFileRules[] = 'mimes:jpg';
//            $imageFileRules[] = 'size:2000';
//            // TODO: add aspect ratio check
//        } else if (request()->input('provider') === Constant::SNAPCHAT) {
//            $imageFileRules[] = 'mimes:jpg,gif';
//            $imageFileRules[] = 'size:5000';
//            // TODO: add aspect ratio check
//        }

        return [
            'name' => ['bail', 'required', 'string'],
            'provider' => ['bail', 'required', 'exists:App\Models\Provider,id'],
            'image_file' => ['bail', 'required'] // new custom method for rules
        ];
    }
}
