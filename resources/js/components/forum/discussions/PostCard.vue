<script setup lang="ts">
import MarkdownLocal from '@/components/shared/MarkdownLocal.vue';
import Button from '@/components/ui/button/Button.vue';
import { useCreatePost } from '@/composables/useCreatePost';
import useUpdatePost from '@/composables/useUpdatePost';
import { SharedData } from '@/types';
import { Post } from '@/types/types';
import { router, usePage } from '@inertiajs/vue3';
import { MessageSquareQuote, Pencil, Trash2 } from 'lucide-vue-next';
import { MdEditor } from 'md-editor-v3';
import { computed } from 'vue';

const props = defineProps<{
    post: Post;
}>();
const page = usePage<SharedData>();
const user = computed(() => page.props.auth.user);
const { form, showForm } = useCreatePost();
const handleReply = () => {
    form.parent_id = props.post.id;
    showForm();
};
const { form: updateForm, handleSubmit, isEditFormVisible, toggleEditForm } = useUpdatePost(props.post);
const handleDelete = () => {
    router.delete(route('posts.destroy', { post: props.post.id }), {
        preserveScroll: true,
        preserveUrl: true,
        onBefore: () => confirm('Are you sure you want to delete this post?'),
    });
};
</script>
<template>
    <div :id="`post-${post.id}`" class="relative flex items-start gap-2.5">
        <div class="flex w-full flex-col rounded-e-xl rounded-es-xl border-gray-200 bg-gray-100 p-4 leading-1.5 dark:bg-gray-700">
            <div class="flex items-center space-x-2 rtl:space-x-reverse">
                <template v-if="post.user">
                    <img class="h-8 w-8 rounded-full" :src="post.user.avatar" alt="user image" />
                    <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ ` ${post.user.name}` }}</span>
                </template>
                <template v-else>
                    <span class="text-sm font-semibold text-gray-900 dark:text-white">[User Deleted]</span>
                </template>
                <span class="text-xs font-normal text-gray-500 dark:text-gray-300" :title="post.created_at?.raw">{{ post.created_at.friendly }}</span>
            </div>
            <p class="rounded bg-white p-2.5 text-sm font-normal text-gray-900 dark:text-white">
                <MarkdownLocal :content="post.body" :id="`post-preview-${post.id}`" v-if="!isEditFormVisible" />
                <template v-else>
                    <form @submit.prevent="handleSubmit" class="flex flex-col space-y-2">
                        <MdEditor v-model="updateForm.body" />
                        <div class="flex space-x-2">
                            <Button type="submit">Save</Button>
                            <Button type="button" variant="destructive" @click="toggleEditForm(false)">Cancel</Button>
                        </div>
                    </form>
                </template>
            </p>
        </div>
    </div>
    <template v-if="user && !isEditFormVisible">
        <div class="flex w-full justify-end space-x-3">
            <template v-if="user?.id == post.user_id">
                <Button variant="destructive" size="icon" title="Delete" @click="handleDelete" v-if="post.parent_id">
                    <Trash2 class="h-4 w-4" />
                </Button>
                <Button variant="outline" size="icon" title="Edit" @click="toggleEditForm(true)">
                    <Pencil class="h-4 w-4" />
                </Button>
            </template>
            <Button variant="default" size="icon" title="Reply" @click="handleReply">
                <MessageSquareQuote class="h-4 w-4" />
            </Button>
        </div>
    </template>
</template>
