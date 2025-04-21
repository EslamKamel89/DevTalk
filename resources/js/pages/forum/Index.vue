<script setup lang="ts">
import ForumLayout from '@/layouts/ForumLayout.vue';
import { SharedData } from '@/types';
import { Head, usePage } from '@inertiajs/vue3';
const page = usePage<SharedData>();
</script>

<template>
    <Head title="Home" />

    <ForumLayout>
        <template #side>
            <div>Side content</div>
        </template>
        <div>
            <div>{{ page.props.topics }}</div>
        </div>
    </ForumLayout>
</template>
