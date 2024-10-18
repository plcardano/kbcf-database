<template>
    <div
        class="w-[22rem] h-screen bg-white border-r border-gray-200 overflow-y-auto"
    >
        <div class="p-6">
            <div class="flex items-center mb-8">
                <svg
                    class="w-8 h-8 mr-3 text-gray-800"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                    ></path>
                </svg>
                <Link
                    :href="route('dashboard')"
                    class="text-2xl font-semibold text-gray-900"
                    >KBCF</Link
                >
            </div>

            <nav>
                <div v-for="nav in navs" :key="nav.label" class="mb-2">
                    <div
                        :class="[
                            nav.current
                                ? 'bg-gray-800 text-gray-100'
                                : 'text-gray-800 hover:bg-gray-800 hover:text-gray-50',
                            'flex items-center justify-between p-3 rounded-md cursor-pointer',
                        ]"
                        @click="toggleDropdown(nav)"
                    >
                        <div class="flex items-center">
                            <component
                                :is="nav.icon"
                                class="w-6 h-6 mr-4"
                                :class="
                                    nav.current
                                        ? 'text-gray-50'
                                        : 'text-gray-80'
                                "
                            />
                            <Link
                                class="text-lg font-medium"
                                :href="nav.route"
                                >{{ nav.label }}</Link
                            >
                        </div>
                        <svg
                            v-if="nav.child"
                            class="w-5 h-5 transition-transform duration-200 text-gray-600"
                            :class="{
                                'transform rotate-180': nav.showDropdown,
                            }"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 9l-7 7-7-7"
                            ></path>
                        </svg>
                    </div>
                    <div v-if="nav.child && nav.showDropdown" class="mt-1">
                        <Link
                            v-for="child in nav.child"
                            :key="child.label"
                            :href="child.route"
                            :class="[
                                child.current
                                    ? 'bg-gray-800 text-gray-50'
                                    : 'text-gray-800 hover:bg-gray-800 hover:text-gray-50',
                                'flex items-center p-3 rounded-md',
                            ]"
                        >
                            <div
                                class="w-6 h-6 mr-4 flex items-center justify-center text-gray-700 rounded-full text-sm font-medium"
                            >
                                <!-- {{ getInitials(child.label) }} -->
                                <ChevronRightIcon
                                    :class="
                                        child.current
                                            ? 'text-gray-50'
                                            : 'text-gray-80'
                                    "
                                />
                            </div>
                            <span class="text-base">{{ child.label }}</span>
                        </Link>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { reactive } from "vue";
// Import icons
import {
    ChevronRightIcon,
    HomeIcon,
    UserIcon,
    UsersIcon
} from "@heroicons/vue/24/outline";

const navs = reactive([
    {
        label: "Dashboard",
        route: route("dashboard"),
        current: route().current("dashboard"),
        icon: HomeIcon,
    },
    // ADMIN
    {
        label: "Admin",
        icon: UserIcon,
        showDropdown: false, // This will be updated below if necessary
        child: [
            {
                label: "Admin Management",
                route: route("accounts.users.index"),
                current: route().current("accounts.users.*"),
            },
            {
                label: "Role Management",
                route: route("dashboard"),
                current: route().current("dashboard"),
            },
        ],
    },
    {
        label: "Individuals",
        route: route("individuals.index"),
        current: route().current("individuals.*"),
        icon: UsersIcon,
    }
]);

// Update `showDropdown` based on child item state
navs.forEach(nav => {
    if (nav.child && nav.child.some(child => child.current)) {
        nav.showDropdown = true;
    }
});

const toggleDropdown = (nav) => {
    if (nav.child) {
        nav.showDropdown = !nav.showDropdown;
    }
};
</script>
