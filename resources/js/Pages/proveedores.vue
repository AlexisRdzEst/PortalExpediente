<script setup>
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';

//variables ractivas
const ListadoProovedores = ref([
    {
        "Nombre": "Proveedor 1",
        "Estatus": "NUEVO"
    },
    {
        "Nombre": "Proveedor 2",
        "Estatus": "NUEVO"
    },
    {
        "Nombre": "Proveedor 3",
        "Estatus": "VENCIDA"
    },
    {
        "Nombre": "Proveedor 4",
        "Estatus": "VENCIDA"
    },
    {
        "Nombre": "Proveedor 5",
        "Estatus": "VALIDADA"
    },
    {
        "Nombre": "Proveedor 6",
        "Estatus": "VALIDADA"
    },
    {
        "Nombre": "Proveedor 7",
        "Estatus": "VALIDADA"
    },
    {
        "Nombre": "Proveedor 8",
        "Estatus": "VALIDADA"
    },
    {
        "Nombre": "Proveedor 9",
        "Estatus": "VALIDADA"
    },
    {
        "Nombre": "Proveedor 10",
        "Estatus": "VALIDADA"
    },
]);

onMounted(() => {
    // 2. Esperar al siguiente ciclo de tick de Vue para asegurar que el v-for ha renderizado todas las filas
    // Opcional: Podrías usar nextTick() si tienes problemas de renderizado asíncrono.

    // 3. Seleccionar la tabla por su ID e inicializar Datatables
    $('#tabla-proveedores').DataTable({
        // Opciones de configuración de Datatables:
        paging: true,
        ordering: true,
        searching: true,
        info: true,
        language: {
             url: '//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json' 
        }
    });
});

</script>

<template>

    <Head title="Expediente" />

    <div class="min-h-screen bg-fondo-gris flex flex-col items-center" id="contenedor">
        <header class="w-full bg-blue-800 p-4">
            <div class="max-w-7xl mx-auto flex items-center justify-center">
                <div class="text-white text-xl font-bold">
                    THE FUENTES CORPORATION
                </div>
            </div>
        </header>
        <div class="w-2/3 bg-white p-8 mx-auto mb-4">
            <h1 class="text-4xl font-bold my-5">
                CATALAGO DE PROVEEDORES
            </h1>
            <p class="mb-10">
                Aqui estan enlistado todo el catalago de proveedores de The Fuentes, para 
                la consulta de su expediente fiscal.
            </p>
            <div class="w-full max-w-4xl bg-white rounded-xl overflow-hidden mb-5">
                <table id="tabla-proveedores" class="w-full table-fixed">
                    <thead class="bg-gray-700 text-white p-4">
                        <th>Nombre de la Empresa</th>
                        <th>Estatus</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <tr lass="border-b border-gray-200" v-for="proveedor in ListadoProovedores">
                            <td class="text-gray-800 text-lg p-4 align-center">
                                {{ proveedor.Nombre }}
                            </td>
                            <td class="text-gray-800 text-lg p-4 align-center">
                                {{ proveedor.Estatus }}
                            </td>
                            <td class="text-gray-800 text-lg p-4 align-center">
                                
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>