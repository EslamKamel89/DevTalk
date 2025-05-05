<script setup lang="ts">
import { Button } from '@/components/ui/button';
import {
    Drawer,
    DrawerClose,
    DrawerContent,
    DrawerDescription,
    DrawerFooter,
    DrawerHeader,
    DrawerTitle,
    DrawerTrigger,
} from '@/components/ui/drawer';
import Separator from '@/components/ui/separator/Separator.vue';
// import { VisStackedBar, VisXYContainer } from '@unovis/vue';
import { useCreateDiscussion } from '@/composables/useCreateDiscussion';
import { MessageSquareCode } from 'lucide-vue-next';
import CreateDiscussionHeader from './CreateDiscussionHeader.vue';
import TopicSelector from './TopicSelector.vue';
const { isOpen, btnTitle, title, post } = useCreateDiscussion();
</script>

<template>
    <Drawer v-model:open="isOpen">
        <DrawerTrigger as-child>
            <div class="flex w-full justify-center pt-4">
                <div class="w-full">
                    <Button variant="default" class="w-full"> {{ btnTitle }} <MessageSquareCode /></Button>
                    <Separator class="my-4 bg-black" />
                </div>
            </div>
        </DrawerTrigger>
        <DrawerContent>
            <div class="mx-auto w-full max-w-2xl overflow-auto">
                <div class="px-2">
                    <DrawerHeader>
                        <DrawerTitle>Create Discussion</DrawerTitle>
                        <DrawerDescription>
                            <CreateDiscussionHeader />
                        </DrawerDescription>
                    </DrawerHeader>
                </div>
                <div class="px-2">
                    <div class="flex space-x-2">
                        <input type="text" v-model="title" placeholder="Discussion Title" class="w-full rounded-lg border px-4" />
                        <TopicSelector />
                    </div>
                    <textarea v-model="post" class="mt-2 w-full rounded-lg border px-4 py-2" rows="3" placeholder="Post Content"></textarea>
                </div>
                <DrawerFooter>
                    <div class="flex space-x-2">
                        <DrawerClose as-child>
                            <Button variant="outline"> Cancel </Button>
                        </DrawerClose>
                        <Button>Submit</Button>
                    </div>
                </DrawerFooter>
            </div>
        </DrawerContent>
    </Drawer>
</template>
