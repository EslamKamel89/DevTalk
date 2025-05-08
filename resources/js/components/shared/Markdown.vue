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
.shiki {
    padding: 15px;
    overflow-x: auto;
    border-radius: var(--radius-xl);
    --tw-shadow: 0 25px 50px -12px var(--tw-shadow-color, rgb(0 0 0 / 0.25));
    box-shadow: var(--tw-inset-shadow), var(--tw-inset-ring-shadow), var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow);
}

#strong1-using-the-codearrcode-helperstrong {
    margin-top: 10px;
    margin-bottom: 5px;
}
#strongbasic-usagestrong {
    margin-top: 5px;
    margin-bottom: 5px;
}
</style>
