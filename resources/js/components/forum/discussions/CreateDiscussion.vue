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
import { MessageSquareCode } from 'lucide-vue-next';
import CreateDiscussionHeader from './CreateDiscussionHeader.vue';
</script>

<template>
    <Drawer>
        <DrawerTrigger as-child>
            <div class="flex w-full justify-center pt-4">
                <div class="w-full">
                    <Button variant="default" class="w-full"> Create Discussion <MessageSquareCode /></Button>
                    <Separator class="my-4 bg-black" />
                </div>
            </div>
        </DrawerTrigger>
        <DrawerContent>
            <div class="mx-auto w-full max-w-2xl">
                <div class="px-2">
                    <DrawerHeader>
                        <DrawerTitle>Create Discussion</DrawerTitle>
                        <DrawerDescription>
                            <CreateDiscussionHeader />
                        </DrawerDescription>
                    </DrawerHeader>
                </div>
                <div class="px-2">Hello world</div>
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
