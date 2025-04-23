<script setup lang="ts">
import DiscussionCard from '@/components/forum/discussions/DiscussionCard.vue';
import ForumLayout from '@/layouts/ForumLayout.vue';
import { Discussion } from '@/types/types';
import { Head } from '@inertiajs/vue3';

const props = defineProps<{
    discussion: Discussion;
}>();
</script>
<template>
    <Head :title="discussion.title" />
    <ForumLayout>
        <template #side>
            <div>Side Content</div>
        </template>
        <template #header>
            <DiscussionCard :discussion="discussion" />
        </template>
        <template #default>
            <div>
                {{ discussion }}
            </div>
        </template>
    </ForumLayout>
</template>
