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
import { MessageSquareCode, X } from 'lucide-vue-next';
import CreateDiscussionHeader from './CreateDiscussionHeader.vue';
import TopicSelector from './TopicSelector.vue';
const { isOpen, btnTitle, title, body, hideDrawer } = useCreateDiscussion();
</script>

<template>
    <Drawer v-model:open="isOpen" :dismissible="true">
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
                        <DrawerTitle>
                            <div class="flex w-full justify-between">
                                <div>Create Discussion</div>
                                <X
                                    @click="hideDrawer"
                                    class="h-9 w-9 cursor-pointer rounded-full border px-2 py-1 shadow hover:scale-110 hover:shadow-lg"
                                />
                            </div>
                        </DrawerTitle>
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
                    <textarea v-model="body" class="mt-2 w-full rounded-lg border px-4 py-2" rows="3" placeholder="Post Content"></textarea>
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
