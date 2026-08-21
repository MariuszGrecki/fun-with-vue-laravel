export type FeatureRequestStatus = 
    | 'open'
    | 'planned'
    | 'in_progress'
    | 'completed'
    | 'closed';

export type Tag = {
    id: number;
    name: string;
    color: string;
};

export type FeatureRequest = {
    id: number;
    title: string;
    description: string;
    status: FeatureRequestStatus;
    votes_count: number;
    tags?: Tag[];
    comments?: Comment[];
    created_at: string;
};

export type Vote = {
    id: number;
    feature_request_id: number;
    email: string;
    created_at: string;
};

export type Comment = {
    id: number;
    body: string;
    author_name: string | null;
    created_at: string;
}

export type Product = {
    id: number;
    name: string;
    slug: string;
}

export type ApiResponse<T> = {
    data: T;
};

export type ValidationErrors = Record<string, string[]>;

export type ValidationErrorResponse = {
    message: string;
    errors: ValidationErrors;
};

export type CreateFeatureRequestPayload = {
    title: string;
    description: string;
    tag_ids?: number[];
};

export type CreateVotePayload = {
    email: string;
}

export type CreateCommentPayload = {
    body: string;
    author_name: string;
    email: string;
}