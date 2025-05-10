<script setup lang="ts">
const props = defineProps<{
    html: string;
}>();
</script>
<template>
    <div class="w-full">
        <div v-html="html" class="w-full"></div>
    </div>
</template>

<style></style>
