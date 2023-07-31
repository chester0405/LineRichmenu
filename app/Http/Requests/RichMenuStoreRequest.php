<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RichMenuStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'rich_menu_name' => 'required',
            'chat_bar_text' => 'required',
            'selected' => 'required',
            'rich_menu_image_url' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png',
                function ($attribute, $value, $fail) {
                    $allowedDimensions = ['2500x1686', '2500x843', '1200x810', '1200x405', '800x540', '800x270'];
                    list($width, $height) = getimagesize($value);
                    $dimension = $width . 'x' . $height;
                    if (!in_array($dimension, $allowedDimensions)) {
                        $fail('格式錯誤，符合的格式大小應為：' . implode(", ", $allowedDimensions));
                    }
                },
            ],
        ];
    }
}
