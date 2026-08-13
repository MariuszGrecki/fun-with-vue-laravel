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
    tags?: Tag[];
    created_at: string;
};

export type Vote = {
    id: number;
    feature_request_id: number;
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