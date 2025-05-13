import { nextTick } from 'vue';

export default function scrollTo(id: string) {
    nextTick(() => {
        const element = document.getElementById(id);
        if (element) {
            element.scrollIntoView({
                behavior: 'smooth',
                // block: 'center',
                // inline: 'start',
            });
        }
    });
}
