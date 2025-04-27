<script setup lang="ts">
import { Post } from '@/types/types';
import { onMounted, onUnmounted, ref } from 'vue';

const props = defineProps<{
    post: Post;
}>();
const showOptions = ref(false);
const dropdownRef = ref<HTMLElement | null>(null);
function handleClickOutside(event: MouseEvent) {
    if (dropdownRef.value && !dropdownRef.value.contains(event.target as Node)) {
        showOptions.value = false;
    }
}
onMounted(() => {
    document.addEventListener('click', handleClickOutside);
});

onUnmounted(() => {
    document.removeEventListener('click', handleClickOutside);
});
</script>
<template>
    <div class="relative flex items-start gap-2.5">
        <div class="flex w-full flex-col rounded-e-xl rounded-es-xl border-gray-200 bg-gray-100 p-4 leading-1.5 dark:bg-gray-700">
            <div class="flex items-center space-x-2 rtl:space-x-reverse">
                <img class="h-8 w-8 rounded-full" :src="post.user.avatar" alt="user image" />
                <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ post.user.name }}</span>
                <span class="text-xs font-normal text-gray-500 dark:text-gray-300">{{ post.created_at.friendly }}</span>
            </div>
            <p class="py-2.5 text-sm font-normal text-gray-900 dark:text-white">
                {{ post.body }}
            </p>
            <!--
            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Delivered</span>
            -->
        </div>
        <button
            ref="dropdownRef"
            id="dropdownMenuIconButton"
            data-dropdown-toggle="dropdownDots"
            data-dropdown-placement="bottom-start"
            class="inline-flex items-center self-center rounded-lg bg-white p-2 text-center text-sm font-medium text-gray-900 hover:bg-gray-100 focus:ring-4 focus:ring-gray-50 focus:outline-none dark:bg-gray-900 dark:text-white dark:hover:bg-gray-800 dark:focus:ring-gray-600"
            type="button"
            @click="showOptions = !showOptions"
        >
            <svg
                class="h-4 w-4 text-gray-500 dark:text-gray-400"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="currentColor"
                viewBox="0 0 4 15"
            >
                <path
                    d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"
                />
            </svg>
        </button>
        <div
            v-if="showOptions"
            id="dropdownDots"
            class="absolute top-24 right-0 z-10 w-40 divide-y divide-gray-100 rounded-lg bg-white shadow-sm dark:divide-gray-600 dark:bg-gray-700"
        >
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Reply</a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Forward</a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Copy</a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete</a>
                </li>
            </ul>
        </div>
    </div>
</template>
