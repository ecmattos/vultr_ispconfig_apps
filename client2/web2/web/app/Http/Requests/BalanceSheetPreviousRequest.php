<?php

namespace SisCad\Http\Requests;

use SisCad\Http\Requests\Request;

class BalanceSheetPreviousRequest extends Request
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
        return [
            'management_unit_id'    => 'required'           //
        ];
    }

    public function messages()
    {
        return [
            'management_unit_id.required' => '<b>Unid.Gestora</b> >> Preenchimento obrigatório.'       
        ];
    }
}
