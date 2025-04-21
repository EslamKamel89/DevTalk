<script lang="ts" setup>
import { Select, SelectContent, SelectGroup, SelectItem, SelectLabel, SelectTrigger, SelectValue } from '@/components/ui/select';
import { SharedData } from '@/types';
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
const page = usePage<SharedData>();
const topics = computed(() => page.props.topics);
</script>

<template>
    <Select>
        <SelectTrigger class="w-[280px]">
            <SelectValue placeholder="Select topic" />
        </SelectTrigger>
        <SelectContent>
            <SelectGroup>
                <SelectLabel>Choose Your Favorite topic</SelectLabel>
                <SelectItem :value="`all`">All Topics</SelectItem>
                <SelectItem :value="topic.slug" v-for="topic in topics" :key="topic.id">{{ topic.name }}</SelectItem>
            </SelectGroup>
        </SelectContent>
    </Select>
</template>
