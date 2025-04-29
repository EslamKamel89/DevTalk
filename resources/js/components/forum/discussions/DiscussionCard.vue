<script setup lang="ts">
import Avatars from '@/components/shared/avatars.vue';
import { Discussion } from '@/types/types';
import { Link } from '@inertiajs/vue3';
import { Pin } from 'lucide-vue-next';

defineProps<{
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
                        <span class="text-sm font-thin" v-if="discussion.replies_count">
                            ( {{ `${discussion.replies_count} ${discussion.replies_count > 1 ? 'replies' : 'reply'}` }} )</span
                        >
                    </h5>
                </div>
                <Avatars :users="discussion.particpants ?? []" />
            </div>
        </div>
    </Link>
</template>
