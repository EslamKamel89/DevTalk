<script setup lang="ts">
import { useAppearance } from '@/composables/useAppearance';
import { onMounted } from 'vue';
import AppLayout from './AppLayout.vue';
const { appearance, updateAppearance } = useAppearance();
onMounted(() => {
    appearance.value = 'light';
    updateAppearance('light');
});
</script>
<template>
    <AppLayout class="h-full w-full overflow-hidden">
        <div class="w-full">
            <div class="mx-auto max-w-5xl">
                <div class="m-4 flex flex-col gap-4 md:flex-row">
                    <div class="w-full rounded-xl bg-white px-3 py-2 md:w-1/4">
                        <slot name="side" />
                    </div>
                    <div class="min-h-48 space-y-2 overflow-x-hidden md:flex-1">
                        <div class="min-h-5 w-full rounded-xl bg-white px-3 py-2">
                            <slot name="header" />
                        </div>
                        <div class="min-h-48 w-full rounded-xl bg-white px-3 py-2">
                            <slot />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
