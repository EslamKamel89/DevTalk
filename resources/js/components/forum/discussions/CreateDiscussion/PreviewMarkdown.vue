<script setup lang="ts">
import Markdown from '@/components/shared/Markdown.vue';
import { useCreateDiscussion } from '@/composables/useCreateDiscussion';

const { markdownPreview } = useCreateDiscussion();
</script>
<template>
    <div class="mx-5 mt-4"><Markdown :html="markdownPreview" /></div>
</template>
