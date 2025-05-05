import { SharedData } from '@/types';
import { usePage } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
const page = usePage<SharedData>();

const isOpen = ref(false);
// const btnTitle = ref<string>('Create Discussion'); // Finish & Share
const topics = computed(() => page.props.topics);
const selectedTopic = ref<number>();
const btnTitle = computed(() => {
    return selectedTopic.value ? 'Finish & Share' : 'Create Discussion';
});
export const useCreateDiscussion = () => {
    return { isOpen, btnTitle, topics, selectedTopic };
};
