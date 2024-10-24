<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductionRequest extends FormRequest
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
            'image' => 'nullable|image|max:2048',
            'ps' => 'required|string|max:255',
            'ps_date' => 'required|date',
            'sst10' => 'nullable|string|max:255',
            'style' => 'nullable|string|max:255',
            'bayer_po' => 'required|string|max:255',
            'bayer' => 'required|string|max:255',
            'sd_date' => 'required|date',
            'qty' => 'required|integer',
            'cap_item' => 'nullable|string|max:255',
            'ship_via' => 'nullable|string|max:255',
            'dest' => 'nullable|string|max:255',
            'final_dest' => 'nullable|string|max:255',
            'embo' => 'nullable|string|max:255',
            'washing' => 'nullable|string|max:255',
            'c_pattern' => 'nullable|string|max:255',
            'v_pattern' => 'nullable|string|max:255',
            'c_Cutter' => 'nullable|string|max:255',
            'v_cutter' => 'nullable|string|max:255',
            'eyelet_number' => 'nullable|string|max:255',
            'eyelet_color' => 'nullable|string|max:255',
            'eyelet_position' => 'nullable|string|max:255',
            'visor_6' => 'nullable|string|max:255',
            'visor_1/5' => 'nullable|string|max:255',
            'visor_0/5' => 'nullable|string|max:255',
            'f_mold' => 'nullable|string|max:255',
            'v_mold' => 'nullable|string|max:255',
            'extra_stitch' => 'nullable|string|max:255',
            'packing' => 'nullable|string|max:255',
            'row' => 'nullable|string|max:255',
            'cm_from_front_end' => 'nullable|string|max:255',
        ];
    }
}
