<script setup lang="ts">

import Button from 'primevue/button'
import type { VoterView } from '../stores/product';

type Props = {
    activeView: VoterView;
    views: VoterView[];
}

defineProps<Props>();

const emit = defineEmits<{
    changeView: [view: VoterView];
}>();
</script>

<template>
    <section>
        <h2>Product views</h2>

        <div>
            <Button
                v-for="view in views"
                :key="view"
                type="button"
                :label="view"
                :severity="activeView === view ? undefined : 'secondary'"
                :outlined="activeView !== view"
                @click="emit('changeView', view)"
            />
        </div>
    </section>
</template>