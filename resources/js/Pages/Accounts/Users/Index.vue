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
            <!-- <TableCheckboxCell v-if="true" @checked="checked($event, item)" /> -->
            <td>
              {{ item.first_name }}
            </td>
            <td>
              {{ item.last_name }}
            </td>
            <td>
              {{ item.email }}
            </td>
            <td>
              {{ item.created_at_formatted }}
            </td>
            <td class="before:hidden lg:w-1 whitespace-nowrap">
              <BaseButtons type="justify-start lg:justify-end" no-wrap>
                <BaseButton color="info" :icon="mdiEye" small :routeName="route('accounts.users.edit', item.id)" />
                <BaseButton
                  color="danger"
                  :icon="mdiTrashCan"
                  small
                  @click="isModalDangerActive = true"
                />
              </BaseButtons>
            </td>
          </tr>
        </tbody>
      </table>
      <pagination :items="items"></pagination>
    </CardBox>

    <template v-if="items.data.length === 0">
      <SectionTitleLineWithButton :icon="mdiTableOff" title="Empty Users" />
      <CardBox>
        <CardBoxComponentEmpty />
      </CardBox>
    </template>
  </SectionMain>
</AppLayout>
</template>

<script setup>
import { mdiMonitorCellphone, mdiTableBorder, mdiTableOff, mdiGithub, mdiPlus } from '@mdi/js'
import SectionMain from '@/components/SectionMain.vue'
import NotificationBar from '@/components/NotificationBar.vue'
import TableSampleClients from '@/components/TableSampleClients.vue'
import CardBox from '@/components/CardBox.vue'
import SectionTitleLineWithButton from '@/components/SectionTitleLineWithButton.vue'
import BaseButton from '@/components/BaseButton.vue'
import CardBoxComponentEmpty from '@/components/CardBoxComponentEmpty.vue'
import AppLayout from '@/Layouts/LayoutAuthenticated.vue';
import { computed, ref } from 'vue'
import { useMainStore } from '@/stores/main'
import { mdiEye, mdiTrashCan } from '@mdi/js'
import CardBoxModal from '@/components/CardBoxModal.vue'
import TableCheckboxCell from '@/components/TableCheckboxCell.vue'
import BaseLevel from '@/components/BaseLevel.vue'
import BaseButtons from '@/components/BaseButtons.vue'
import UserAvatar from '@/components/UserAvatar.vue'
import clients from '@/components/data/clients.json'
import Pagination from '@/components/JetBarSimplePagination.vue'

const props = defineProps({
  users: {
    type: Object,
    default: () => {}
  }
})

const mainStore = useMainStore()

const items = computed(() => props.users)

const isModalActive = ref(false)

const isModalDangerActive = ref(false)

const perPage = ref(5)

const currentPage = ref(0)

const checkedRows = ref([])

const itemsPaginated = computed(() =>
  items.value.slice(perPage.value * currentPage.value, perPage.value * (currentPage.value + 1))
)

const numPages = computed(() => Math.ceil(items.value.length / perPage.value))

const currentPageHuman = computed(() => currentPage.value + 1)

const pagesList = computed(() => {
  const pagesList = []

  for (let i = 0; i < numPages.value; i++) {
    pagesList.push(i)
  }

  return pagesList
})

const remove = (arr, cb) => {
  const newArr = []

  arr.forEach((item) => {
    if (!cb(item)) {
      newArr.push(item)
    }
  })

  return newArr
}

const checked = (isChecked, client) => {
  if (isChecked) {
    checkedRows.value.push(client)
  } else {
    checkedRows.value = remove(checkedRows.value, (row) => row.id === client.id)
  }
}

const headers = ref([
  {name: 'First Name'},
  {name: 'Last Name'},
  {name: 'Email'},
  {name: 'Date Created'},
  {name: 'Action/s'},
])
</script>
