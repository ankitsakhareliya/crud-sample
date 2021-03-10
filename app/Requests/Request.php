<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class AudioRequest
 * @package App\Http\Admin\Requests
 */
class Request extends FormRequest
{
    const IMAGE_RULES = 'image|mimetypes:image/jpeg,image/png|max:1024';
    const AUDIO_RULES = 'file|mimetypes:audio/mpeg,application/octet-stream';
    const CSV_RULES = 'file|mimetypes:text/*,application/vnd.ms-excel';

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
        return [];
    }

    public function attributes()
    {
        return [
            
        ];
    }
}
