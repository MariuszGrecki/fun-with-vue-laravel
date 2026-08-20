import { defineStore } from 'pinia';
import { getFeatureRequests, createFeatureRequest } from '../api/featureRequests';
import type { FeatureRequest, CreateFeatureRequestPayload, CreateVotePayload } from '../types/api';
import { voteForFeatureRequest } from '../api/votes';

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
        },
        async voteForRequest(
            FeatureRequestId: number,
            payload: CreateVotePayload,
        ): Promise<void> {
            const request = this.requests.find((r) => r.id === FeatureRequestId);

            if (!request) {
                return;
            }

            const previousVotesCount = request.votes_count;

            request.votes_count++;

            try {
                await voteForFeatureRequest(FeatureRequestId, payload);
            } catch (error) {
                request.votes_count = previousVotesCount;
                throw error;
            }
        }
    },
});