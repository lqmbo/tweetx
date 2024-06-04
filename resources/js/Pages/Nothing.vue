<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref, computed, watch } from 'vue';

const isVisible = ref(false);
const isVisible2 = ref(false);
const isNotClicked = ref(false);
const count = ref(0);

const showAfterDelay = computed(() => {
    setTimeout(() => {
        isVisible.value = true;
    }, 2000);

    return isVisible.value;
});

const showAfterDelay2 = computed(() => {
  setTimeout(() => {
    isVisible2.value = true;
  }, 3500);

  return isVisible2.value;
});

const notClicked = computed(() => {
        setTimeout(() => {
            isNotClicked.value = true;
        }, 4000);

        return isNotClicked.value;
});


</script>

<template>
    <Head title="Nothing"/>
    <div>
        <div class="md:max-w-7xl md:m-auto p-2">
            <div class="flex-col items-center text-center">
                <h1 v-show="count >= 5" class="text-5xl">
                    <Link :href="route('about')">
                    Go back?
                    </Link>
                </h1>
                <small v-show="showAfterDelay" class="text-sm">
                    told ya there is nothing here
                </small>
                <div class="flex mx-auto items-center justify-center mt-12 space-x-4">
                    <button v-show="showAfterDelay2" @click="count++" class="text-5xl">
                    {{ count }}
                    </button>
                    <p v-show="notClicked" class="text-3xl">
                        <span class="text-pink-700"><=</span> Click it
                    </p>
                </div>
                <button v-show="count >= 13" @click="count = 0" class="flex mx-auto mt-12 text-5xl text-blue-500 underline">
                    Null
                </button>
                <h1 v-show="count >= 20" class="text-6xl text-red-500">
                    just go back already!
                </h1>
            </div>
        </div>
    </div>
</template>
