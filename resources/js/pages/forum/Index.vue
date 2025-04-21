<script setup lang="ts">
import TopicSelector from '@/components/forum/home/filters/TopicSelector.vue';
import ForumLayout from '@/layouts/ForumLayout.vue';
import { Discussion, PaginationType } from '@/types/types';
import { Head } from '@inertiajs/vue3';

const props = defineProps<{ discussions: PaginationType<Discussion> }>();
</script>

<template>
    <Head title="Home" />

    <ForumLayout>
        <template #side>
            <div>Side content</div>
        </template>
        <div>
            <TopicSelector />
        </div>
    </ForumLayout>
</template>
