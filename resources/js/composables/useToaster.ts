import { toast } from 'vue-sonner';

const showToast = ({ title, description, type }: { title: string; description: string; type: 'success' | 'error' }) => {
    toast(title, {
        description,
        // action: {
        //     label: 'Undo',
        //     onClick: () => console.log('Undo'),
        // },
    });
};
const showGenericError = () => {
    showToast({ title: 'Error', description: 'Sorry try again later', type: 'error' });
};
export const useToaster = () => {
    return { showToast, showGenericError };
};
