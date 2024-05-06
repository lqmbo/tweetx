<script setup>
import { useForm, usePage, router } from '@inertiajs/vue3';
import { ref } from 'vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const form = useForm({
    image: null
});

</script>

<template>
    <section>

        <header>
            <h2 class="text-lg font-medium text-gray-900">Profile Picture</h2>

            <p class="mt-1 text-sm text-gray-600">
                Update your account's Picture.
            </p>
        </header>

        <form @submit.prevent="form.patch(route('image.update', image))" enctype="multipart/form-data" class="mt-6 space-y-6">
            <div>
                <InputLabel value="Image" />
                <input 
                    type="file"
                    id="image"
                    name="image"
                    ref="image"
                    @change="form.data.image = $event.target.files[0]; console.log(form.data.image);"
                    ></input>
                <InputError :message="form.errors.image"/>
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                <Transition enter-active-class="transition ease-in-out" enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out" leave-to-class="opacity-0">
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                </Transition>
            </div>
        </form>
    </section>

</template>