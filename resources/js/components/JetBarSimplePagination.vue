<template>
    <div class="bg-white px-4 py-3 my-1 flex items-center justify-between sm:px-6 w-full border-t sm:rounded-lg dark:bg-slate-900">
        <div class="hidden lg:block">
            <p class="text-sm leading-5 text-gray-700 dark:text-white">
                Showing
                <span v-if="items.total">
                    <span class="font-medium">{{ items.from  }}</span>
                    to
                    <span class="font-medium">{{ items.to }}</span>
                    of
                </span>

                <span  class="font-medium">  {{ items.total }}</span> results
            </p>
        </div>

        <div class="flex-1 flex md:justify-between lg:justify-end ">
            <Link
                v-if="items.prev_page_url"
                :href="items.prev_page_url"
                class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                preserve-scroll
            >Previous</Link>

            <button v-else class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-200 text-sm leading-5 font-medium rounded-md text-gray-300 bg-white cursor-default" disabled>
                Previous
            </button>

            <Link
                v-if="items.next_page_url"
                :href="items.next_page_url"
                class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                preserve-scroll
            >Next</Link>

            <button v-else class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-200 text-sm leading-5 font-medium rounded-md text-gray-300 bg-white cursor-default" disabled>
                Next
            </button>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/vue3';

export default {
    name: "JetBarSimplePagination",
    components: {
        Link
    }
,   props: {
        items: Object,
    },
}
</script>
