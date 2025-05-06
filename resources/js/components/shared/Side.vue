<script setup lang="ts">
import { SharedData } from '@/types';
import { usePage } from '@inertiajs/vue3';
import { useWindowSize } from '@vueuse/core';
import CreateDiscussion from '../forum/discussions/CreateDiscussion/CreateDiscussion.vue';
import MobileNavigation from './MobileNavigation.vue';
import Navigation from './Navigation.vue';

const { width, height } = useWindowSize();
const page = usePage<SharedData>();
</script>
<template>
    <CreateDiscussion v-if="page.props.auth.user" />
    <Navigation v-if="width >= 768" />
    <template v-else>
        <MobileNavigation />
    </template>
</template>
