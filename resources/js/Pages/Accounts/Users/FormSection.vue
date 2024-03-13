<template>
    <CardBox>
        <div class="grid grid-cols-2 gap-4">
            <FormField label="First Name">
                <FormControl 
                    v-model="form.first_name" 
                    :icon="mdiAccount" 
                    :error="form.errors.first_name"
                />
            </FormField>

            <FormField label="Last Name">
                <FormControl 
                    v-model="form.last_name" 
                    :icon="mdiAccount" 
                    :error="form.errors.last_name"
                />
            </FormField>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <FormField label="Email">
                <FormControl 
                    v-model="form.email" 
                    type="email" 
                    :icon="mdiMail"
                    :error="form.errors.email"
                />
            </FormField>

            <FormField label="Contact Number">
                <FormControl 
                    v-model="form.contact_number" 
                    :icon="mdiMonitorCellphone" 
                    :error="form.errors.contact_number"
                />
            </FormField>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <FormField label="Password">
                <FormControl 
                    v-model="form.password" 
                    type="password" 
                    :icon="mdiAsterisk" 
                    :error="form.errors.password"
                />
            </FormField>
        </div>

        <template #footer>
            <BaseButtons>
                <BaseButton @click="$emit('submit')" type="submit" color="info" label="Submit" :disabled="form.processing" />
                <BaseButton @click="$emit('reset')" type="reset" color="info" outline label="Reset" :disabled="form.processing" />
            </BaseButtons>
        </template>
    </CardBox>
</template>

<script setup>
import CardBox from '@/components/CardBox.vue'
import FormField from '@/components/FormField.vue'
import FormControl from '@/components/FormControl.vue'
import BaseButton from '@/components/BaseButton.vue'
import BaseButtons from '@/components/BaseButtons.vue'
import { ref } from 'vue'

const props = defineProps({
    form: {
        type: Object,
        default: () => {}
    }
})

const form = ref(props.form);

</script>