<script setup lang="ts">
import MarkdownLocal from '@/components/shared/MarkdownLocal.vue';
import Skeleton from '@/components/ui/skeleton/Skeleton.vue';
import { useCreateDiscussion } from '@/composables/useCreateDiscussion';

const {
    markdownPreview,
    markdownLoading,
    form: { body },
} = useCreateDiscussion();
</script>
<template>
    <div class="mx-5 mt-4">
        <template v-if="!markdownLoading">
            <MarkdownLocal :content="body ?? ''" id="create-discussion-markdown-preview" />
        </template>
        <!--
            <Markdown v-if="!markdownLoading" :html="markdownPreview" />
        -->
        <Skeleton v-else class="h-56 w-full animate-pulse" />
    </div>
</template>
