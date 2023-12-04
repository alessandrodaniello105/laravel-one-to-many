<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:3|max:75',
            'description' => 'required|min:3|max:255',
            //TODO: technologies sarà un array quando studieremo le relazioni
            // 'technologies' => 'required',
            // 'type_id' => 'required',
            'link' => 'min:10|max:120'
        ];
    }

    public function messages() {
        return [
            'title.required' => 'È necessario inserire un titolo',
            'title.min' => 'Il titolo deve essere almeno :min caratteri',
            'title.max' => 'Il titolo può essere lungo al massimo :max caratteri',

            'description.required' => 'È necessario inserire una descrizione',
            'description.min' => 'La descrizione deve essere almeno :min caratteri',
            'description.max' => 'La descrizione può essere lunga al massimo :max caratteri',

            // 'technologies.required' => 'È necessario inserire una tecnologia',

            // 'type_id.required' => 'È necessario inserire un tipo di progetto',

            'link.min' => 'Il link deve essere almeno :min caratteri',
            'link.max' => 'Il link può essere lungo al massimo :max caratteri'

        ];
    }
}
