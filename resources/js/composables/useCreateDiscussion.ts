import { SharedData } from '@/types';
import { router, usePage } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
const page = usePage<SharedData>();

const isOpen = ref(false);
const title = ref<string | null>(null);
const body = ref<string | null>(null);
// const btnTitle = ref<string>('Create Discussion'); // Finish & Share
const topics = computed(() => page.props.topics);
const selectedTopic = ref<number | null>(null);
const btnTitle = computed(() => {
    return title.value || body.value ? 'Finish & Share' : 'Create Discussion';
});
const hideDrawer = () => {
    isOpen.value = false;
};
const createDiscussion = () => {
    router.post(
        route('discussions.store'),
        {
            title: title.value,
            body: body.value,
            topic_id: selectedTopic.value,
        },
        {
            onSuccess: () => {
                isOpen.value = false;
                title.value = null;
                body.value = null;
                selectedTopic.value = null;
            },
        },
    );
};
export const useCreateDiscussion = () => {
    return { isOpen, btnTitle, topics, selectedTopic, title, body, hideDrawer, createDiscussion };
};
