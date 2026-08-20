<script setup lang='ts'>

import { reactive, ref } from 'vue';
import Button from 'primevue/button';
import Dialog from 'primevue/dialog';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Tag from 'primevue/tag';
import InputText from 'primevue/inputtext';
import Textarea from 'primevue/textarea';
import { storeToRefs } from 'pinia';
import { useFeatureRequestStore } from '../stores/featureRequests';
import type {  FeatureRequestStatus , CreateFeatureRequestPayload, ValidationErrors } from '../types/api';
import { getValidationErrors } from '../api/errors';
import { useToast } from 'primevue/usetoast';
import axios from 'axios';


const featureRequestStore = useFeatureRequestStore();
const { requests, requestCount, isLoading, error } =
    storeToRefs(featureRequestStore);

const dialogVisible = ref(false);

const form = reactive<CreateFeatureRequestPayload>({
    title: '',
    description: '',
})

type TagSeverity = 'info' | 'warn' | 'success' | 'secondary';

type Props = {
    productId: number;
}

const props = defineProps<Props>();

const isSubmitting = ref(false);

const validationErrors = ref<ValidationErrors>({});

const toast = useToast();

async function submitRequest(): Promise<void> {
    validationErrors.value = {};
    isSubmitting.value = true;

    try {
        const createdRequest = await featureRequestStore.createRequest(
            props.productId,
            form,
        )

        toast.add({
            severity: 'success',
            summary: 'Zgłoszenie dodane',
            detail: createdRequest.title,
            life: 3000
        })

        Object.assign(form, {
            title: '',
            description: '',
        });

        dialogVisible.value = false;
    } catch (error: unknown) {
        const errors = getValidationErrors(error);

        if (errors) {
            validationErrors.value = errors;
            return;
        }

        throw error;
    } finally {
        isSubmitting.value = false;
    }
}

async function castVote(featureRequestId: number): Promise<void> {
    const email = prompt('Podaj swój email:');
    
    if (!email) {
        return;
    }        

    try {
        await featureRequestStore.voteForRequest(featureRequestId, { email });

        toast.add({
            severity: 'success',
            summary: 'Głos oddany',
            life: 3000,
        });
    } catch (error: unknown) {
        let detail = 'Nie udało się oddać głosu.';

        if (axios.isAxiosError(error) && error.response?.data?.message) {
            detail = error.response.data.message;
        }

        toast.add({
            severity: 'error',
            summary: 'Błąd',
            detail,
            life: 3000,
        });
    }
}


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

        <Button
            label="Dodaj zgłoszenie"
            icon="pi pi-plus"
            @click="dialogVisible = true"
        />
        
        <DataTable
            :value="requests"
            :loading="isLoading"    
        >
            <Column field="title" header="Zgłoszenie" />
            <Column field="votes_count" header="Głosy">   
                <template #body="{data}">
                    <Button
                        :label="String(data.votes_count)"
                        icon="pi pi-thumbs-up"
                        size="small"
                        @click="castVote(data.id)"
                    />
                </template>
            </Column>
            <Column header="Status">
                <template #body="{data}">
                    <Tag 
                        :value="data.status" 
                        :severity="getStatusSeverity(data.status)"
                    />
                </template>
            </Column>
        </DataTable>

        <Dialog
            v-model:visible="dialogVisible"
            modal
            header="Nowe zgłoszenie"
        >
            <div class="form-fields">
                <div class="form-field">
                    <label for="request-title">Tytuł</label>

                    <InputText
                        id="request-title"
                        v-model="form.title"
                        autocomplete="off"
                        :invalid="Boolean(validationErrors.title)"
                        aria-describedby="request-title-error"
                    />

                    <small
                        v-if="validationErrors.title"
                        id="request-title-error"
                        class="field-error"
                    >
                        {{ validationErrors.title[0] }}
                    </small>
                </div>    
                <div class="form-field">
                    <label for="request-description">Opis</label>

                    <Textarea
                        id="request-description"
                        v-model="form.description"
                        rows="5"
                        auto-resize
                        :invalid="Boolean(validationErrors.description)"
                        aria-describedby="request-description-error"
                    />

                    <small
                        v-if="validationErrors.description"
                        id="request-description-error"
                        class="field-error"
                    >
                        {{ validationErrors.description[0] }}
                    </small>
                </div>
            </div>
            <template #footer>
                <Button
                    label="Anuluj"
                    severity="secondary"
                    :disabled="isSubmitting"
                    @click="dialogVisible = false"
                />

                <Button
                    label="Dodaj"
                    icon="pi pi-check"
                    :loading="isSubmitting"
                    :disabled="isSubmitting"
                    @click="submitRequest"
                />
            </template>
        </Dialog>
    </section>
</template>

<style scoped>
.form-fields,
.form-field {
    display: grid;
    gap: 0.75rem;
}

.form-fields {
    gap: 1rem;
}

.field-error {
    color: var(--p-red-500);
}
</style>