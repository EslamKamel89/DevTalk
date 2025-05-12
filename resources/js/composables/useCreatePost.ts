import { SharedData } from '@/types';
import { Discussion } from '@/types/types';
import { useForm, usePage } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
import { useToaster } from './useToaster';
const page = usePage<SharedData>();
const form = useForm<{
    body: string;
    parent_id?: number;
}>({
    body: '' as string,
});
const isOpen = ref(false);
const isMarkdownVisible = ref(false);
const markdownLoading = ref(false);
const markdownPreview = ref('');
const discussion = ref<Discussion>();
const topics = computed(() => page.props.topics);
const btnTitle = computed(() => {
    return form?.body ? 'Finish & Post' : 'Add Reply';
});

const hideForm = () => {
    isOpen.value = false;
};
const showForm = () => {
    isOpen.value = true;
};
const { showToast, showGenericError } = useToaster();
const createPost = () => {
    form.post(route('posts.store', { discussion: discussion.value?.slug }), {
        onSuccess: () => {
            showToast({ title: 'Success', description: 'Post Created Successfully', type: 'success' });
            form.reset();
            hideForm();
        },
    });
};
const toggleMarkdown = async () => {
    if (isMarkdownVisible.value) {
        markdownPreview.value = '';
        isMarkdownVisible.value = !isMarkdownVisible.value;
    } else {
        isMarkdownVisible.value = !isMarkdownVisible.value;
    }
};
const init = (currentDiscussion: Discussion) => {
    discussion.value = currentDiscussion;
    form.reset();
};
export const useCreatePost = () => {
    return {
        init,
        isOpen,
        btnTitle,
        topics,
        form,
        hideForm,
        showForm,
        createPost,
        isMarkdownVisible,
        markdownPreview,
        markdownLoading,
        toggleMarkdown,
        discussion,
    };
};
