<script setup lang="ts">
import DiscussionCard from '@/components/forum/discussions/DiscussionCard.vue';
import PostCard from '@/components/forum/discussions/PostCard.vue';
import PaginationComp from '@/components/shared/PaginationComp.vue';
import Side from '@/components/shared/Side.vue';
import { useCreatePost } from '@/composables/useCreatePost';
import ForumLayout from '@/layouts/ForumLayout.vue';
import { Discussion, PaginationType, Post } from '@/types/types';
import { Head } from '@inertiajs/vue3';
import { onMounted } from 'vue';

const props = defineProps<{
    discussion: Discussion;
    posts: PaginationType<Post>;
}>();
onMounted(() => {
    useCreatePost().init(props.discussion);
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
