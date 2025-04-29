<script setup lang="ts">
import Avatars from '@/components/shared/avatars.vue';
import { Discussion } from '@/types/types';
import { Link } from '@inertiajs/vue3';
import { Pin } from 'lucide-vue-next';

const props = defineProps<{
    discussion: Discussion;
}>();
</script>
<template>
    <Link :href="route('discussions.show', discussion.slug)">
        <div class="my-2 block w-full rounded-lg border border-gray-200 bg-white p-6 shadow-sm hover:bg-gray-100">
            <div class="flex flex-row items-center">
                <div class="flex-1">
                    <div class="bg-primary mb-2 flex w-fit items-center space-x-1 rounded-lg px-3 py-1 text-sm text-white shadow">
                        <div>{{ discussion.topic.name }}</div>
                        <div class="" v-if="discussion.is_pinned"><Pin /></div>
                    </div>
                    <h5 class="text-xl font-bold tracking-tight text-gray-900">
                        {{ discussion.title }}
                    </h5>
                </div>
                <Avatars :users="discussion.particpants ?? []" />
            </div>
            <Link
                :href="route('discussions.show', discussion.slug)"
                class="line-clamp-1 cursor-pointer rounded-xl px-2 py-1 text-sm font-normal text-gray-700 hover:bg-white hover:text-black"
                >{{ discussion.first_post?.body }}</Link
            >
            <div class="flex w-full justify-end">
                <div v-if="discussion.latest_post" class="text-sm text-gray-600" :title="discussion.latest_post.created_at?.raw">
                    {{
                        `Last Post by ${discussion.latest_post?.user?.name ?? '[User Deleted]'} from ${discussion.latest_post?.created_at?.friendly}`
                    }}
                </div>
            </div>
        </div>
    </Link>
</template>
