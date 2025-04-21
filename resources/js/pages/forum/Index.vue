<script setup lang="ts">
import TopicSelector from '@/components/forum/home/TopicSelector.vue';
import ForumLayout from '@/layouts/ForumLayout.vue';
import { Head } from '@inertiajs/vue3';
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
