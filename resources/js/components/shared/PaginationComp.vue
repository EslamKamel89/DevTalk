<script setup lang="ts">
import { Link } from '@/types/types';
import { Link as LinkComp } from '@inertiajs/vue3';
const props = defineProps<{
    links: Link[];
}>();
</script>
<template>
    <nav v-if="links.length > 3">
        <ul class="inline-flex -space-x-px text-sm">
            <li v-for="link in links" :key="link.label">
                <LinkComp
                    v-if="link.url"
                    :href="link.url"
                    class="flex h-8 items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                    :class="{
                        '!hover:bg-blue-100 !bg-blue-600 !text-white hover:!bg-blue-800': link.active,
                    }"
                    preserve-state
                    preserve-scroll
                    >{{ link.label }}</LinkComp
                >
            </li>
        </ul>
    </nav>
</template>
