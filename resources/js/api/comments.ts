import { apiClient } from './client';

import type {
    ApiResponse,
    CreateCommentPayload,
    Comment,
} from '../types/api';

export async function createComment(
    featureRequest: number,
    payload: CreateCommentPayload,
): Promise<Comment> {
    const response = await apiClient.post<ApiResponse<Comment>>(
        `/feature-requests/${featureRequest}/comments`,
        payload,
    );

    return response.data.data;
}
