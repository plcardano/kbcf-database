<template>
    <div>
        <div v-for="(item, index) in form.discipleship_involvement" :key="index" class="mb-6 pb-4 border-b border-gray-300">
            <div class="mb-4 flex justify-end">
                <BaseButtons>
                    <BaseButton
                        color="danger"
                        :icon="mdiTrashCan"
                        small
                        @click="removeItem(index)"
                    />
                </BaseButtons>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <FormField label="Year Start">
                    <FormControl 
                        v-model="item.year_start" 
                        :icon="mdiAccount" 
                        :error="item.errors?.[index]?.year_start"
                    />
                </FormField>

                <FormField label="Year End">
                    <FormControl 
                        v-model="item.year_end" 
                        :icon="mdiAccount" 
                        :error="item.errors?.[index]?.year_end"
                    />
                </FormField>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <FormField label="Discipler">
                    <FormControl 
                        v-model="item.discipler_id" 
                        :icon="mdiAccount" 
                        :error="item.errors?.[index]?.discipler_id"
                        type="select"
                        :options="individuals"
                    />
                </FormField>

                <FormField label="Discipler Name (if not in the options)">
                    <FormControl 
                        v-model="item.discipler_name" 
                        :icon="mdiAccount" 
                        :error="item.errors?.[index]?.discipler_name"
                    />
                </FormField>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <FormField label="Assistant Leader">
                    <FormControl 
                        v-model="item.assistant_leader" 
                        :icon="mdiAccount" 
                        :error="item.errors?.[index]?.assistant_leader"
                    />
                </FormField>
            </div>

            <div class="flex flex-col">
        <div>
            <jet-checkbox
                :value="true"
                v-model:checked="item.is_discipler"
                id="is_active"
            />
            <label class="font-bold ml-2">Is Discipler?</label>
        </div>
    </div>
        </div>

        <BaseButtons>
            <BaseButton  @click="addItem" type="button" color="info" outline label="Add Discipleship Involvement" />
        </BaseButtons>
    </div>
</template>

<script setup>
import BaseButton from '@/components/BaseButton.vue';
import BaseButtons from '@/components/BaseButtons.vue';
import JetCheckbox from "@/components/Checkbox.vue";
import FormControl from '@/components/FormControl.vue';
import FormField from '@/components/FormField.vue';
import { mdiTrashCan } from '@mdi/js';

const props = defineProps({
    form: Object,
    individuals: Object
});

const addItem = () => {
    props.form.discipleship_involvement.push({
        year_start: '',
        year_end: '',
        discipler_id: '',
        discipler_name: '',
        assistant_leader: '',
        is_discipler: false
    });
};

const removeItem = (index) => {
    props.form.discipleship_involvement.splice(index, 1);
};
</script>
