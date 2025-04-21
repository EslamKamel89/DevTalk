<script setup lang="ts">
import { Discussion } from '@/types/types';

defineProps<{
    discussion: Discussion;
}>();
</script>
<template>
    <div>
        <a href="#" class="block max-w-sm rounded-lg border border-gray-200 bg-white p-6 shadow-sm hover:bg-gray-100">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ discussion.title }}</h5>
            <p class="font-normal text-gray-700">
                Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.
            </p>
        </a>
    </div>
</template>
