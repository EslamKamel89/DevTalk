<script setup lang="ts">
import Button from '@/components/ui/button/Button.vue';
import { useCreateDiscussion } from '@/composables/useCreateDiscussion';
import { ArrowBigLeft, View } from 'lucide-vue-next';
const { toggleMarkdown, isMarkdownVisible } = useCreateDiscussion();
</script>
<template>
    <Button variant="ghost" @click="toggleMarkdown" type="button">
        <View v-if="!isMarkdownVisible" />
        <ArrowBigLeft v-else />
        {{ isMarkdownVisible ? 'Back' : 'Preview' }}
    </Button>
</template>
