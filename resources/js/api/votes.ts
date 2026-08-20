import { apiClient } from './client';

import type {
    ApiResponse,
    CreateVotePayload,
    Vote
} from '../types/api';

export async function voteForFeatureRequest(
    featureRequestId: number,
    payload: CreateVotePayload,
): Promise<Vote> {
    const response = await apiClient.post<ApiResponse<Vote>>(
        `/feature-requests/${featureRequestId}/votes`,
        payload,
    );

    return response.data.data;
}
