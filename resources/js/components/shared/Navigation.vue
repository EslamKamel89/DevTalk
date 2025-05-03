<script setup lang="ts">
import { SharedData } from '@/types';
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import Button from '../ui/button/Button.vue';
const page = usePage<SharedData>();
const url = computed(() => page.url.split('?')[0]);
const btnVariant = (cond: boolean): 'default' | 'destructive' | 'outline' | 'secondary' | 'ghost' => {
    return cond ? 'secondary' : 'ghost';
};
</script>
<template>
    <div class="mx-4">
        <nav>
            <ul class="space-y-2">
                <li>
                    <Link href="/">
                        <Button :variant="btnVariant(page.url == '/')"> All Discussions </Button>
                    </Link>
                </li>
                <li>
                    <Link href="/?filter[popular]=10">
                        <Button :variant="btnVariant(page.props.query.filter?.popular == 10 && url == '/')"> Popular </Button>
                    </Link>
                </li>
                <li>
                    <Link href="/?filter[noreplies]=1">
                        <Button
                            :variant="btnVariant(page.props.query?.filter?.noreplies && page.props.query.filter['no-replies'] == 1 && url == '/')"
                        >
                            No Replies
                        </Button>
                    </Link>
                </li>
            </ul>
        </nav>
    </div>
</template>
