<script setup lang="ts">
import AppLayout from './AppLayout.vue';
</script>
<template>
    <AppLayout class="h-full">
        <div class="w-full">
            <div class="mx-auto max-w-5xl">
                <div class="m-4 flex flex-col gap-4 md:flex-row">
                    <div class="min-h-48 w-full rounded-xl bg-white px-3 py-2 md:w-1/3">
                        <slot name="side" />
                    </div>
                    <div class="min-h-48 w-full space-y-2 md:flex-1">
                        <div class="min-h-5 w-full rounded-xl bg-white px-3 py-2 md:flex-1">
                            <slot name="header" />
                        </div>
                        <div class="min-h-48 w-full rounded-xl bg-white px-3 py-2 md:flex-1">
                            <slot />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
