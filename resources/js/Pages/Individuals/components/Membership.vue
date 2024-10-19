<template>
    <div class="grid grid-cols-2 gap-4">
        <FormField label="Former Church">
            <FormControl 
                v-model="form.former_church" 
                :icon="mdiAccount" 
                :error="form.errors.former_church"
            />
        </FormField>

        <FormField label="Former Church Address">
            <FormControl 
                v-model="form.former_church_address" 
                :icon="mdiMapMarker" 
                :error="form.errors.former_church_address"
            />
        </FormField>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <FormField label="Year Attended">
            <FormControl 
                v-model="form.year_attended" 
                :icon="mdiCalendar" 
                :error="form.errors.year_attended"
                type="date"
            />
        </FormField>

        <FormField label="Inviter ID">
            <FormControl 
                v-model="form.inviter_id" 
                :icon="mdiAccount" 
                :error="form.errors?.inviter_id"
                type="select"
                :options="individuals"
            />
        </FormField>

        <FormField label="Inviter">
            <FormControl 
                v-model="form.inviter" 
                :icon="mdiAccount" 
                :error="form.errors.inviter"
            />
        </FormField>
    </div>

    <div class="grid grid-cols-2 gap-4 mt-6">
        <FormField label="Completed Membership Class">
            <div class="flex flex-col">
                <div>
                    <jet-checkbox
                        :value="true"
                        v-model:checked="form.membership_class"
                        id="membership_class"
                    />
                    <label class="font-bold ml-2">Yes/Not yet</label>
                </div>
            </div>
        </FormField>

        <FormField label="Membership Class Date">
            <FormControl 
                v-model="form.membership_class_date" 
                :icon="mdiCalendar" 
                :error="form.errors.membership_class_date"
                type="date"
            />
        </FormField>

        <FormField label="Membership Class Facilitator ID">
            <FormControl 
                v-model="form.membership_class_facilitator_id" 
                :icon="mdiAccount" 
                :error="form.errors?.membership_class_facilitator_id"
                type="select"
                :options="individuals"
            />
        </FormField>

        <FormField label="Membership Date">
            <FormControl 
                v-model="form.membership_date" 
                :icon="mdiCalendar" 
                :error="form.errors.membership_date"
                type="date"
            />
        </FormField>
    </div>

    <div class="grid grid-cols-3 gap-4">
        <div class="flex flex-col">
            <div>
                <jet-checkbox
                    :value="true"
                    v-model:checked="form.kbcf_sof"
                    id="kbcf_sof"
                />
                <label class="font-bold ml-2">KBCF Statement of Faith</label>
            </div>
    
            <div class="mt-2">
                <jet-checkbox
                    :value="true"
                    v-model:checked="form.church_covenant"
                    id="church_covenant"
                />
                <label class="font-bold ml-2">Church Covenant</label>
            </div>
    
            <div class="mt-2">
                <jet-checkbox
                    :value="true"
                    v-model:checked="form.members_covenant"
                    id="members_covenant"
                />
                <label class="font-bold ml-2">Members Covenant</label>
            </div>
    
            <div class="mt-2">
                <jet-checkbox
                    :value="true"
                    v-model:checked="form.notified_former_church"
                    id="notified_former_church"
                />
                <label class="font-bold ml-2">Notified Former Church</label>
            </div>
        </div>
    </div>
</template>

<script setup>
import JetCheckbox from "@/components/Checkbox.vue";
import FormControl from '@/components/FormControl.vue';
import FormField from '@/components/FormField.vue';

// Import the necessary icons
import { mdiAccount, mdiCalendar, mdiMapMarker } from '@mdi/js';

defineProps({
    form: Object,
    errors: Object,
})
</script>
