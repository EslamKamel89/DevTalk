<script setup lang="ts">
import DiscussionCard from '@/components/forum/home/DiscussionCard.vue';
import TopicSelector from '@/components/forum/home/filters/TopicSelector.vue';
import Navigation from '@/components/shared/Navigation.vue';
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
            <Navigation />
        </template>
        <template #header>
            <TopicSelector />
        </template>
        <div>
            <template v-if="discussions.data.length">
                <DiscussionCard v-for="discussion in discussions.data" :key="discussion.id" :discussion />
            </template>
            <template v-else>
                <div class="mt-5 w-full text-center text-sm font-thin text-gray-500">No Results Found</div>
            </template>
            <PaginationComp :links="discussions.meta.links" />
        </div>
    </ForumLayout>
</template>
