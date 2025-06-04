<script setup>
import { router } from '@inertiajs/vue3'

const eliminarCliente = (id) => {
  if (confirm('¿Estás seguro de eliminar este cliente?')) {
    router.delete(route('cliente.destroy', id), {
      onSuccess: () => {
        // Opcional: puedes mostrar un mensaje o actualizar la UI
        console.log('Cliente eliminado correctamente');
      },
      onError: () => {
        console.log('Error al eliminar cliente');
      }
    })
  }
}
</script>

<template>
  <button @click="eliminarCliente(cliente.id)">Eliminar</button>
</template>