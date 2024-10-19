<?php

namespace App\Services\Individual;

use App\Http\Requests\Individuals\IndividualFormRequest;
use App\Models\Individuals\Individual;
use Illuminate\Support\Facades\DB;

class IndividualService
{
    public function create(IndividualFormRequest $request): void
    {
        $vars = $request->validated();

        DB::transaction(function () use ($vars) {
            $individual = $this->createIndividual($vars);

            foreach ($vars['family'] as $family) {
                $individual->family()->create($family);
            }

            foreach ($vars['discipleship_involvement'] as $discipleship) {
                $individual->discipleshipInvolvements()->create($discipleship);
            }

            $individual->ministryInvolvements()->attach($vars['ministry_ids']);

            $this->createBaptismInformation($individual, $vars);
            $this->createMembershipInformation($individual, $vars);
        });
    }

    protected function createIndividual(array $vars): Individual
    {
        $individual = Individual::updateOrCreate([
            'first_name' => $vars['first_name'],
            'last_name' => $vars['last_name'],
            'middle_name' => $vars['middle_name'],
            'nickname' => $vars['nickname'],
            'birth_date' => $vars['birth_date'],
            'gender' => $vars['gender'],
            'email' => $vars['email'],
            'mobile_number' => $vars['mobile_number'],
            'telephone_number' => $vars['telephone_number'],
            'civil_status' => $vars['civil_status'],
            'is_active' => $vars['is_active'],
            'occupation' => $vars['occupation'],
            'company' => $vars['company'],
            'position' => $vars['position'],
            'status' => $vars['status'],
            'type' => $vars['type'],
        ]);

        return $individual;
    }

    protected function createBaptismInformation(Individual $individual, array $vars): void
    {
        $individual->baptismInformation()->create([
            'spiritual_birthdate' => $vars['spiritual_birthdate'],
            'baptismal_class' => $vars['baptismal_class'],
            'baptismal_class_date' => $vars['baptismal_class_date'],
            'baptismal_class_facilitator_id' => $vars['baptismal_class_facilitator_id'],
            'baptismal_date' => $vars['baptismal_date'],
            'baptismal_minster_id' => $vars['baptismal_minster_id'],
            'church_baptism_facilitator' => $vars['church_baptism_facilitator'],
            'church_facilitator_address' => $vars['church_facilitator_address'],
        ]);
    }

    protected function createMembershipInformation(Individual $individual, array $vars): void
    {
        $individual->membershipInformation()->create([
            'former_church' => $vars['former_church'],
            'former_church_address' => $vars['former_church_address'],
            'year_attended' => $vars['year_attended'],
            'inviter_id' => $vars['inviter_id'],
            'inviter' => $vars['inviter'],
            'membership_class' => $vars['membership_class'],
            'membership_class_date' => $vars['membership_class_date'],
            'membership_class_facilitator_id' => $vars['membership_class_facilitator_id'],
            'membership_date' => $vars['membership_date'],
            'kbcf_sof' => $vars['kbcf_sof'],
            'church_covenant' => $vars['church_covenant'],
            'members_covenant' => $vars['members_covenant'],
            'notified_former_church' => $vars['notified_former_church'],
        ]);
    }
}
