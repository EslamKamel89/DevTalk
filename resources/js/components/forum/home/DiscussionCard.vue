<script setup lang="ts">
import { Discussion } from '@/types/types';

defineProps<{
    discussion: Discussion;
}>();
</script>
<template>
    <div class="my-2 block w-full rounded-lg border border-gray-200 bg-white p-6 shadow-sm hover:bg-gray-100">
        <div class="flex flex-row items-center">
            <div class="flex-1">
                <div class="bg-primary w-fit rounded-lg px-3 py-1 text-sm text-white shadow">
                    {{ discussion.topic.name }}
                </div>
                <h5 class="text-xl font-bold tracking-tight text-gray-900">
                    {{ discussion.title }}
                </h5>
            </div>
            <div>Avatars</div>
        </div>
        <p class="font-normal text-gray-700">This is the first post in the discussion</p>
    </div>
</template>
