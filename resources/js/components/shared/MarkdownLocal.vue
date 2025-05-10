<script setup lang="ts">
import { MdCatalog, MdPreview } from 'md-editor-v3';
import 'md-editor-v3/lib/preview.css';

const scrollElement = document.documentElement;
const props = defineProps<{
    content: string;
    id: string;
}>();
</script>
<template>
    <div class="mx-5 mt-4">
        <MdPreview :id="id" :modelValue="content" />
        <MdCatalog :editorId="id" :scrollElement="scrollElement" />
    </div>
</template>
