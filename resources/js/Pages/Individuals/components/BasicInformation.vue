<template>
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
        <FormField label="Middle Name">
            <FormControl 
                v-model="form.middle_name" 
                :icon="mdiAccount" 
                :error="form.errors.middle_name"
            />
        </FormField>

        <FormField label="Nickname">
            <FormControl 
                v-model="form.nickname" 
                :icon="mdiAccount" 
                :error="form.errors.nickname"
            />
        </FormField>
    </div>

    <div class="grid grid-cols-3 gap-4">
        <FormField label="Birth Date">
            <FormControl 
                v-model="form.birth_date" 
                :icon="mdiCalendar" 
                :error="form.errors.birth_date"
                type="date"
            />
        </FormField>

        <FormField label="Gender">
            <FormControl 
                v-model="form.gender" 
                :icon="mdiGenderMaleFemale" 
                :error="form.errors.gender"
                type="select"
                :options="gender"
            />
        </FormField>

        <FormField label="Civil Status">
            <FormControl 
                v-model="form.civil_status" 
                :icon="mdiAccount" 
                :error="form.errors.civil_status"
                type="select"
                :options="civilStatuses"
            />
        </FormField>
    </div>

    <div class="grid grid-cols-3 gap-4">
        <FormField label="Email">
            <FormControl 
                v-model="form.email" 
                type="email" 
                :icon="mdiMail"
                :error="form.errors.email"
            />
        </FormField>

        <FormField label="Mobile Number">
            <FormControl 
                v-model="form.mobile_number" 
                :icon="mdiMonitorCellphone" 
                :error="form.errors.mobile_number"
            />
        </FormField>

        <FormField label="Telephone Number">
            <FormControl 
                v-model="form.telephone_number" 
                :icon="mdiPhone" 
                :error="form.errors.telephone_number"
            />
        </FormField>
    </div>

    <div class="grid grid-cols-3 gap-4">
        <FormField label="Occupation">
            <FormControl 
                v-model="form.occupation" 
                :error="form.errors.occupation"
            />
        </FormField>
        <FormField label="Company">
            <FormControl 
                v-model="form.company" 
                :error="form.errors.company"
            />
        </FormField>
        <FormField label="Position">
            <FormControl 
                v-model="form.position" 
                :error="form.errors.position"
            />
        </FormField>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <FormField label="Status">
            <FormControl 
                v-model="form.status" 
                :icon="mdiCheckCircle" 
                :error="form.errors.status"
                type="select"
                :options="statuses"
            />
        </FormField>

        <FormField label="Type">
            <FormControl 
                v-model="form.type" 
                :icon="mdiShape" 
                :error="form.errors.type"
                type="select"
                :options="types"
            />
        </FormField>
    </div>

    <div class="flex flex-col">
        <div>
            <jet-checkbox
                :value="true"
                v-model:checked="form.is_active"
                id="is_active"
            />
            <label class="font-bold ml-2">Is Active?</label>
        </div>

        <div class="mt-2">
            <jet-checkbox
                :value="true"
                v-model:checked="form.waiver_signed"
                id="waiver_signed"
            />
            <label class="font-bold ml-2">Waiver Signed?</label>
        </div>
    </div>
</template>

<script setup>
import JetCheckbox from "@/components/Checkbox.vue";
import FormControl from '@/components/FormControl.vue';
import FormField from '@/components/FormField.vue';
import {
    mdiAccount,
    mdiCalendar,
    mdiCheckCircle,
    mdiGenderMaleFemale,
    mdiMail,
    mdiMonitorCellphone,
    mdiPhone,
    mdiShape
} from '@mdi/js';

defineProps({
    form: Object,
    civilStatuses: Object,
    gender: Object,
    statuses: Object,
    types: Object
});
</script>
