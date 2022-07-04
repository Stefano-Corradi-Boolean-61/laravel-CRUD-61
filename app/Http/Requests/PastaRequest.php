<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PastaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // deve essere true
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // funzione presente di default
        return  [
            'name' => 'required|max:50|min:3',
            'image' => 'required|max:255|min:10',
            'type' => 'required|max:50|min:3',
            'description' => 'min:10'
        ];
    }

    public function messages(){
        // funzione da creare se si vogliono messaggi custom
        return [
            'name.required' => 'Il campo nome è obbligatorio',
            'name.max' => 'Il campo nome deve avere al massimo :max caratteri',
            'name.min' => 'Il campo nome deve avere minimo :min caratteri',
            'image.required' => 'Il campo Url immaigne è obbligatorio',
            'image.max' => 'Il campo Url immaigne deve avere al massimo :max caratteri',
            'image.min' => 'Il campo Url immaigne deve avere minimo :min caratteri',
            'type.required' => 'Il campo tipo nome è obbligatorio',
            'type.max' => 'Il campo tipo deve avere al massimo :max caratteri',
            'type.min' => 'Il campo tipo deve avere minimo :min caratteri',
            'description.min' => 'Il descrizione nome deve avere minimo :min caratteri',
        ];
    }
}
