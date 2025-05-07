export const formatError = (error: string) => {
    return error.replace('field ', '').replace('The ', '');
};
