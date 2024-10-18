<template>
    <CardBox>
        <TabView v-model:activeIndex="activeTabIndex" @click="selectedTab">
            <TabPanel 
                v-for="tab in tabs" 
                :key="tab.name" 
                :header="tab.name" 
            />
        </TabView>


        <BasicInformation 
            v-if="activeTab === 1" 
            :form="form" 
            :gender="gender" 
            :civilStatuses="civilStatuses" 
            :statuses="statuses"
            :types="types"
        />

        <FamilyInformation 
            v-if="activeTab === 2" 
            :form="form" 
            :gender="gender" 
            :relations="relations"
        />

        <DiscipleshipInvolvement 
            v-if="activeTab === 3" 
            :form="form" 
            :individuals="individuals"
        />

        <template #footer>
            <BaseButtons>
                <BaseButton v-if="activeTab > 1" @click="previousPage" type="button" color="info" outline label="Previous" />
                <BaseButton @click="nextPage" type="button" color="info" outline label="Next" />
            </BaseButtons>
        </template>
    </CardBox>
</template>

<script setup>
import BaseButton from '@/components/BaseButton.vue'
import BaseButtons from '@/components/BaseButtons.vue'
import CardBox from '@/components/CardBox.vue'
import TabPanel from 'primevue/tabpanel'
import TabView from 'primevue/tabview'
import { ref } from 'vue'
import BasicInformation from './components/BasicInformation.vue'
import DiscipleshipInvolvement from './components/DiscipleshipInvolvement.vue'
import FamilyInformation from './components/FamilyInformation.vue'

const props = defineProps({
    form: {
        type: Object,
        default: () => {}
    },
    civilStatuses: Object,
    gender: Object,
    statuses: Object,
    types: Object,
    relations: Object,
    individuals: Object
})

const form = ref(props.form);
const activeTabIndex = ref(0)
const activeTab = ref(1)

const tabs = ref([
    { value: 1, name: 'Basic Information' },
    { value: 2, name: 'Family Information' },
    { value: 3, name: 'Discipleship Involvement' },
]);

const selectedTab = () => {
    activeTab.value = tabs.value[activeTabIndex.value].value
}

const previousPage = () => {
    activeTab.value--
    activeTabIndex.value--
}

const nextPage = () => {
    activeTab.value++
    activeTabIndex.value++
}

</script>