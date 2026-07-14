<script setup lang="ts">
import { storeToRefs } from 'pinia';
import ProductSummaryCard from './components/ProductSummaryCard.vue';
import ProductViewTabs from './components/ProductViewTabs.vue';
import StackList, { type StackItem } from './components/StackList.vue';
import FeatureRequestTable from './components/FeatureRequestTable.vue';
import { useProductStore, type VoterView } from './stores/product';
import Toast from 'primevue/toast';

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
    <Toast />
    <main>
        <ProductSummaryCard
            :product="currentProduct"
            :product-label="productLabel"
        />

        <ProductViewTabs 
            :active-view="activeView"
            :views="views"
            @change-view="productStore.setActiveView"
        />

        <StackList :stack="stack"/>  

        <FeatureRequestTable v-if="activeView === 'feedback'"/>

        <section v-else-if="activeView === 'roadmap'">
            <h2>Roadmap</h2>
            <p>Tu później pokażemy elementy Now, Next, Later i Done.</p>
        </section>

        <section v-else>
            <h2>Changelog</h2>    
            <p>Tu póxniej pokażemy opublikowane aktualziacje produktu.</p>
        </section>
    </main>
</template>
