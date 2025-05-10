<script setup lang="ts">
import Markdown from '@/components/shared/Markdown.vue';
import Skeleton from '@/components/ui/skeleton/Skeleton.vue';
import { useCreateDiscussion } from '@/composables/useCreateDiscussion';

const { markdownPreview, markdownLoading } = useCreateDiscussion();
</script>
<template>
    <div class="mx-5 mt-4">
        <Markdown v-if="!markdownLoading" :html="markdownPreview" />
        <Skeleton v-else class="h-56 w-full animate-pulse" />
    </div>
</template>
