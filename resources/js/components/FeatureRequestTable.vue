<script setup lang='ts'>
import { ref } from 'vue';
import Button from 'primevue/button';
import Dialog from 'primevue/dialog';
import InputText from 'primevue/inputtext';

import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Tag from 'primevue/tag';
import { useToast } from 'primevue/usetoast';

const toast = useToast();

type FeatureRequest = {
    id: number;
    title: string;
    status: 'open' | 'planned' | 'released';
    votes: number;
}

const requests = ref<FeatureRequest[]>([
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
]);

const dialogVisible = ref(false);
const newRequestTitle = ref('');

function addRequest(): void {
    const title = newRequestTitle.value.trim();

    if (!title) {
        return;
    }

    requests.value.push({
        id: Date.now(),
        title,
        status: 'open',
        votes: 0,
    });

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
        <h2>Feature requests</h2>

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
                    @click="addRequest"
                />
            </template>
        </Dialog>
    </section>
</template>