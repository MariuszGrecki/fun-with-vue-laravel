<script setup lang="ts">
import Card from 'primevue/card';
import Tag from 'primevue/tag';
import type { ProductSummary } from '../stores/product';

type Props = {
    product: ProductSummary;
    productLabel: string;
};

defineProps<Props>();
</script>

<template>
    <Card>
        <template #title>Voter</template>
        <template #subtitle>{{ productLabel }}</template>
        <template #content>
            <p>
                Collect feedback, prioritize feature requests, publish roadmap updates
                and close the loop with users.
            </p>
            <div>
                <Tag severity="info" :value="`${product.openRequestCount} open`" />
                <Tag severity="warn" :value="`${product.plannedRequestCount} planned`" />
                <Tag severity="success" :value="`${product.releasedRequestCount} released`" />
            </div>
        </template>
    </Card>
</template>
