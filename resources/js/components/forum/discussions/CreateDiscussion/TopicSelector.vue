<script lang="ts" setup>
import { Select, SelectContent, SelectGroup, SelectItem, SelectLabel, SelectTrigger, SelectValue } from '@/components/ui/select';
import { useCreateDiscussion } from '@/composables/useCreateDiscussion';
import { formatError } from '@/utils/formateError';
const { form, topics } = useCreateDiscussion();
</script>

<template>
    <div>
        <Select v-model="form.topic_id">
            <SelectTrigger class="h-9 w-[280px]" :class="{ '!border-red-500': form.errors.title }">
                <SelectValue placeholder="Select topic" />
            </SelectTrigger>
            <SelectContent>
                <SelectGroup>
                    <SelectLabel>Choose Your Favorite topic</SelectLabel>
                    <SelectItem :value="topic.id" v-for="topic in topics" :key="topic.id">{{ topic.name }}</SelectItem>
                </SelectGroup>
            </SelectContent>
        </Select>
        <div class="mx-4 mt-2 text-xs font-thin text-red-600" v-if="form.errors.topic_id">{{ formatError(form.errors.topic_id) }}</div>
    </div>
</template>
