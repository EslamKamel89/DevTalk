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
        <MdPreview language="en" :id="id" :modelValue="content" />
        <MdCatalog language="en" :editorId="id" :scrollElement="scrollElement" />
    </div>
</template>
