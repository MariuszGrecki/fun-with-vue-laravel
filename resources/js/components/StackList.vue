<script setup lang="ts">

export type StackItem = {
    label: string;
    purpose: string;
}

type Props = {
    stack: StackItem[];
}

defineProps<Props>();
</script>

<template>
    <section>
        <h2>Stack</h2>
        <ul>
            <li v-for="item in stack" :key="item.label">
                <strong>{{ item.label }}</strong>
                <span>{{ item.purpose }}</span>
            </li>
        </ul>
    </section>
</template>