<script setup lang="ts">
import Button from '@/components/ui/button/Button.vue';
import { useCreateDiscussion } from '@/composables/useCreateDiscussion';
import { View } from 'lucide-vue-next';
const { toggleMarkdown, isMarkdownVisible } = useCreateDiscussion();
</script>
<template>
    <Button variant="ghost" @click="toggleMarkdown" type="button">
        Preview
        <View />
    </Button>
</template>
