<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';

const page = usePage();

const descargarPdf = () => {
    window.open(route('cliente.exportarPdf'), '_blank');
};

const eliminarCliente = (id) => {
    if (confirm('¿Estás seguro de eliminar este cliente?')) {
        router.delete(route('cliente.destroy', id));
    }
};
</script>

<template>
    <AuthenticatedLayout>
        <Head title="Lista de Clientes" />

        <div
        class="py-12 min-h-screen bg-cover bg-center bg-no-repeat" 
    style="background-image: url('/images/imagen.jpg');" >
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Header y botones -->
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-3xl font-bold text-white drop-shadow-[0_4px_3px_rgba(0,0,0,0.7)] drop-shadow-[0_2px_2px_rgba(0,0,0,0.6)]">Lista de Clientes</h1>
                    <div class="flex gap-4">
                        <Link
                            :href="route('cliente.create')"
                class="bg-black border-4 border-purple-600 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:bg-purple-700 hover:border-purple-800 transition duration-300 ease-in-out"
             >
                            + Nuevo Cliente
                        </Link>
                        <button
                            @click="descargarPdf"
                           class="bg-black border-4 border-orange-600 text-white font-semibold px-6 py-3 rounded-lg shadow-md
         hover:bg-orange-700 hover:border-orange-700
         transition duration-300 ease-in-out"
                        >
                            Descargar PDF
                        </button>
                    </div>
                </div>

                <!-- Tabla de clientes -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <table class="min-w-full table-auto text-sm text-left">
                        <thead class="bg-black text-white">
                            <tr>
                                <th class="py-3 px-4">Nombres</th>
                                <th class="py-3 px-4">Primer Apellido</th>
                                <th class="py-3 px-4">Segundo Apellido</th>
                                <th class="py-3 px-4">Género</th>
                                <th class="py-3 px-4">Tipo de Documento</th>
                                <th class="py-3 px-4">Número de Documento</th>
                                <th class="py-3 px-4">Teléfono</th>
                                <th class="py-3 px-4">Dirección</th>
                                <th class="py-3 px-4 text-center" colspan="2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <tr 
                                v-for="cliente in page.props.clientes" 
                                :key="cliente.id" 
                                class="border-b border-gray-200 hover:bg-gray-50 transition"
                            >
                                <td class="py-3 px-4">{{ cliente.nombres }}</td>
                                <td class="py-3 px-4">{{ cliente.pri_ape }}</td>
                                <td class="py-3 px-4">{{ cliente.seg_ape }}</td>
                                <td class="py-3 px-4">{{ cliente.genero }}</td>
                                <td class="py-3 px-4">{{ cliente.docu_tip }}</td>
                                <td class="py-3 px-4">{{ cliente.docu_num }}</td>
                                <td class="py-3 px-4">{{ cliente.telefono }}</td>
                                <td class="py-3 px-4">{{ cliente.direccion }}</td>
                                <td class="py-3 px-4 text-center">
                                    <Link
                                        :href="route('cliente.edit', cliente.id)"
                                        class="text-indigo-600 hover:text-indigo-800 font-medium"
                                    >
                                        Editar
                                    </Link>
                                </td>
                                <td class="py-3 px-4 text-center">
                                    <button
                                        @click="eliminarCliente(cliente.id)"
                                        class="text-red-600 hover:text-red-800 font-medium"
                                    >
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
