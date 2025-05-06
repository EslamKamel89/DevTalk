import axios, { AxiosError, AxiosInstance, AxiosRequestConfig, AxiosResponse } from 'axios';
import { onUnmounted, ref } from 'vue';

const axiosInstance: AxiosInstance = axios.create({
    // baseURL: 'http://127.0.0.1:8000',
    timeout: 10000,
    headers: {
        'Content-Type': 'application/json',
        Accept: 'application/json',
        csrf: document.head.querySelector('meta[name="csrf-token"]')?.getAttribute('content'),
    },
});

axiosInstance.interceptors.response.use(
    (response: AxiosResponse) => response,
    (error: AxiosError) => {
        console.error('API Error:', error);
        return Promise.reject(error);
    },
);

export function useAxios<T = any>(config: AxiosRequestConfig) {
    const data = ref<T | null>(null);
    const error = ref<string | null>(null);
    const loading = ref<boolean>(false);
    const abortController = ref<AbortController | null>(null);

    const execute = async (configObj: AxiosRequestConfig = {}) => {
        loading.value = true;
        error.value = null;
        abortController.value = new AbortController();
        config.signal = abortController.value.signal;

        try {
            const response = await axiosInstance.request<T>({ ...config, ...configObj });
            data.value = response.data;
        } catch (err) {
            error.value = (err as AxiosError).message || 'Unknown error';
        } finally {
            loading.value = false;
        }
    };

    // Auto-fetch when the composable is used
    // watchEffect(() => {
    //     execute();
    // });

    // Cancel request when component unmounts
    onUnmounted(() => {
        abortController.value?.abort();
    });

    return { data, error, loading, execute };
}
