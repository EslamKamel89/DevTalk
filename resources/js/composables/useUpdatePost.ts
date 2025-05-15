import { Post } from '@/types/types';
import pr from '@/utils/pr';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import { useToaster } from './useToaster';
const { showToast, showGenericError } = useToaster();

export default function useUpdatePost(oldPost: Post) {
    const form = useForm({
        body: oldPost.body,
    });
    const isEditFormVisible = ref(false);
    const toggleEditForm = (show: boolean) => {
        isEditFormVisible.value = show;
    };
    const handleSubmit = async () => {
        form.put(route('posts.update', { post: oldPost.id }), {
            onSuccess: () => {
                showToast({ title: 'Success', description: 'Post Updated Successfully', type: 'success' });
                form.reset();
                toggleEditForm(false);
            },
            preserveScroll: true,
            // preserveState: true,
            // preserveUrl: true,
            onError: (errors) => {
                pr(errors, 'useUpdatePost - error');
            },
        });
    };
    return {
        form,
        isEditFormVisible,
        toggleEditForm,
        handleSubmit,
    };
}
