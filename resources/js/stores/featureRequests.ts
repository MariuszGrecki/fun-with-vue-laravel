import { defineStore } from 'pinia';
import { getFeatureRequests, createFeatureRequest } from '../api/featureRequests';
import type { FeatureRequest, CreateFeatureRequestPayload } from '../types/api';

export const useFeatureRequestStore = defineStore('featureRequests', {
    state: () => ({
        requests: [] as FeatureRequest[],
        isLoading: false,
        error: null as string | null,
    }),

    getters: {
        requestCount: (state): number => state.requests.length,
    },

    actions: {
        async fetchRequests(productId: number): Promise<void> {
            this.isLoading = true;
            this.error = null;

            try {
                this.requests = await getFeatureRequests(productId);
            } catch {
                this.error = 'Nie udało się pobrać zgłoszeń.';
            } finally {
                this.isLoading = false;
            }
        },
        async createRequest(
            productId: number,
            payload: CreateFeatureRequestPayload,
        ): Promise<FeatureRequest> {
            const newFeature = await createFeatureRequest(productId, payload);
            this.requests.push(newFeature)

            return newFeature;
        }
    },
});