<script setup lang="ts">
import { SharedData } from '@/types';
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import Button from '../ui/button/Button.vue';
import Separator from '../ui/separator/Separator.vue';
const page = usePage<SharedData>();
const url = computed(() => page.url.split('?')[0]);
const btnVariant = (cond: boolean): 'default' | 'destructive' | 'outline' | 'secondary' | 'ghost' => {
    return cond ? 'secondary' : 'ghost';
};
const emit = defineEmits<{
    filterSelected: [filter: string];
}>();
</script>
<template>
    <div class="mx-4">
        <nav>
            <ul class="space-y-2">
                <li>
                    <Link href="/" :preserve-state="true" @click="emit('filterSelected', '')">
                        <Button :variant="btnVariant(page.url == '/')"> All Discussions </Button>
                    </Link>
                </li>
                <li>
                    <Link href="/?filter[popular]=10" :preserve-state="true" @click="emit('filterSelected', 'Popular')">
                        <Button :variant="btnVariant(page.props.query.filter?.popular == 10 && url == '/')"> Popular </Button>
                    </Link>
                </li>
                <li>
                    <Link href="/?filter[noreplies]=1" :preserve-state="true" @click="emit('filterSelected', 'No Replies')">
                        <Button :variant="btnVariant(page.props.query?.filter?.noreplies == 1 && url == '/')"> No Replies </Button>
                    </Link>
                </li>
                <template v-if="page.props.auth.user">
                    <li>
                        <Separator />
                    </li>
                    <li>
                        <Link href="/?filter[mine]=1" :preserve-state="true" @click="emit('filterSelected', 'My Discussions')">
                            <Button :variant="btnVariant(page.props.query?.filter?.mine == 1 && url == '/')"> My Discussions </Button>
                        </Link>
                    </li>
                    <li>
                        <Link href="/?filter[participating]=1" :preserve-state="true" @click="emit('filterSelected', 'Participating')">
                            <Button :variant="btnVariant(page.props.query?.filter?.participating == 1 && url == '/')"> Participating </Button>
                        </Link>
                    </li>
                </template>
            </ul>
        </nav>
    </div>
</template>
