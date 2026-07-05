<script setup lang="ts">
import { storeToRefs } from 'pinia';
import { useWorkspaceStore, type WorkspaceView } from './stores/workspace';

type StackItem = {
    label: string;
    purpose: string;
};

const workspaceStore = useWorkspaceStore();
const { activeView, currentWorkspace, workspaceLabel } = storeToRefs(workspaceStore);

const views: WorkspaceView[] = ['list', 'board', 'calendar'];

const stack: StackItem[] = [
    {
        label: 'Laravel API',
        purpose: 'Workspaces, projects, tasks, comments, roles, validation and tests.',
    },
    {
        label: 'Vue 3 + TypeScript',
        purpose: 'Typed screens, components, forms, API responses and refactors.',
    },
    {
        label: 'Pinia',
        purpose: 'Shared frontend state: current workspace, active view, filters and user context.',
    },
    {
        label: 'Docker Compose',
        purpose: 'Consistent runtime with PHP, MySQL, Redis and Mailpit.',
    },
];
</script>

<template>
    <main>
        <h1>FlowBoard</h1>
        <p>Workspace-based project management for teams, projects and tasks.</p>

        <section>
            <h2>{{ workspaceLabel }}</h2>
            <p>
                {{ currentWorkspace.activeProjectCount }} active projects,
                {{ currentWorkspace.openTaskCount }} open tasks.
            </p>

            <div>
                <button
                    v-for="view in views"
                    :key="view"
                    type="button"
                    :aria-pressed="activeView === view"
                    @click="workspaceStore.setActiveView(view)"
                >
                    {{ view }}
                </button>
            </div>
        </section>

        <section>
            <h2>Stack</h2>
            <ul>
                <li v-for="item in stack" :key="item.label">
                    <strong>{{ item.label }}</strong>
                    <span>{{ item.purpose }}</span>
                </li>
            </ul>
        </section>
    </main>
</template>
