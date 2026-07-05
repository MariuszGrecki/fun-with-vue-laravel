import { defineStore } from 'pinia';

export type VoterView = 'feedback' | 'roadmap' | 'changelog';

export type ProductSummary = {
    id: number;
    name: string;
    openRequestCount: number;
    plannedRequestCount: number;
    releasedRequestCount: number;
};

export const useProductStore = defineStore('product', {
    state: () => ({
        currentProduct: {
            id: 1,
            name: 'Acme SaaS',
            openRequestCount: 24,
            plannedRequestCount: 7,
            releasedRequestCount: 12,
        } satisfies ProductSummary,
        activeView: 'feedback' as VoterView,
    }),
    getters: {
        productLabel: (state): string => `${state.currentProduct.name} feedback portal`,
    },
    actions: {
        setActiveView(view: VoterView): void {
            this.activeView = view;
        },
    },
});
