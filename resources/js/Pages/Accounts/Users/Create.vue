<template>
    <AppLayout>
        <SectionMain>
            <SectionTitleLineWithButton :icon="mdiAccountCircle" title="Create Admin" main>
                <BaseButton 
                    color="info" 
                    label="Back" 
                    :routeName="route('accounts.users.index')" 
                />                
            </SectionTitleLineWithButton>

            <FormSection
                :form="form"
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

const form = useForm({
  first_name: null,
  last_name: null,
  email: null,
  contact_number: null,
  password: null,
})

const reset = () => {
    form.first_name = null;
    form.last_name = null;
    form.email = null;
    form.contact_number = null;
    form.password = null;
}

const submit = () => {
  form.post(route('accounts.users.store'), 
        { preserveState: true }
    )
}


</script>