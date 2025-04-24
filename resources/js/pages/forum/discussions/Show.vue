<script setup lang="ts">
import DiscussionCard from '@/components/forum/discussions/DiscussionCard.vue';
import PaginationComp from '@/components/shared/PaginationComp.vue';
import ForumLayout from '@/layouts/ForumLayout.vue';
import { Discussion, PaginationType, Post } from '@/types/types';
import { Head } from '@inertiajs/vue3';

const props = defineProps<{
    discussion: Discussion;
    posts: PaginationType<Post>;
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
                {{ posts.data }}
            </div>
            <PaginationComp :links="posts.meta.links" />
        </template>
    </ForumLayout>
</template>
