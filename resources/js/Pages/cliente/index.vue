<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';

const page = usePage();
console.log(page.props.clientes);
</script>

<template>
  <AuthenticatedLayout>
    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <ul>
          <li v-for="cliente in page.props.clientes" :key="cliente.id">
            {{ cliente.nombres }} {{ cliente.pri_ape }} {{ cliente.seg_ape }}
          </li>
        </ul>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
