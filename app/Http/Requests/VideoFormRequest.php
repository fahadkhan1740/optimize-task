<?php

namespace App\Http\Requests;

use App\Constants\Constant;
use Illuminate\Foundation\Http\FormRequest;

class VideoFormRequest extends FormRequest
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
        $videoFileRules = [
            'required'
        ];

        if (request()->input('provider') === Constant::GOOGLE) {
            $videoFileRules[] = 'mimes:mp4';
            // TODO: add duration check
        } else if (request()->input('provider') === Constant::SNAPCHAT) {
            $videoFileRules[] = 'mimes:mp4,mov';
            $videoFileRules[] = 'size:50000';
            // TODO: add duration check
        }

        return [
            'video_file' => $videoFileRules
        ];
    }
}
