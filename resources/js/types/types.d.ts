import type { User } from '@/types/index';
export interface Topic {
    id: number;
    name: string;
    slug: string;
    created_at: string;
    updated_at: string;
}
export interface PaginationType<T> {
    data: T[];
    links: Links;
    meta: Meta;
}

export interface Discussion {
    id: number;
    user_id: number;
    topic_id: number;
    title: string;
    slug: string;
    pinned_at: string;
    is_pinned: boolean;
    created_at: string;
    updated_at: string;
    topic: Topic;
    first_post?: Post;
    latest_post?: Post;
    particpants?: User[];
}

export interface Links {
    first: string;
    last: string;
    prev: string;
    next: string;
}

export interface Meta {
    current_page: number;
    from: number;
    last_page: number;
    links: Link[];
    path: string;
    per_page: number;
    to: number;
    total: number;
}

export interface Link {
    url?: string;
    label: string;
    active: boolean;
}

export interface Post {
    id: number;
    user_id: number;
    discussion_id: number;
    parent_id: any;
    body: string;
    created_at: DateTimeType;
    user: User;
}
export interface DateTimeType {
    friendly: string;
    raw: string;
}
