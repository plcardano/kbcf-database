<template>
    <AppLayout>
        <SectionMain>
            <SectionTitleLineWithButton :icon="mdiAccountCircle" title="Create Individual" main>
                <BaseButton 
                    color="info" 
                    label="Back" 
                    :routeName="route('individuals.index')" 
                />                
            </SectionTitleLineWithButton>

            <FormSection
                :form="form"
                :gender="gender"
                :civilStatuses="civilStatuses"
                :statuses="statuses"
                :types="types"
                :relations="relations"
                :individuals="individuals"
                :ministries="ministries"
                @submit="submit"
                @reset="reset"
            >
                
            </FormSection>
        </SectionMain>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import BaseButton from '@/components/BaseButton.vue';
import SectionMain from '@/components/SectionMain.vue';
import SectionTitleLineWithButton from '@/components/SectionTitleLineWithButton.vue';
import { useForm } from '@inertiajs/vue3';
import { mdiAccountCircle } from '@mdi/js';
import FormSection from './FormSection.vue';

defineProps({
    gender: Object,
    civilStatuses: Object,
    statuses: Object,
    types: Object,
    relations: Object,
    individuals: Object,
    ministries: Object
})
    
const form = useForm({
    first_name: null,
    last_name: null,
    middle_name: null,
    nickname: null,
    birth_date: null,
    gender: null,
    email: null,
    mobile_number: null,
    telephone_number: null,
    civil_status: null,
    is_active: false,
    occupation: null,
    company: null,
    position: null,
    status: null,
    type: null,
    waiver_signed: false,
    family: [],
    discipleship_involvement: [],
    ministry_ids: [],

    // Baptism
    spiritual_birthdate: null,
    baptismal_class: null,
    baptismal_class_date: null,
    baptismal_class_facilitator_id: null,
    baptismal_date: null,
    baptismal_minster_id: null,
    church_baptism_facilitator: null,
    church_facilitator_address: null,

    // Membership
    former_church: null,
    former_church_address: null,
    year_attended: null,
    inviter_id: null,
    inviter: null,
    membership_class: null,
    membership_class_date: null,
    membership_class_facilitator_id: null,
    membership_date: null,
    kbcf_sof: null,
    church_covenant: null,
    members_covenant: null,
    notified_former_church: null,
})

const reset = () => {
    form.first_name = null;
    form.last_name = null;
    form.email = null;
    form.contact_number = null;
    form.password = null;
}

const submit = () => {
    form.post(route('individuals.store'), 
        { preserveState: true }
    )
}


</script>