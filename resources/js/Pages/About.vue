<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const isAboutVisible = ref(false);
const isContactVisible = ref(false);


const littleDelay = computed(() => {
    setTimeout(() => {
        isAboutVisible.value = true;
    }, 10000);

    return isAboutVisible.value;
});

const moreDelay = computed(() => {
    setTimeout(() => {
        isContactVisible.value = true;
    }, 10000);

    return isContactVisible.value;
});
</script>

<template>

    <Head title="About" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">About</h2>
        </template>
        <div>
            <div class="md:max-w-7xl md:m-auto p-2">
                <div class="flex-col items-center text-center">
                    <h1 class="text-5xl py-6">
                        This is the ugly <span class="italic text-red-500">unstyled</span> About page.
                    </h1>
                    <div class="flex justify-center mt-10">
                        <h1 class="text-3xl">
                            We plan to create a stupid place where the majority of
                            the conversations are toxic. The amout of the important information
                            would be
                            <Link :href="route('nothing')" class="text-blue-500 underline hover:no-underline">nothing
                            </Link>
                            in comparison of the crap.
                        </h1>
                    </div>
                    <div v-show="moreDelay" class="flex justify-center mt-10">
                        <h1 class="text-5xl">
                            <Link :href="route('contact')">
                            Contacts?
                            </Link>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
