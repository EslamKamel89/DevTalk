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
import PreviewMarkdown from '@/components/forum/reply/PreviewMarkdown.vue';
import PreviewMarkdownBtn from '@/components/forum/reply/PreviewMarkdownBtn.vue';
import { useCreatePost } from '@/composables/useCreatePost';
import { formatError } from '@/utils/formateError';
import { MessageSquareCode, X } from 'lucide-vue-next';
import { MdEditor } from 'md-editor-v3';
import 'md-editor-v3/lib/style.css';
const { isOpen, btnTitle, form, hideDrawer, createPost, isMarkdownVisible } = useCreatePost();
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
            <form class="mx-auto h-full w-full max-w-2xl overflow-y-auto" @submit.prevent="createPost">
                <div class="px-2">
                    <DrawerHeader>
                        <DrawerTitle>
                            <div class="flex w-full justify-between">
                                <div>Create Reply</div>
                                <X
                                    @click="hideDrawer"
                                    class="h-9 w-9 cursor-pointer rounded-full border px-2 py-1 shadow hover:scale-110 hover:shadow-lg"
                                />
                            </div>
                        </DrawerTitle>
                        <DrawerDescription>
                            <div>Got a fix? Found a bug? Just wanna geek out? Type away!</div>
                        </DrawerDescription>
                    </DrawerHeader>
                </div>
                <div class="px-2">
                    <div class="mt-4">
                        <MdEditor v-model="form.body" v-if="!isMarkdownVisible" />

                        <PreviewMarkdown v-else />
                        <div class="mx-4 text-xs font-thin text-red-600" v-if="form.errors.body">
                            {{ formatError(form.errors.body) }}
                        </div>
                        <div class="flex w-full items-center justify-end">
                            <PreviewMarkdownBtn />
                        </div>
                    </div>
                </div>
                <DrawerFooter>
                    <div class="flex space-x-2">
                        <DrawerClose as-child>
                            <Button variant="outline" type="button"> Cancel </Button>
                        </DrawerClose>
                        <Button type="submit">Create</Button>
                    </div>
                </DrawerFooter>
            </form>
        </DrawerContent>
    </Drawer>
</template>
