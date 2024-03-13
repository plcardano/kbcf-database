<template>
<AppLayout>
  <SectionMain>
    <SectionTitleLineWithButton :icon="mdiTableBorder" title="Users" main>
      <BaseButton
        label="Create"
        color="info"
        :icon="mdiPlus"
        :routeName="route('accounts.users.create')"
      />
    </SectionTitleLineWithButton>

      <CardBox class="mb-6" has-table>
        <TabView v-model:activeIndex="activeTabIndex" @click="selectedTab">
          <TabPanel 
            v-for="tab in tabs" 
            :key="tab.name" 
            :header="tab.name" 
          />
        </TabView>
        <table>
          <thead>
            <tr>
              <template v-for="header in headers" :key="header">
                <th>{{ header.name }}</th>
              </template>
            </tr>
          </thead>
          <tbody>
            <tr v-for="item in items.data" :key="item.id">
              <td data-label="First Name">
                {{ item.first_name }}
              </td>
              <td data-label="Last Name">
                {{ item.last_name }}
              </td>
              <td data-label="Email">
                {{ item.email }}
              </td>
              <td data-label="Date Created">
                {{ item.created_at_formatted }}
              </td>
              <td class="before:hidden lg:w-1 whitespace-nowrap">
                <BaseButtons v-if="activeTab !== 'archived'" type="justify-start lg:justify-end" no-wrap>
                  <BaseButton color="info" :icon="mdiEye" small :routeName="route('accounts.users.edit', item.id)" />
                  <BaseButton
                    color="danger"
                    :icon="mdiTrashCan"
                    small
                    @click="deleteItem(item.id)"
                  />
                </BaseButtons>
                <template v-else>
                  <BaseButton 
                    color="warning" 
                    :icon="mdiRestore" 
                    small
                    @click="restoreItem(item.id)" 
                  />
                </template>
              </td>
            </tr>
          </tbody>
        </table>
        <template v-if="items.data.length === 0">
          <p class="text-center p-5">No data available.</p>
        </template>
        <pagination :items="items"></pagination>
      </CardBox>
  </SectionMain>

  <!-- DELETE MODAL -->
  <CardBoxModal 
    v-model="showDeleteModal" 
    title="Archive Item" 
    button="danger" 
    buttonLabel="Confirm" 
    has-cancel
    @confirm="processDelete"
  >
    <p>Are you sure you want to archive this item?</p>
  </CardBoxModal>

  <!-- RESTORE MODAL -->
  <CardBoxModal 
    v-model="showRestoreModal" 
    title="Restore Item" 
    button="info" 
    buttonLabel="Confirm" 
    has-cancel
    @confirm="processRestore"
  >
    <p>Are you sure you want to restore this item?</p>
  </CardBoxModal>
</AppLayout>
</template>

<script setup>
import { mdiMonitorCellphone, mdiTableBorder, mdiTableOff, mdiGithub, mdiPlus, mdiRestore } from '@mdi/js'
import SectionMain from '@/components/SectionMain.vue'
import NotificationBar from '@/components/NotificationBar.vue'
import TableSampleClients from '@/components/TableSampleClients.vue'
import CardBox from '@/components/CardBox.vue'
import SectionTitleLineWithButton from '@/components/SectionTitleLineWithButton.vue'
import BaseButton from '@/components/BaseButton.vue'
import CardBoxComponentEmpty from '@/components/CardBoxComponentEmpty.vue'
import AppLayout from '@/Layouts/LayoutAuthenticated.vue';
import { computed, ref } from 'vue'
import { mdiEye, mdiTrashCan } from '@mdi/js'
import CardBoxModal from '@/components/CardBoxModal.vue'
import TableCheckboxCell from '@/components/TableCheckboxCell.vue'
import BaseLevel from '@/components/BaseLevel.vue'
import BaseButtons from '@/components/BaseButtons.vue'
import UserAvatar from '@/components/UserAvatar.vue'
import clients from '@/components/data/clients.json'
import Pagination from '@/components/JetBarSimplePagination.vue'
import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';
import { router } from '@inertiajs/vue3';

const props = defineProps({
  users: {
    type: Object,
    default: () => {}
  }
})

const items = computed(() => props.users)
const showDeleteModal = ref(false)
const showRestoreModal = ref(false)
const activeTabIndex = ref(0)
const activeTab = ref(null)
const selectedItemId = ref(null)

const headers = ref([
  {name: 'First Name'},
  {name: 'Last Name'},
  {name: 'Email'},
  {name: 'Date Created'},
  {name: 'Action/s'},
])

const tabs = ref([
    { value: 'all', name: 'All' },
    { value: 'archived', name: 'Archived' },
]);
 
const selectedTab = () => {
  activeTab.value = tabs.value[activeTabIndex.value].value

  router.get(route('accounts.users.index'), 
    {
      tab: activeTab.value
    },
    {
      preserveState: true
    }
  )
}

const deleteItem = (itemId) => {
  selectedItemId.value = itemId
  showDeleteModal.value = true
}

const processDelete = () => {
  router.delete(route('accounts.users.archive', selectedItemId.value), 
    { preserveState: false }
  )
}

const restoreItem = (itemId) => {
  selectedItemId.value = itemId
  showRestoreModal.value = true
}

const processRestore = () => {
  router.patch(route('accounts.users.restore', selectedItemId.value), {},
    {
      onFinish: () => {
        showRestoreModal.value = false
      },
      preserveState: false
    }
  )
}



</script>
