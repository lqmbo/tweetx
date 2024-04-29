<script setup>
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import DangerButton from './DangerButton.vue';
import InputError from '@/Components/InputError.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps(['post']);

const form = useForm({
    message: props.post.message,
});

const editing = ref(false);

</script>

<template>
    <div class="flex-space-x-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none"
            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
        </svg>
        <div class="flex-1 mt-1">
            <div class="flex justify-between items-center">
                <div class="space-x-1">
                    <span class="capitalize text-gray-900">{{ post.user.name }}</span>
                    <small class="text-gray-400">{{ new Date(post.created_at).toLocaleString() }}</small>
                    <small v-if="post.created_at !== post.updated_at">&middot; edited</small>
                </div>
                <Dropdown v-if="post.user.id === $page.props.auth.user.id">
                    <template #trigger>
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                            </svg>
                        </button>
                    </template>
                    <template #content>
                        <button
                            class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                            @click="editing = true">
                            edit
                        </button>
                        <DropdownLink :href="route('post.delete', post.id)" method="delete" as="button">
                            delete
                        </DropdownLink>
                    </template>
                </Dropdown>

            </div>
        </div>
        <p :class="{ hidden: editing }" class="mt-4 text-lg text-primary-darker">{{ post.message }}</p>
        <form v-if="editing"
            @submit.prevent="form.put(route('post.update', post.id), { onSuccess: () => editing = false })">
            <textarea v-model="form.message"
                class="mt-4 w-full focus:border-primary-violet rounded-md shadow-sm"></textarea>
            <InputError :message="form.errors.message" />
            <div class="space-x-2">
                <PrimaryButton>Save</PrimaryButton>
                <DangerButton @click="editing = false; form.reset(); form.clearErrors();">Cancel</DangerButton>
            </div>
        </form>
    </div>
</template>