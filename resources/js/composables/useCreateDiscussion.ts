import { SharedData } from '@/types';
import { usePage } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
const page = usePage<SharedData>();

const isOpen = ref(false);
const title = ref<string | null>(null);
const post = ref<string | null>(null);
// const btnTitle = ref<string>('Create Discussion'); // Finish & Share
const topics = computed(() => page.props.topics);
const selectedTopic = ref<number>();
const btnTitle = computed(() => {
    return title.value || post.value ? 'Finish & Share' : 'Create Discussion';
});
export const useCreateDiscussion = () => {
    const hideDrawer = () => {
        isOpen.value = false;
    };
    return { isOpen, btnTitle, topics, selectedTopic, title, post, hideDrawer };
};
