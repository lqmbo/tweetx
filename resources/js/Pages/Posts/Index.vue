<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Post from '@/Components/Post.vue';
import { Head, useForm } from '@inertiajs/vue3';

defineProps(['posts']);

const form = useForm({
    message: '',
});

</script>

<template>

    <Head title="Posts" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Posts</h2>
        </template>

        <div class="py-12">
            <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
                <div class="w-full mx-auto">
                    <form @submit.prevent="form.post(route('post.store'), {onSuccess: () => form.reset()}) ">
                        <textarea 
                            v-model="form.message"
                            placeholder="What do you think?"
                            class="w-full max-h-40 text-wrap mt-2 mx-auto fit rounded-md shadow-md focus:border-gray-500 focus:ring-gray-600 word-wrap resize-none"
                            ></textarea>
                        <InputError :message="form.errors.message"/>
                        <PrimaryButton class="mt-2">Submit</PrimaryButton>
                    </form>

                    <Post 
                        v-for="post in posts"
                        :key="post.id"
                        :post="post"
                        class="mt-2"/>
                </div>
                <!-- <div v-for="post in posts"
                    :key="post.id"
                    :post="post">
                    {{ post.message }}
                </div> -->
            </div>
        </div>
    </AuthenticatedLayout>
</template>