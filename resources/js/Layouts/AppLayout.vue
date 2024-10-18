<template>
    <div class="font-sans antialiased bg-gray-50">
        <jet-banner />

        <div class="lg:flex flex-col lg:flex-row lg:min-h-screen w-full">
            <!-- Sidebar -->
            <jet-bar-sidebar />
            <!-- End Sidebar -->

            <div class="w-full">
                <!-- Top Navbar -->
                <jet-bar-navigation-menu />
                <!-- End Top Navbar -->

                <!-- Content Container -->
                <main
                    class="flex-1 relative z-0 overflow-y-auto overflow-x-hidden py-8 focus:outline-none"
                    tabindex="0"
                >
                    <div v-if="this.$slots.header" class="py-2 px-8">
                        <!-- Flash Messages -->
                        <jet-bar-alert
                            :type="'success'"
                            :text="$page.props.flash.success"
                        />
                        <jet-bar-alert
                            :type="'danger'"
                            :text="$page.props.flash.error"
                        />
                        <!-- Title -->
                        <h1
                            class="text-lg font-bold tracking-widest text-gray-900 uppercase dark-mode:text-white"
                        >
                            <slot name="header"></slot>
                        </h1>
                        <!-- End Title -->
                    </div>
                    <!-- Replace with your content -->
                    <div>
                        <!-- Content -->
                        <div class="min-h-full px-8">
                            <slot></slot>
                        </div>
                        <!-- End Content -->
                    </div>
                    <!-- /End replace -->
                </main>
                <!-- Content Container -->
            </div>
        </div>
    </div>
</template>

<script>
// import JetApplicationMark from "@/components/ApplicationMark";
import JetApplicationMark from "@/components/ApplicationMark.vue";
import JetBanner from "@/components/Banner.vue";
import JetDropdown from "@/components/Dropdown.vue";
import JetDropdownLink from "@/components/DropdownLink.vue";
import JetBarAlert from "@/components/JetBarAlert.vue";
import JetBarNavigationMenu from "@/components/JetBarNavigationMenu.vue";
import JetBarSidebar from "@/components/JetBarSidebar.vue";
import JetNavLink from "@/components/NavLink.vue";
import JetResponsiveNavLink from "@/components/ResponsiveNavLink.vue";

export default {
    components: {
        JetBarSidebar,
        JetBarNavigationMenu,
        JetApplicationMark,
        JetBanner,
        JetDropdown,
        JetDropdownLink,
        JetNavLink,
        JetResponsiveNavLink,
        JetBarAlert,
    },
};
</script>
