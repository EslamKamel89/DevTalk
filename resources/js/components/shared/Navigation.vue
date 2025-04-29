<script setup lang="ts">
import { SharedData } from '@/types';
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import Button from '../ui/button/Button.vue';
const page = usePage<SharedData>();
const url = computed(() => page.url.split('?')[0]);
</script>
<template>
    <div class="mx-4">
        <nav>
            <ul class="space-y-2">
                <li>
                    <Link href="/">
                        <Button :variant="page.url == '/' ? 'secondary' : 'ghost'"> All Discussions </Button>
                    </Link>
                </li>
                <li>
                    <Link href="/?no-replies=1">
                        <Button :variant="page.props.query['no-replies'] == 1 && url == '/' ? 'secondary' : 'ghost'"> No Replies </Button>
                    </Link>
                </li>
            </ul>
        </nav>
    </div>
</template>
