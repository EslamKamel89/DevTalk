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

<style>
code {
    @apply leading-lose rounded-xl p-10 whitespace-pre-wrap shadow-2xl;
}

#strong1-using-the-codearrcode-helperstrong {
    @apply my-5;
}
#strongbasic-usagestrong {
    @apply my-2;
}
</style>
