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
    individuals: Object
})
    
const form = useForm({
  first_name: null,
  last_name: null,
  email: null,
  contact_number: null,
  password: null,
  family: [],
  discipleship_involvement: [],
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