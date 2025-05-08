import { SharedData } from '@/types';
import { useForm, usePage } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
const page = usePage<SharedData>();
const form = useForm({
    title: null as string | null,
    body: null as string | null,
    topic_id: null as number | null,
});
const isOpen = ref(false);
const isMarkdownVisible = ref(false);
const markdownPreview = ref('');
// const btnTitle = ref<string>('Create Discussion'); // Finish & Share
const topics = computed(() => page.props.topics);
const btnTitle = computed(() => {
    return form?.title || form?.body ? 'Finish & Share' : 'Create Discussion';
});
const hideDrawer = () => {
    isOpen.value = false;
};
const createDiscussion = () => {
    form.post(route('discussions.store'), {
        onSuccess: () => {
            form.reset();
            hideDrawer();
        },
    });
};
const toggleMarkdown = () => {
    if (isMarkdownVisible.value) {
        markdownPreview.value = '';
    } else {
        // todo:fetch markdown
    }
    isMarkdownVisible.value = !isMarkdownVisible.value;
};
export const useCreateDiscussion = () => {
    return {
        isOpen,
        btnTitle,
        topics,
        form,
        hideDrawer,
        createDiscussion,
        isMarkdownVisible,
        markdownPreview,
        toggleMarkdown,
    };
};
