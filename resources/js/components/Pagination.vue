<template>
  <div v-if="links.length > 3">
    <div class="flex flex-wrap -mb-1">
      <template v-for="(link, key) in links" :key="key">
        <div
          v-if="link.url === null"
          class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded"
          v-html="link.label"
        />
        <Link
          v-else
          class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-gray-200 focus:border-indigo-500 focus:text-indigo-500"
          :class="{ 'bg-gray-400': link.active }"
          :href="link.url"
        >
            <span v-html="link.label"></span>
        </Link>
      </template>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import { Link } from '@inertiajs/vue3'

export default defineComponent({
    components: {
        Link
    },
    props: {
        links: Array,
    },
})
</script>