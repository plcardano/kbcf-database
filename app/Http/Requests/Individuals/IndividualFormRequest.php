<?php

namespace App\Http\Requests\Individuals;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class IndividualFormRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'nickname' => ['nullable', 'string', 'max:100'],
            'birth_date' => ['required', 'date'],
            'gender' => ['required', 'integer', 'min:0', 'max:255'], // unsignedTinyInt
            'email' => ['required', 'email', 'max:255'],
            'mobile_number' => ['required', 'string', 'max:20'],
            'telephone_number' => ['nullable', 'string', 'max:20'],
            'civil_status' => ['required', 'integer', 'min:0', 'max:255'], // unsignedTinyInt
            'is_active' => ['required', 'boolean'],
            'occupation' => ['nullable', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'position' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'integer', 'min:0', 'max:255'], // unsignedTinyInt
            'type' => ['required', 'integer', 'min:0', 'max:255'], // unsignedTinyInt
            'waiver_signed' => ['required', 'boolean'],

            // Family Array
            'family' => ['nullable', 'array'],
            'family.*.first_name' => ['required', 'string', 'max:255'],
            'family.*.last_name' => ['required', 'string', 'max:255'],
            'family.*.middle_name' => ['nullable', 'string', 'max:255'],
            'family.*.nickname' => ['nullable', 'string', 'max:100'],
            'family.*.birth_date' => ['required', 'date'],
            'family.*.gender' => ['required', 'integer', 'min:0', 'max:255'], // unsignedTinyInt
            'family.*.relation' => ['required', 'integer', 'min:0', 'max:255'], // unsignedTinyInt

            // Discipleship Involvement Array
            'discipleship_involvement' => ['nullable', 'array'],
            'discipleship_involvement.*.year_start' => ['required', 'string', 'max:4'],
            'discipleship_involvement.*.year_end' => ['nullable', 'string', 'max:4'],
            'discipleship_involvement.*.discipler_id' => ['nullable', 'integer', 'min:0', 'max:255'],
            'discipleship_involvement.*.discipler_name' => ['nullable', 'string', 'max:255'],
            'discipleship_involvement.*.is_discipler' => ['nullable', 'integer', 'min:0', 'max:255'], // unsignedTinyInt
            'discipleship_involvement.*.assistant_leader' => ['nullable', 'string', 'max:255'],

            // Ministries
            'ministry_ids' => ['nullable', 'array'],
            'ministry_ids.*' => ['integer', 'exists:ministries,id'],

            // Spiritual
            'spiritual_birthdate' => ['nullable', 'date'],
            'baptismal_class' => ['nullable', 'boolean'],
            'baptismal_class_date' => ['nullable', 'date'],
            'baptismal_class_facilitator_id' => ['nullable', 'integer', 'min:0', 'max:255'],
            'baptismal_date' => ['nullable', 'date'],
            'baptismal_minster_id' => ['nullable', 'integer', 'min:0', 'max:255'],
            'church_baptism_facilitator' => ['nullable', 'string', 'max:255'],
            'church_facilitator_address' => ['nullable', 'string', 'max:255'],

            // Former Church
            'former_church' => ['nullable', 'string', 'max:255'],
            'former_church_address' => ['nullable', 'string', 'max:255'],
            'year_attended' => ['nullable', 'date'],
            'inviter_id' => ['nullable', 'integer', 'min:0', 'max:255'],
            'inviter' => ['nullable', 'string', 'max:255'],
            'membership_class' => ['nullable', 'boolean'],
            'membership_class_date' => ['nullable', 'date'],
            'membership_class_facilitator_id' => ['nullable', 'integer', 'min:0', 'max:255'],
            'membership_date' => ['nullable', 'date'],
            'kbcf_sof' => ['nullable', 'boolean'],
            'church_covenant' => ['nullable', 'boolean'],
            'members_covenant' => ['nullable', 'boolean'],
            'notified_former_church' => ['nullable', 'boolean'],
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'First name is required',
            'last_name.required' => 'Last name is required',
            'birth_date.required' => 'Birth date is required',
            'gender.required' => 'Gender is required',
            'email.required' => 'Email is required',
            'mobile_number.required' => 'Mobile number is required',
            // Add more messages as needed
        ];
    }
}
