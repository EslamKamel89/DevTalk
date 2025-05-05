<script setup lang="ts">
import { useWindowSize } from '@vueuse/core';
import CreateDiscussion from '../forum/discussions/CreateDiscussion.vue';
import MobileNavigation from './MobileNavigation.vue';
import Navigation from './Navigation.vue';

const { width, height } = useWindowSize();
</script>
<template>
    <CreateDiscussion />
    <Navigation v-if="width >= 768" />
    <template v-else>
        <MobileNavigation />
    </template>
</template>
