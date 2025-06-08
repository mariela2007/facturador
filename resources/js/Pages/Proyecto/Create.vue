<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Form from './FormTemp.vue';
import { Head, router } from '@inertiajs/vue3';


defineProps({ clientes: Array });

const submit = (form) => {
    router.post(route('proyectos.store'), form, {
        onSuccess: () => router.visit(route('proyectos.index')),
    });
};
</script>

<template>
    <AuthenticatedLayout>
        <Head title="Crear Proyecto" />

        <div class="max-w-4xl mx-auto py-14">
            <h1 class="text-3xl font-bold text-white text-center drop-shadow-[0_4px_3px_rgba(0,0,0,0.7)] drop-shadow-[0_2px_2px_rgba(0,0,0,0.6)]">Nuevo Proyecto</h1>
            <div class="mt-6"> 
            <Form :clientes="clientes" @submit="submit" />
        </div>
        </div>
    </AuthenticatedLayout>
</template>