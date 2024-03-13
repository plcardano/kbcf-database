<template>
    <AppLayout>
        <SectionMain>
            <SectionTitleLineWithButton :icon="mdiAccountCircle" title="Create User" main>
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
import { mdiAccountCircle, mdiAccount, mdiMail, mdiMonitorCellphone, mdiAsterisk } from '@mdi/js'
import AppLayout from '@/Layouts/LayoutAuthenticated.vue';
import SectionMain from '@/components/SectionMain.vue'
import SectionTitleLineWithButton from '@/components/SectionTitleLineWithButton.vue'
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3';
import FormSection from './FormSection.vue'
import BaseButton from '@/components/BaseButton.vue'

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