import { defineStore } from 'pinia';

export type WorkspaceView = 'list' | 'board' | 'calendar';

export type WorkspaceSummary = {
    id: number;
    name: string;
    activeProjectCount: number;
    openTaskCount: number;
};

export const useWorkspaceStore = defineStore('workspace', {
    state: () => ({
        currentWorkspace: {
            id: 1,
            name: 'Product Team',
            activeProjectCount: 3,
            openTaskCount: 18,
        } satisfies WorkspaceSummary,
        activeView: 'board' as WorkspaceView,
    }),
    getters: {
        workspaceLabel: (state): string => `${state.currentWorkspace.name} workspace`,
    },
    actions: {
        setActiveView(view: WorkspaceView): void {
            this.activeView = view;
        },
    },
});
