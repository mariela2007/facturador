<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const saludo = ref('Hola, te saludo desde el lado del cliente');
console.log(saludo.value);
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <!-- Título superior -->
    <template #header>
      <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 leading-tight mb-4">
        Dashboard
      </h2>
    </template>

    <!-- Contenedor principal con fondo -->
    <div
      class="min-h-screen bg-cover bg-center flex items-center justify-center px-4"
      style="background-image: url('/images/fondo.jpg');"
    >
      <div
        class="translate-y-[-94px] bg-gradient-to-r from-sky-200 to-sky-400 dark:from-sky-700 dark:to-sky-900
           border border-sky-600 rounded-3xl shadow-xl
           p-8 flex flex-col items-center text-center
           transition-transform transform hover:scale-105 hover:shadow-2xl duration-300"
      >
        <!-- Icono -->
        <div
          class="w-16 h-16 flex items-center justify-center rounded-full bg-white text-sky-600 text-4xl shadow-md mb-5"
        >
          👤
        </div>

        <!-- Título -->
        <h3 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-2">
          Clientes
        </h3>

        <!-- Descripción -->
        <p class="text-gray-700 dark:text-gray-300 text-base mb-6 max-w-xs">
          Gestiona la información de tus clientes desde esta sección.
        </p>

        <!-- Botón -->
        <Link
          :href="route('cliente.index')"
          class="inline-block bg-emerald-500 hover:bg-emerald-600
                 text-white font-semibold py-3 px-6 rounded-xl shadow-lg
                 focus:outline-none focus:ring-4 focus:ring-emerald-300
                 transition-colors duration-300"
        >
          Ver Clientes
        </Link>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
