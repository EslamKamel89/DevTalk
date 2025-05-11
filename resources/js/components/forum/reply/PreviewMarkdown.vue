<script setup lang="ts">
import MarkdownLocal from '@/components/shared/MarkdownLocal.vue';
import Skeleton from '@/components/ui/skeleton/Skeleton.vue';
import { useCreatePost } from '@/composables/useCreatePost';

const {
    markdownPreview,
    markdownLoading,
    form: { body },
} = useCreatePost();
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
