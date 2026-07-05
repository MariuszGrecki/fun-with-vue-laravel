<script setup lang="ts">
import { storeToRefs } from 'pinia';
import Button from 'primevue/button';
import Card from 'primevue/card';
import Tag from 'primevue/tag';
import { useProductStore, type VoterView } from './stores/product';

type StackItem = {
    label: string;
    purpose: string;
};

const productStore = useProductStore();
const { activeView, currentProduct, productLabel } = storeToRefs(productStore);

const views: VoterView[] = ['feedback', 'roadmap', 'changelog'];

const stack: StackItem[] = [
    {
        label: 'Laravel API',
        purpose: 'Organizations, products, feature requests, votes, comments, roadmap and changelog.',
    },
    {
        label: 'Vue 3 + TypeScript',
        purpose: 'Typed admin screens, public board, widgets and API responses.',
    },
    {
        label: 'Pinia',
        purpose: 'Shared state: current product, active view, filters and user context.',
    },
    {
        label: 'PrimeVue + Aura',
        purpose: 'Ready UI components and a consistent visual theme without custom CSS-first work.',
    },
    {
        label: 'PostgreSQL',
        purpose: 'Relational data for SaaS organizations, feedback, votes and changelog sync.',
    },
];
</script>

<template>
    <main>
        <Card>
            <template #title>Voter</template>
            <template #subtitle>{{ productLabel }}</template>
            <template #content>
                <p>
                    Collect feedback, prioritize feature requests, publish roadmap updates
                    and close the loop with users.
                </p>

                <div>
                    <Tag severity="info" :value="`${currentProduct.openRequestCount} open`" />
                    <Tag severity="warn" :value="`${currentProduct.plannedRequestCount} planned`" />
                    <Tag severity="success" :value="`${currentProduct.releasedRequestCount} released`" />
                </div>
            </template>
        </Card>

        <section>
            <h2>Product views</h2>
            <div>
                <Button
                    v-for="view in views"
                    :key="view"
                    type="button"
                    :label="view"
                    :severity="activeView === view ? 'primary' : 'secondary'"
                    @click="productStore.setActiveView(view)"
                />
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
