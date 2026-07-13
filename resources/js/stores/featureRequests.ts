import { defineStore } from 'pinia';

export type FeatureRequestStatus = 'open' | 'planned' | 'released';

export type FeatureRequest = {
    id: number;
    title: string;
    status: FeatureRequestStatus;
    votes: number;
}

export const useFeatureRequestStore = defineStore('featureRequests', {
    state: () => ({
        requests: [
            {
                id: 1,
                title: 'Eksport raportu do CSV',
                status: 'open',
                votes: 24,
            },
            {
                id: 2,
                title: 'Tryb ciemny',
                status: 'planned',
                votes: 17,
            },
            {
                id: 3,
                title: 'Powiadomienia email',
                status: 'released',
                votes: 12,
            },
        ] as FeatureRequest[],
    }),

    getters: {
        requestCount: (state): number=> state.requests.length,
    },

    actions: {
        addRequest(title: string): void {
            this.requests.push({
                id: Date.now(),
                title,
                status: 'open',
                votes: 0
            })
        }
    }
})