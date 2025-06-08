<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Form from './FormTemp.vue';
import { Head, router } from '@inertiajs/vue3';

defineProps({ proyecto: Object, clientes: Array });

const submit = (form) => {
  router.put(route('proyectos.update', proyecto.id), form, {
    onSuccess: () => router.visit(route('proyectos.index'))
  });
};
</script>

<template>
  <AuthenticatedLayout>
    <Head title="Editar Proyecto" />

    <div class="max-w-4xl mx-auto py-10">
      <h1 class="text-2xl font-bold mb-4">Editar Proyecto</h1>
      <Form :proyecto="proyecto" :clientes="clientes" @submit="submit" />
    </div>
  </AuthenticatedLayout>
</template>
