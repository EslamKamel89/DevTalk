<script setup lang="ts">
import { User } from '@/types';
import { computed } from 'vue';

const props = defineProps<{
    users: User[];
}>();
const particpants = computed(() => {
    return [...(props.users ?? [])].slice(0, 3);
});
</script>
<template>
    <div class="mx-2 flex flex-col items-end">
        <div class="flex items-center -space-x-3">
            <div v-for="(user, index) in particpants" :key="user.id">
                <img
                    :src="user.avatar"
                    :alt="user.username"
                    class="h-10 w-10 rounded-full border-2 border-white"
                    :class="{
                        '!h-12 !w-12': index == 0,
                    }"
                />
            </div>
        </div>
        <div v-if="users?.length && users?.length > 3" class="text-xs text-gray-500">And {{ users.length - 3 }} more</div>
    </div>
</template>
