<script lang="ts" setup>
import { Select, SelectContent, SelectGroup, SelectItem, SelectLabel, SelectTrigger, SelectValue } from '@/components/ui/select';
import { SharedData } from '@/types';
import { router, usePage } from '@inertiajs/vue3';
import { computed, ref, watch } from 'vue';
const page = usePage<SharedData>();
const topics = computed(() => page.props.topics);
const selectedTopic = ref<number>(page.props.query.filter?.topic ? parseInt(page.props.query.filter.topic) : 0);
watch(selectedTopic, (newTopicId) => {
    router.get(route('home', newTopicId ? { 'filter[topic]': newTopicId } : {}), {
        preserveState: false,
    });
});
watch(
    () => page.props.query?.filter?.topic,
    () => {
        if (!page.props?.query?.filter?.topic) {
            selectedTopic.value = 0;
        }
    },
);
</script>

<template>
    <Select v-model="selectedTopic">
        <SelectTrigger class="w-[280px]">
            <SelectValue placeholder="Select topic" />
        </SelectTrigger>
        <SelectContent>
            <SelectGroup>
                <SelectLabel>Choose Your Favorite topic</SelectLabel>
                <SelectItem :value="0">All Topics</SelectItem>
                <SelectItem :value="topic.id" v-for="topic in topics" :key="topic.id">{{ topic.name }}</SelectItem>
            </SelectGroup>
        </SelectContent>
    </Select>
</template>
