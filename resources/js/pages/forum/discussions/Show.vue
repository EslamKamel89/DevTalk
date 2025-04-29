<script setup lang="ts">
import DiscussionCard from '@/components/forum/discussions/DiscussionCard.vue';
import PostCard from '@/components/forum/discussions/PostCard.vue';
import Navigation from '@/components/shared/Navigation.vue';
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
            <Navigation />
        </template>
        <template #header>
            <DiscussionCard :discussion="discussion" />
        </template>
        <template #default>
            <div class="space-y-5">
                <PostCard v-for="post in posts.data" :key="post.id" :post="post" />
            </div>
            <PaginationComp :links="posts.meta.links" class="mt-5" />
        </template>
    </ForumLayout>
</template>
