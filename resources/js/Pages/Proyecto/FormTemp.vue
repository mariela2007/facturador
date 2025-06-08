<script setup>
import { useForm } from '@inertiajs/vue3';
import { defineProps, defineEmits } from 'vue';

import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
 // opcional, si no tienes puedes usar <select> directamente

const props = defineProps({
  
clientes: Array,
  proyecto: {
    type: Object,
    default: () => ({}), // ← ¡esto es clave!
  },
  
});

const emit = defineEmits(['submit']);

const form = useForm({

nombre: props.proyecto.nombre || '',
  cliente_id: props.proyecto.cliente_id || '',
  fecha_inicio: props.proyecto.fecha_inicio || '',
  fecha_fin: props.proyecto.fecha_fin || '',
});

const submitForm = () => {
  emit('submit', form);
};
</script>

<template>
 <div 
    class="min-h-screen bg-cover bg-center bg-no-repeat"
    style="background-image: url('/images/imagen.jpg');"
  >
    <div class="mx-auto max-w-2xl bg-black bg-opacity-90 rounded-lg shadow-xl p-8 text-white">


  <form @submit.prevent="submitForm" class="space-y-6">
    
    <!-- Nombre del Proyecto -->
    <div>
      <InputLabel for="nombre" value="Nombre del Proyecto" class="text-white" />
      <TextInput id="nombre" v-model="form.nombre" class="shadow appearance-none border rounded w-full py-2 px-3 text-white bg-gray-800 leading-tight focus:outline-none focus:shadow-outline" />
      <InputError :message="form.errors.nombre" />
    </div>

    <!-- Cliente -->
    <div>
      <InputLabel for="cliente_id" value="Cliente" class="text-white" />
      <select
        id="cliente_id"
        v-model="form.cliente_id"
        class="shadow appearance-none border rounded w-full py-2 px-3 text-white bg-gray-800 leading-tight focus:outline-none focus:shadow-outline"
      >
        <option value="">-- Seleccionar Cliente --</option>
        <option v-for="cliente in clientes" :key="cliente.id" :value="cliente.id">
          {{ cliente.nombres }}
        </option>
      </select>
      <InputError :message="form.errors.cliente_id" />
    </div>

    <!-- Fecha de Inicio -->
    <div>
      <InputLabel for="fecha_inicio" value="Fecha de Inicio" class="text-white" />
      <TextInput
        id="fecha_inicio"
        type="date"
        v-model="form.fecha_inicio"
        class="shadow appearance-none border rounded w-full py-2 px-3 text-white bg-gray-800 leading-tight focus:outline-none focus:shadow-outline"
      />
      <InputError :message="form.errors.fecha_inicio" />
    </div>

    <!-- Fecha de Fin -->
    <div>
      <InputLabel for="fecha_fin" value="Fecha de Fin" class="text-white" />
      <TextInput
        id="fecha_fin"
        type="date"
        v-model="form.fecha_fin"
        class="shadow appearance-none border rounded w-full py-2 px-3 text-white bg-gray-800 leading-tight focus:outline-none focus:shadow-outline"
      />
      <InputError :message="form.errors.fecha_fin" />
    </div>

    <!-- Botón de enviar -->
    <div class="pt-4">
      <button
        type="submit"
        class="bg-black border-4 border-green-500 text-white font-semibold px-6 py-3 rounded-lg shadow-md
         hover:bg-green-600 hover:border-green-700
         active:bg-green-700 active:border-green-800
         transition duration-300 ease-in-out"
      >
        Guardar Proyecto
      </button>
    </div>

  </form>

</div>
  </div>

</template>
