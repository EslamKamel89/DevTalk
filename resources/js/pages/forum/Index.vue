<script setup lang="ts">
import DiscussionCard from '@/components/forum/home/DiscussionCard.vue';
import TopicSelector from '@/components/forum/home/filters/TopicSelector.vue';
import PaginationComp from '@/components/shared/PaginationComp.vue';
import ForumLayout from '@/layouts/ForumLayout.vue';
import { Discussion, PaginationType } from '@/types/types';
import { Head } from '@inertiajs/vue3';

const props = defineProps<{ discussions: PaginationType<Discussion> }>();
</script>

<template>
    <Head title="Home" />

    <ForumLayout>
        <template #side>
            <div>Side content</div>
        </template>
        <template #header>
            <TopicSelector />
        </template>
        <div>
            <DiscussionCard v-for="discussion in discussions.data" :key="discussion.id" :discussion />
            <PaginationComp />
        </div>
    </ForumLayout>
</template>
