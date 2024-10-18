<template>
    <nav class="">
        <div class="mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <!-- Breadcrumb -->
                    <div class="flex items-center text-lg text-gray-500">
                        <Link
                            :href="route('dashboard')"
                            class="text-gray-600 hover:text-gray-800"
                        >
                            <HomeIcon class="w-5 h-5 mr-1" />
                        </Link>
                        <span class="mx-2">/</span>
                        <span class="font-medium text-gray-900">{{
                            $page.props.title || "Dashboard"
                        }}</span>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <!-- Notifications -->
                    <div class="relative">
                        <button
                            @click="
                                showingNotificationDropdown =
                                    !showingNotificationDropdown
                            "
                            class="text-gray-600 text-lg hover:text-gray-800 relative"
                        >
                            <BellIcon class="h-6 w-6" />
                            <span
                                class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500 ring-2 ring-white"
                            ></span>
                        </button>

                        <!-- Notifications dropdown -->
                        <div
                            v-show="showingNotificationDropdown"
                            class="absolute right-0 mt-5 w-80 bg-white rounded-lg shadow-xl border border-gray-200 overflow-hidden"
                            style="width: 20rem"
                        >
                            <!-- Notification items here -->
                            <a
                                v-for="(notification, index) in notifications"
                                :key="index"
                                href="#"
                                class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 -mx-2"
                            >
                                <img
                                    :src="notification.avatar"
                                    class="h-8 w-8 rounded-full object-cover mx-1"
                                    :alt="notification.name"
                                />
                                <p class="text-sm mx-2 flex-grow">
                                    <span class="font-bold">{{
                                        notification.name
                                    }}</span>
                                    {{ notification.action }}
                                    <span class="font-bold text-gray-600">{{
                                        notification.subject
                                    }}</span>
                                    {{ notification.time }}
                                </p>
                            </a>
                        </div>
                    </div>

                    <!-- User Dropdown -->
                    <div class="relative">
                        <button
                            @click="showingUserDropdown = !showingUserDropdown"
                            class="flex items-center text-lg font-medium text-gray-500 hover:text-gray-700 focus:outline-none transition duration-150 ease-in-out"
                        >
                            <span>LEB Admin User</span>
                            <svg
                                class="ml-2 -mr-0.5 h-4 w-4"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </button>

                        <!-- User menu dropdown -->
                        <!-- User menu dropdown -->
                        <div
                            v-show="showingUserDropdown"
                            @click.stop
                            v-click-outside="closeUserDropdown"
                            class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl border border-gray-200 z-50"
                        >
                            <Link
                                :href="route('profile.show')"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                @click="closeUserDropdown"
                            >
                                Profile
                            </Link>
                            <Link
                                :href="route('api-tokens.index')"
                                v-if="$page.props.jetstream.hasApiFeatures"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                @click="closeUserDropdown"
                            >
                                API Tokens
                            </Link>
                            <form @submit.prevent="logout">
                                <button
                                    class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100"
                                    @click="closeUserDropdown"
                                >
                                    Log Out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
import {
    BellIcon,
    CogIcon,
    HomeIcon,
    UserIcon,
} from "@heroicons/vue/24/outline";
import { Link, router } from "@inertiajs/vue3";
import { ref } from "vue";

export default {
    components: {
        Link,
        HomeIcon,
        UserIcon,
        CogIcon,
        BellIcon,
    },
    props: {
        title: String,
    },
    setup() {
        const showingNotificationDropdown = ref(false);
        const showingUserDropdown = ref(false);

        const notifications = [
            {
                avatar: "https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80",
                name: "Sara Salah",
                action: "replied on the",
                subject: "Upload Image",
                time: "2m",
            },
        ];

        const logout = () => {
            router.post(route("logout"));
        };

        const clickOutside = {
            mounted(el, binding) {
                el.clickOutsideEvent = (event) => {
                    if (!(el === event.target || el.contains(event.target))) {
                        binding.value();
                    }
                };
                document.addEventListener("click", el.clickOutsideEvent);
            },
            unmounted(el) {
                document.removeEventListener("click", el.clickOutsideEvent);
            },
        };

        return {
            showingNotificationDropdown,
            showingUserDropdown,
            notifications,
            logout,
            clickOutside,
        };
    },
};
</script>
