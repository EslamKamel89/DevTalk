<script lang="ts" setup>
import { Select, SelectContent, SelectGroup, SelectItem, SelectLabel, SelectTrigger, SelectValue } from '@/components/ui/select';
import { useCreateDiscussion } from '@/composables/useCreateDiscussion';
const { selectedTopic, topics } = useCreateDiscussion();
</script>

<template>
    <Select v-model="selectedTopic">
        <SelectTrigger class="w-[280px]">
            <SelectValue placeholder="Select topic" />
        </SelectTrigger>
        <SelectContent>
            <SelectGroup>
                <SelectLabel>Choose Your Favorite topic</SelectLabel>
                <SelectItem :value="topic.id" v-for="topic in topics" :key="topic.id">{{ topic.name }}</SelectItem>
            </SelectGroup>
        </SelectContent>
    </Select>
</template>
