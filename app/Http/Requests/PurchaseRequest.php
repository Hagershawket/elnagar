<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
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

            'total_cash'     => 'required',
            'total_delay'    => 'required',
            'date'           => 'required',
            'supplier_id'    => 'required',
            'warehouse_id'   => 'required',
            'product_id.*'   => 'required',
            'unit_id.*'      => 'required',
            'qty.*'          => 'required',
            'weight.*'       => 'required',
            'unit_cost.*'    => 'required',
            'total.*'        => 'required',
        ];
    }

    public function messages()
    {
        return [
            'total_cash.required'         => trans('validation.total_cash.required'),
            'total_delay.required'        => trans('validation.total_delay.required'),
            'date.required'               => trans('validation.date.required'),
            'supplier_id.required'        => trans('validation.supplier_id.required'),
            'warehouse_id.required'       => trans('validation.warehouse_id.required'),
            'product_id.*.required'       => trans('validation.product_id.required'),
            'unit_id.*.required'          => trans('validation.unit_id.required'),
            'qty.*.required'              => trans('validation.qty.required'),
            'weight.*.required'           => trans('validation.weight.required'),
            'unit_cost.*.required'        => trans('validation.unit_cost.required'),
            'total.*.required'            => trans('validation.total.required'),
        ];
    }
}
