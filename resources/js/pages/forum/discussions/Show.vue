<script setup lang="ts">
import DiscussionCard from '@/components/forum/discussions/DiscussionCard.vue';
import PostCard from '@/components/forum/discussions/PostCard.vue';
import PaginationComp from '@/components/shared/PaginationComp.vue';
import Side from '@/components/shared/Side.vue';
import { useCreatePost } from '@/composables/useCreatePost';
import ForumLayout from '@/layouts/ForumLayout.vue';
import { SharedData } from '@/types';
import { Discussion, PaginationType, Post } from '@/types/types';
import scrollTo from '@/utils/scrollTo';
import { Head, usePage } from '@inertiajs/vue3';
import { onMounted, onUpdated } from 'vue';

const props = defineProps<{
    discussion: Discussion;
    posts: PaginationType<Post>;
}>();
const page = usePage<SharedData>();
onMounted(() => {
    useCreatePost().init(props.discussion);
    const postId = page.props.query.postId;
    if (!postId) return;
    scrollTo(`post-${postId}`);
});
onUpdated(() => {
    const postId = page.props.query.postId;
    if (!postId) return;
    scrollTo(`post-${postId}`);
});
</script>
<template>
    <Head :title="discussion.title" />
    <ForumLayout>
        <template #side>
            <Side :show-reply-btn="true" />
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
<style></style>
