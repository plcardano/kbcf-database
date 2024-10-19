<template>
    <div class="grid grid-cols-2 gap-4">
        <FormField label="Spiritual Birthday">
            <FormControl 
                v-model="form.spiritual_birthdate" 
                :icon="mdiCalendar" 
                :error="form.errors.spiritual_birthdate"
                type="date"
            />
        </FormField>

        <FormField label="Completed Baptismal Class">
            <div class="flex flex-col">
                <div>
                    <jet-checkbox
                        :value="true"
                        v-model:checked="form.baptismal_class"
                        id="baptismal_class"
                    />
                    <label class="font-bold ml-2">Yes/Not yet</label>
                </div>
            </div>
        </FormField>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <FormField label="Baptismal Class Date">
            <FormControl 
                v-model="form.baptismal_class_date" 
                :icon="mdiCalendar" 
                :error="form.errors.baptismal_class_date"
                type="date"
            />
        </FormField>

        <FormField label="Baptismal Class Facilitator">
            <FormControl 
                v-model="form.baptismal_class_facilitator_id" 
                :icon="mdiAccount" 
                :error="form.errors?.baptismal_class_facilitator_id"
                type="select"
                :options="individuals"
            />
        </FormField>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <FormField label="Baptismal Date">
            <FormControl 
                v-model="form.baptismal_date" 
                :icon="mdiCalendar" 
                :error="form.errors.baptismal_date"
                type="date"
            />
        </FormField>

        <FormField label="Baptismal Minister">
            <FormControl 
                v-model="form.baptismal_minster_id" 
                :icon="mdiAccount" 
                :error="form.errors?.baptismal_minster_id"
                type="select"
                :options="individuals"
            />
        </FormField>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <FormField label="Church Baptism Facilitator">
            <FormControl 
                v-model="form.church_baptism_facilitator" 
                :icon="mdiAccount" 
                :error="form.errors.church_baptism_facilitator"
            />
        </FormField>

        <FormField label="Church Facilitator Address">
            <FormControl 
                v-model="form.church_facilitator_address" 
                :icon="mdiMapMarker" 
                :error="form.errors.church_facilitator_address"
            />
        </FormField>
    </div>
</template>

<script setup>
import JetCheckbox from "@/components/Checkbox.vue";
import FormControl from '@/components/FormControl.vue';
import FormField from '@/components/FormField.vue';
import { mdiAccount, mdiCalendar, mdiMapMarker } from '@mdi/js';

defineProps({
    form: Object,
    individuals: Object
});

</script>