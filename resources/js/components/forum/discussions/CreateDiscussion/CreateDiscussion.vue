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
import { formatError } from '@/utils/formateError';
import { MessageSquareCode, X } from 'lucide-vue-next';
import { MdEditor } from 'md-editor-v3';
import 'md-editor-v3/lib/style.css';
import CreateDiscussionHeader from './CreateDiscussionHeader.vue';
import MarkdownToolbar from './MarkdownToolbar.vue';
import PreviewMarkdown from './PreviewMarkdown.vue';
import PreviewMarkdownBtn from './PreviewMarkdownBtn.vue';
import TopicSelector from './TopicSelector.vue';
const { isOpen, btnTitle, form, hideDrawer, createDiscussion, isMarkdownVisible } = useCreateDiscussion();
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
            <form class="mx-auto h-full w-full max-w-2xl overflow-y-auto" @submit.prevent="createDiscussion">
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
                        <div>
                            <input
                                type="text"
                                v-model="form.title"
                                placeholder="Discussion Title"
                                class="h-9 w-full rounded-lg border px-4"
                                :class="{ 'border-red-500': form.errors.title }"
                            />
                            <div class="mx-4 mt-2 text-xs font-thin text-red-600" v-if="form.errors.title">{{ formatError(form.errors.title) }}</div>
                        </div>
                        <TopicSelector />
                    </div>
                    <div class="mt-4">
                        <MdEditor v-model="form.body" v-if="!isMarkdownVisible" />
                        <!--
                            <textarea
                            v-if="!isMarkdownVisible"
                            v-model="form.body"
                            class="w-full px-4 py-2 mt-2 border rounded-lg"
                            :class="{ 'border-red-500': form.errors.title }"
                            rows="3"
                            placeholder="Post Content"
                            ></textarea>
                        -->
                        <PreviewMarkdown v-else />
                        <div class="mx-4 text-xs font-thin text-red-600" v-if="form.errors.body">
                            {{ formatError(form.errors.body) }}
                        </div>
                        <div class="flex w-full items-center justify-between">
                            <MarkdownToolbar />
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
