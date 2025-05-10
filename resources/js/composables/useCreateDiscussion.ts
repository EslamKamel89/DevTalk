import { SharedData } from '@/types';
import { useForm, usePage } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
import { useToaster } from './useToaster';
const page = usePage<SharedData>();
const form = useForm({
    title: null as string | null,
    body: '' as string,
    topic_id: null as number | null,
});
const isOpen = ref(false);
const isMarkdownVisible = ref(false);
const markdownLoading = ref(false);
const markdownPreview = ref('');
// const btnTitle = ref<string>('Create Discussion'); // Finish & Share
const topics = computed(() => page.props.topics);
const btnTitle = computed(() => {
    return form?.title || form?.body ? 'Finish & Share' : 'Create Discussion';
});

const hideDrawer = () => {
    isOpen.value = false;
};
const { showToast, showGenericError } = useToaster();
const createDiscussion = () => {
    form.post(route('discussions.store'), {
        onSuccess: () => {
            showToast({ title: 'Success', description: 'Discussion Created Successfully', type: 'success' });
            form.reset();
            hideDrawer();
        },
    });
};
const toggleMarkdown = async () => {
    if (isMarkdownVisible.value) {
        markdownPreview.value = '';
        isMarkdownVisible.value = !isMarkdownVisible.value;
    } else {
        isMarkdownVisible.value = !isMarkdownVisible.value;
        // try {
        // const { data, execute, error } = useAxios<{ body?: string | null }>({
        //     url: route('markdown'),
        //     data: { body: form.body },
        //     method: 'POST',
        // });
        // markdownLoading.value = true;
        // await execute();
        // if (error.value) {
        //     showGenericError();
        // } else {
        //     markdownPreview.value = data.value?.body ?? '';
        // }
        // } catch (error) {
        // showGenericError();
        // } finally {
        // markdownLoading.value = false;
        // }
    }
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
        markdownLoading,
        toggleMarkdown,
    };
};
