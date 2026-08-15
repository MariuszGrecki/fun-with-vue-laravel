<script setup lang='ts'>

import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Tag from 'primevue/tag';
import { storeToRefs } from 'pinia';
import { useFeatureRequestStore } from '../stores/featureRequests';
import type { FeatureRequestStatus } from '../types/api';

const featureRequestStore = useFeatureRequestStore();
const { requests, requestCount, isLoading, error } =
    storeToRefs(featureRequestStore);


type TagSeverity = 'info' | 'warn' | 'success' | 'secondary';

function getStatusSeverity(
    status: FeatureRequestStatus,
): TagSeverity {
    const severityByStatus: Record<FeatureRequestStatus, TagSeverity> = {
        open: 'info',
        planned: 'warn',
        in_progress: 'warn',
        completed: 'success',
        closed: 'secondary',
    };

    return severityByStatus[status];
}

</script>

<template>
    <section>
        <h2>Feature requests ({{ requestCount }})</h2>

        <p v-if="error">{{ error }}</p>
        
        <DataTable
            :value="requests"
            :loading="isLoading"    
        >
            <Column field="title" header="Zgłoszenie" />
            <Column field="votes_count" header="Głosy" />   
            <Column header="Status">
                <template #body="{data}">
                    <Tag 
                        :value="data.status" 
                        :severity="getStatusSeverity(data.status)"
                    />
                </template>
            </Column>
        </DataTable>
    </section>
</template>