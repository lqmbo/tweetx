<script setup>
import { Head, Link } from '@inertiajs/vue3';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue'
import DropdownLink from '@/Components/DropdownLink.vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});
// const show = ref(false);


</script>

<template>

    <Head title="Welcome" />
    <
    <div>
        <div class="flex items-center justify-between md:max-w-7xl md:m-auto p-2">
            <div>
                <Link>
                <ApplicationLogo class="w-16 h-16" />
                </Link>
            </div>
            <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
                <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                Dashboard
                </Link>

                <template v-else>
                    <Link :href="route('login')"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                    Log in
                    </Link>

                    <Link v-if="canRegister" :href="route('register')"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                    Register
                    </Link>
                </template>
            </nav>
        </div>
        <main>
            <div class="md:max-w-7xl md:m-auto p-2">
                <div class="flex-col items-center text-center">
                    <h1 class="text-5xl py-6">
                        Just an example page.
                    </h1>
                    <p class="py-6 text-xl">
                        Not thinking of really styling this.
                    </p>
                    <div class="flex justify-center mt-10">
                        <h1 class="text-3xl">
                            May be will add just some
                        </h1>
                        <div class="pt-1 pl-2 ">
                            <!-- <button class="block"@click="show = !show">...</button> -->
                            <!-- <StupidComponent class="-translate-y-7 pl-2" v-show="show" /> -->
                            <Dropdown align="right" width="48">
                                <template #trigger>
                                    <span class="inline-flex rounded-md">
                                        <button type="button"
                                            class="inline-flex text-2xl items-center px-3 py-2 border border-transparent leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                            ...
                                        </button>
                                    </span>
                                </template>
                                <template #content>
                                    <DropdownLink :href="route('about')">
                                        About
                                    </DropdownLink>
                                    <DropdownLink :href="route('contact')">
                                        Contact
                                    </DropdownLink>
                                </template>
                            </Dropdown>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>