<template>
    <div>
        <!-- Loop through the ministry categories -->
        <div v-for="category in ministries" :key="category.id" class="mb-4">
            <!-- Category Label -->
            <label class="font-bold text-lg">{{ category.name }}</label>
            <div class="flex flex-col ml-4">
            <!-- Loop through the ministries in the category -->
                <div v-for="ministry in category.ministries" :key="ministry.id" class="mt-2">
                    <input 
                        type="checkbox" 
                        :id="'ministry-' + ministry.id"
                        v-model="localForm.selectedMinistries"
                        :value="ministry.id"
                    />
                    <label :for="'ministry-' + ministry.id" class="ml-2">{{ ministry.name }}</label>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { reactive, watch } from 'vue';

const props = defineProps({
    form: Object,
    ministries: Object
});

// Create a local copy of form
const localForm = reactive({ 
    selectedMinistries: props.form.selectedMinistries || [],
    ministry_ids: props.form.ministry_ids || []
});

// Watch the selectedMinistries array for changes
watch(() => localForm.selectedMinistries, (newSelection) => {
    // Clear ministry_ids and push selected ministry ids
    localForm.ministry_ids = newSelection;
}, { immediate: true });

// Sync the changes back to props.form
watch(() => localForm.ministry_ids, (newMinistryIds) => {
    props.form.ministry_ids = newMinistryIds;
});

</script>

<style scoped>
/* Add some basic spacing */
.ml-4 {
    margin-left: 1rem;
}
.mt-2 {
    margin-top: 0.5rem;
}
.mb-4 {
    margin-bottom: 1rem;
}
</style>
