<script setup lang="ts">
import { SharedData } from '@/types';
import { usePage } from '@inertiajs/vue3';
import { useWindowSize } from '@vueuse/core';
import CreateDiscussion from '../forum/discussions/CreateDiscussion/CreateDiscussion.vue';
import CreatePost from '../forum/reply/CreatePost.vue';
import MobileNavigation from './MobileNavigation.vue';
import Navigation from './Navigation.vue';

const { width, height } = useWindowSize();
const page = usePage<SharedData>();
const props = defineProps<{
    showReplyBtn?: boolean;
}>();
</script>
<template>
    <template v-if="page.props.auth.user">
        <CreatePost v-if="showReplyBtn" />
        <CreateDiscussion v-else />
    </template>
    <Navigation v-if="width >= 768" />
    <template v-else>
        <MobileNavigation />
    </template>
</template>
