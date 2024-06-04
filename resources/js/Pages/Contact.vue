<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const form = useForm({
    name: '',
    surname: '',
    email: '',
    number: '',
    message: '',
});

const isVisible = ref(false);
const someDelay = computed(() => {
    setTimeout(() => {
        isVisible.value = true;
    }, 10000);

    return isVisible.value;
});

</script>

<template>
    <div>

        <Head title="Contact" />
        <AuthenticatedLayout>
            <template #header>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Contact</h2>
            </template>
            <div>
                <div class="md:max-w-7xl md:m-auto p-2">
                    <div class="flex-col items-center text-center">
                        <h1 class="text-5xl py-6">
                            This is the ugly <span class="italic text-red-500">unstyled</span> Contact page.
                        </h1>
                        <div class="flex justify-center mt-10">
                            <div class="sm:w-full lg:w-1/3">
                                <form
                                    @submit.prevent="form.post(route('contactForm.store'), { onSuccess: () => form.reset() })">
                                    <label for="Name" class="flex justify-start text-lg mt-3">Name</label>
                                    <input type="text" for="name" v-model="form.name"
                                        class="block w-full mt-1 rounded-md shadow-md">
                                    <label for="Surname" class="flex justify-start text-lg mt-3"> Surname</label>
                                    <input type="text" for="surname" v-model="form.surname"
                                        class="block w-full mt-1 rounded-md shadow-md">
                                    <label for="email" class="flex justify-start text-lg mt-3">Email</label>
                                    <input type="email" for="email" v-model="form.email"
                                        class="block w-full mt-1 rounded-md shadow-md">
                                    <label for="number" class="flex justify-start text-lg mt-3">Phone Number</label>
                                    <input type="text" for="number" v-model="form.number"
                                        class="block w-full mt-1 rounded-md shadow-md">
                                    <label for="message" class="flex justify-start text-lg mt-3">Message</label>
                                    <textarea v-model="form.message"
                                        class="block w-full mt-1 rounded-md shadow-md"></textarea>
                                    <button type="submit"
                                        class="flex justify-start text-white bg-gray-900 rounded-md shadow-md mt-5 p-2">
                                        Contact Us
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div v-show="someDelay" class="flex justify-center mt-10">
                            <h1 class="text-5xl mb-5">
                                <Link :href="route('about')">
                                About?
                                </Link>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    </div>

    <!-- Create a form where ONLY LOGGED IN users can submit.  ___DONE___
    May be have it as a Pop Up (Modal.vue?) Log in/ Register. 
    Make sure the event is handled and the user recieves a notification in their menu as no email will be sent. -->
</template>
