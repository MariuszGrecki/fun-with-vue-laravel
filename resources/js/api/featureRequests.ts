import { apiClient } from './client';

import type {
    ApiResponse,
    CreateFeatureRequestPayload,
    FeatureRequest,
} from '../types/api';

export async function createFeatureRequest(
    productId: number,
    payload: CreateFeatureRequestPayload,
): Promise<FeatureRequest> {
    const response = await apiClient.post<ApiResponse<FeatureRequest>>(
        `/products/${productId}/feature-requests`,
        payload,
    );

    return response.data.data;
}

export async function getFeatureRequests(
    productId: number,
): Promise<FeatureRequest[]> {
    const response = await apiClient.get<ApiResponse<FeatureRequest[]>>(
        `/products/${productId}/feature-requests`,
    );

    return response.data.data;
}

export async function getFeatureRequest(
    featureRequest: number,
): Promise<FeatureRequest> {
    const response = await apiClient.get<ApiResponse<FeatureRequest>>(
        `/feature-requests/${featureRequest}`,
    );

    return response.data.data;
}