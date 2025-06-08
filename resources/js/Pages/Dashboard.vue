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
    <!-- Título -->
    <template #header>
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;800&display=swap" rel="stylesheet">

<h2 class="text-4xl font-extrabold text-gray-900 tracking-wide text-center font-serif">
  TecnoSoluciones <span class="text-blue-600">S.A</span>
</h2>
    </template>

    <!-- Fondo y contenedor principal -->
    <div
   class="min-h-screen bg-cover bg-center flex items-start justify-center px-4 pt-1"

  style="background-image: url('/images/imagen.jpg');"
>
  <!-- Columna de tarjetas -->
  <div class="flex flex-col items-center gap-10 mt-10">

    <!-- Tarjeta Clientes -->
    <div
      class="bg-black text-white border border-sky-600 rounded-3xl shadow-xl
             p-8 flex flex-col items-center text-center
             transition-transform transform hover:scale-105 hover:shadow-2xl duration-300 w-80"
    >
      <div class="w-16 h-16 flex items-center justify-center rounded-full bg-white text-sky-600 text-4xl shadow-md mb-5">
        👤
      </div>
      <h3 class="text-2xl font-semibold text-gray-100 mb-2">Clientes</h3>
      <p class="text-gray-300 text-base mb-6 max-w-xs">
        Gestiona la información de tus clientes desde esta sección.
      </p>
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

    <!-- Tarjeta Proyectos -->
    <div
      class="bg-black text-white border border-sky-600 rounded-3xl shadow-xl
             p-8 flex flex-col items-center text-center
             transition-transform transform hover:scale-105 hover:shadow-2xl duration-300 w-80"
    >
      <div class="w-16 h-16 flex items-center justify-center rounded-full bg-white text-indigo-600 text-4xl shadow-md mb-5">
        📁
      </div>
      <h3 class="text-2xl font-semibold text-gray-100 mb-2">Proyectos</h3>
      <p class="text-gray-300 text-base mb-6 max-w-xs">
        Visualiza y administra los proyectos asociados a los clientes.
      </p>
      <Link
        :href="route('proyectos.index')"
        class="inline-block bg-indigo-500 hover:bg-indigo-600
               text-white font-semibold py-3 px-6 rounded-xl shadow-lg
               focus:outline-none focus:ring-4 focus:ring-indigo-300
               transition-colors duration-300"
      
          >
            Ver Proyectos
          </Link>
        </div>

      </div>
    </div>
  </AuthenticatedLayout>
</template>
