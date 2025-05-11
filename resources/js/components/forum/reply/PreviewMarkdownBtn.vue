<script setup lang="ts">
import Button from '@/components/ui/button/Button.vue';
import { useCreatePost } from '@/composables/useCreatePost';
import { ArrowBigLeft, View } from 'lucide-vue-next';
const { toggleMarkdown, isMarkdownVisible } = useCreatePost();
</script>
<template>
    <Button variant="ghost" @click="toggleMarkdown" type="button">
        <View v-if="!isMarkdownVisible" />
        <ArrowBigLeft v-else />
        {{ isMarkdownVisible ? 'Back' : 'Preview' }}
    </Button>
</template>
