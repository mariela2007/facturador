<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, usePage, router } from '@inertiajs/vue3';

const page = usePage();

const descargarPdf = () => {
    window.open(route('proyectos.exportarPdf'), '_blank');
};

const eliminarProyecto = (id) => {
    if (confirm('¿Estás segura de eliminar este proyecto?')) {
        router.delete(route('proyectos.destroy', id));
    }
};
</script>

<template>
    <AuthenticatedLayout>
        <Head title="Lista de Proyectos" />

        <div class="py-12 min-h-screen bg-cover bg-center bg-no-repeat" style="background-image: url('/images/imagen.jpg');">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Título y botones -->
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-3xl font-bold text-white drop-shadow-[0_4px_3px_rgba(0,0,0,0.7)] drop-shadow-[0_2px_2px_rgba(0,0,0,0.6)]">Lista de Proyectos</h1>
                    <div class="flex gap-4">
                        <Link
                            :href="route('proyectos.create')"
     class="bg-black border-4 border-purple-600 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:bg-purple-700 hover:border-purple-800 transition duration-300 ease-in-out"
       >
                            + Nuevo Proyecto
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

                <!-- Tabla -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <table class="min-w-full table-auto text-sm text-left">
                        <thead class="bg-black text-white">
                            <tr>
                                <th class="py-3 px-4">Nombre del Proyecto</th>
                                <th class="py-3 px-4">Cliente</th>
                                <th class="py-3 px-4">Fecha de Inicio</th>
                                <th class="py-3 px-4">Fecha de Fin</th>
                                <th class="py-3 px-4 text-center" colspan="2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <tr
                                v-for="proyecto in page.props.proyectos"
                                :key="proyecto.id"
                                class="border-b border-gray-200 hover:bg-gray-50 transition"
                            >
                                <td class="py-3 px-4">{{ proyecto.nombre }}</td>
                                <td class="py-3 px-4">{{ proyecto.cliente?.nombres || 'Sin asignar' }}</td>
                                <td class="py-3 px-4">{{ proyecto.fecha_inicio }}</td>
                                <td class="py-3 px-4">{{ proyecto.fecha_fin }}</td>
                                <td class="py-3 px-4 text-center">
                                    <Link
                                        :href="route('proyectos.edit', proyecto.id)"
                                        class="text-indigo-600 hover:text-indigo-800 font-medium"
                                    >
                                        Editar
                                    </Link>
                                </td>
                                <td class="py-3 px-4 text-center">
                                    <button
                                        @click="eliminarProyecto(proyecto.id)"
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
