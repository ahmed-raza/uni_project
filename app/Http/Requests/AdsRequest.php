<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdsRequest extends FormRequest
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

    public function messages() {
        return [
            'images.required' => 'Images are required for a featured ad.',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      return [
        'title'       => 'required|max:80',
        'category_id' => 'required',
        'city'        => 'required|max:50',
        'description' => 'required',
        'phone'       => $this->input('pull_contact_info') ? '' : 'required',
        'email'       => $this->input('pull_contact_info') ? '' : 'required',
        'images'      => $this->input('featured') && $this->method() !== 'PATCH' ? 'required' : '',
      ];
    }
}
