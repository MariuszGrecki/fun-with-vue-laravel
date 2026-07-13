<script setup lang='ts'>
import { ref } from 'vue';
import Button from 'primevue/button';
import Dialog from 'primevue/dialog';
import InputText from 'primevue/inputtext';

import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Tag from 'primevue/tag';
import { useToast } from 'primevue/usetoast';
import { storeToRefs } from 'pinia';
import {
    useFeatureRequestStore,
    type FeatureRequest
} from '../stores/featureRequests';

const featureRequestStore = useFeatureRequestStore();
const { requests, requestCount } = storeToRefs(featureRequestStore);


const toast = useToast();


const dialogVisible = ref(false);
const newRequestTitle = ref('');

function submitRequest(): void {
    const title = newRequestTitle.value.trim();

    if (!title) {
        return;
    }

    featureRequestStore.addRequest(title);

    newRequestTitle.value = '';
    dialogVisible.value = false;
    
    toast.add({
        severity: 'success',
        summary: 'Zgłoszenie dodane',
        detail: title,
        life: 3000,
    })
}

type TagSeverity = 'info' | 'warn' | 'success';

function getStatusSeverity(status: FeatureRequest['status']): TagSeverity {
    const severityByStatus: Record<FeatureRequest['status'], TagSeverity> = {
        open: 'info',
        planned: 'warn',
        released: 'success',    
    }

    return severityByStatus[status];
}

</script>

<template>
    <section>
        <h2>Feature requests ({{ requestCount }})</h2>

        <DataTable :value="requests">
            <Column field="title" header="Zgłoszenie" />
            <Column field="votes" header="Głosy" />

            <Column header="Status">
                <template #body="{data}">
                    <Tag 
                        :value="data.status" 
                        :severity="getStatusSeverity(data.status)"
                    />
                </template>
            </Column>
        </DataTable>
        <Button
            label="Dodal zgłoszenie"
            icon="pi pi-plus"
            @click="dialogVisible = true"
        />
        <Dialog
            v-model:visible="dialogVisible"
            modal
            header="Nowe zgłoszenie"
        >
            <InputText
                v-model="newRequestTitle"
                placeholder="Tytuł zgłoszenia"
            />
            <template #footer>
                <Button
                    label="Anuluj"
                    severity="secondary"
                    @click="dialogVisible = false"
                />

                <Button
                    label="Dodaj"
                    icon="pi pi-check"
                    @click="submitRequest"
                />
            </template>
        </Dialog>
    </section>
</template>