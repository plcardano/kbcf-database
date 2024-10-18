<template>
    <div>
        <div v-for="(family, index) in form.family" :key="index" class="mb-6 pb-4 border-b border-gray-300">
            <div class="grid grid-cols-2 gap-4">
                <FormField label="First Name">
                    <FormControl 
                        v-model="family.first_name" 
                        :icon="mdiAccount" 
                        :error="form.errors?.[index]?.first_name"
                    />
                </FormField>

                <FormField label="Last Name">
                    <FormControl 
                        v-model="family.last_name" 
                        :icon="mdiAccount" 
                        :error="form.errors?.[index]?.last_name"
                    />
                </FormField>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <FormField label="Middle Name">
                    <FormControl 
                        v-model="family.middle_name" 
                        :icon="mdiAccount" 
                        :error="form.errors?.[index]?.middle_name"
                    />
                </FormField>

                <FormField label="Nickname">
                    <FormControl 
                        v-model="family.nickname" 
                        :icon="mdiAccount" 
                        :error="form.errors?.[index]?.nickname"
                    />
                </FormField>
            </div>

            <div class="grid grid-cols-3 gap-4">
                <FormField label="Birth Date">
                    <FormControl 
                        v-model="family.birth_date" 
                        :icon="mdiAccount" 
                        :error="form.errors?.[index]?.birth_date"
                        type="date"
                    />
                </FormField>

                <FormField label="Age">
                    <FormControl 
                        :model-value="computeAge(family.birth_date)"
                    />
                </FormField>

                <FormField label="Gender">
                    <FormControl 
                        v-model="family.gender" 
                        :icon="mdiAccount" 
                        :error="form.errors?.[index]?.gender"
                        type="select"
                        :options="gender"
                    />
                </FormField>

                <FormField label="Relationship">
                    <FormControl 
                        v-model="family.relation" 
                        :icon="mdiAccount" 
                        :error="form.errors?.[index]?.relation"
                        type="select"
                        :options="relations"
                    />
                </FormField>
            </div>
            <BaseButtons>
                <BaseButton  @click="removeFamilyMember(index)" type="button" color="danger" outline label="Remove" />
            </BaseButtons>
        </div>

        <BaseButtons>
            <BaseButton  @click="addFamilyMember" type="button" color="info" outline label="Add Family Member" />
        </BaseButtons>
    </div>
</template>

<script setup>
import BaseButton from '@/components/BaseButton.vue';
import BaseButtons from '@/components/BaseButtons.vue';
import FormControl from '@/components/FormControl.vue';
import FormField from '@/components/FormField.vue';

const props = defineProps({
    form: Object,
    gender: Object,
    relations: Object,
});

const addFamilyMember = () => {
    props.form.family.push({
        first_name: '',
        last_name: '',
        middle_name: '',
        nickname: '',
        birth_date: '',
        gender: '',
        relation: '',
    });
};

const removeFamilyMember = (index) => {
    props.form.family.splice(index, 1);
};

const computeAge = (birthDate) => {
    if (!birthDate) return '';
    try {
        return differenceInYears(new Date(), parseISO(birthDate));
    } catch {
        return '';
    }
};
</script>
