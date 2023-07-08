<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSuratMasukRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'no_surat'                  => 'required',
            'jenis_surat'               => 'required',
            'tanggal_penerimaan'        => 'required',
            'no_agenda'                 => 'required',
            'tanggal_surat'             => 'required',
            'asal_surat'                => 'required',
            'tujuan_surat'              => 'required',
            'perihal'                   => 'required'
        ];
    }
}
