<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';


const form = useForm({
    nombres: '',
    pri_ape: '',
    seg_ape: '',
    genero: '',
    docu_num: '',
    docu_tip: '',
    telefono: '',
    direccion: ''
})

const page = usePage()
//const success = computed(() => page.props.flash.success) 
//console.log('success: ',success);


const createCliente = () => {
    //console.log('valores clientes:', form);

    form.post(route('cliente.store'), {
        onSuccess: (response) => {
            console.log('Respondiendo desde el lado del servidor',response);
        }
    })
}

</script>

<template>
    <AuthenticatedLayout>
        <div
  class="py-12 min-h-screen bg-cover bg-center bg-no-repeat"
  style="background-image: url('/images/imagen.jpg');"
>



        <div class="py-0">
  <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
    <form @submit.prevent="createCliente" class="bg-black shadow-md rounded px-8 pt-6 pb-8 mb-4">
      
      <div class="mb-4">
        <label class="block text-white text-sm font-bold mb-2" for="username">
          Nombres
        </label>
        <input 
          type="text"
          v-model="form.nombres"
          class="shadow appearance-none border rounded w-full py-2 px-3 text-white bg-gray-800 leading-tight focus:outline-none focus:shadow-outline"
          required
          autocomplete="off"
        >
      </div>

      <div class="mb-4">
        <label class="block text-white text-sm font-bold mb-2">
          Apellido Paterno
        </label>
        <input 
          type="text"
          v-model="form.pri_ape"
          class="shadow appearance-none border rounded w-full py-2 px-3 text-white bg-gray-800 leading-tight focus:outline-none focus:shadow-outline"
          required
          autocomplete="off"
        >
      </div>

      <div class="mb-4">
        <label class="block text-white text-sm font-bold mb-2">
          Apellido Materno
        </label>
        <input 
          type="text"
          v-model="form.seg_ape"
          class="shadow appearance-none border rounded w-full py-2 px-3 text-white bg-gray-800 leading-tight focus:outline-none focus:shadow-outline"
          required
          autocomplete="off"
        >
      </div>

      <div class="mb-4">
        <label class="block text-white text-sm font-bold mb-2">
          Género
        </label>
        <select 
          v-model="form.genero"
          class="shadow appearance-none border rounded w-full py-2 px-3 text-white bg-gray-800 leading-tight focus:outline-none focus:shadow-outline"
        >
          <option disabled value="">Selecciona</option>
          <option value="Masculino">Masculino</option>
          <option value="Femenino">Femenino</option>
          <option value="Otro">Otro</option>
        </select>
      </div>

      <div class="mb-4">
        <label class="block text-white text-sm font-bold mb-2">
          Tipo de Documento
        </label>
        <select 
          v-model="form.docu_tip"
          class="shadow appearance-none border rounded w-full py-2 px-3 text-white bg-gray-800 leading-tight focus:outline-none focus:shadow-outline"
          required
        >
          <option value="">Seleccione</option>
          <option value="DNI">DNI</option>
          <option value="CE">Carnet Extranjería</option>
          <option value="RUC">RUC</option>
        </select>
      </div>

      <div class="mb-4">
        <label class="block text-white text-sm font-bold mb-2">
          Número de Documento
        </label>
        <input 
          type="text"
          v-model="form.docu_num"
          class="shadow appearance-none border rounded w-full py-2 px-3 text-white bg-gray-800 leading-tight focus:outline-none focus:shadow-outline"
          required
          autocomplete="off"
        >
      </div>

      <div class="mb-4">
        <label class="block text-white text-sm font-bold mb-2" for="telefono">
          Teléfono
        </label>
        <input 
          type="text"
          v-model="form.telefono"
          class="shadow appearance-none border rounded w-full py-2 px-3 text-white bg-gray-800 leading-tight focus:outline-none focus:shadow-outline"
          autocomplete="off"
        >
      </div>

      <div class="mb-4">
        <label class="block text-white text-sm font-bold mb-2" for="direccion">
          Dirección
        </label>
        <input 
          type="text"
          v-model="form.direccion"
          class="shadow appearance-none border rounded w-full py-2 px-3 text-white bg-gray-800 leading-tight focus:outline-none focus:shadow-outline"
          autocomplete="off"
        >
      </div>

      <div class="mb-4">
        <button type="submit" class="bg-black border-4 border-green-500 text-white font-semibold px-6 py-3 rounded-lg shadow-md
         hover:bg-green-600 hover:border-green-700
         active:bg-green-700 active:border-green-800
         transition duration-300 ease-in-out">
          Guardar
        </button>
      </div>

    </form>
  </div>
</div>
 </div>
    </AuthenticatedLayout>
</template>