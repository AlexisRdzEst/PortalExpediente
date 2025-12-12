<script setup>
import { Head } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import $ from 'jquery';

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
    if ($.fn.DataTable.isDataTable('#tabla-proveedores')) {
        $('#tabla-proveedores').DataTable().destroy();
    }
    $('#tabla-proveedores').DataTable({
        // 💥 Le pasamos el array de objetos directamente 💥
        data: ListadoProovedores.value, 
        
        // 💥 Definimos el mapeo de columnas 💥
        columns: [
            { data: 'Nombre', title: 'Nombre de la Empresa', className: 'text-left' }, // Col 1
            { data: 'Estatus', title: 'Estatus', className: 'text-left' },             // Col 2
            { 
                data: null, // Columna de acción no tiene un dato fijo
                defaultContent: '<button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-3 rounded-md shadow">Ver</button>', 
                title: '',
                orderable: false, // Deshabilita la ordenación en esta columna
                className: 'text-center'
            }                                                                           // Col 3
        ],
        
        // Opciones de configuración de Datatables:
        paging: true,
        ordering: true,
        searching: true,
        info: true,
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
                <table id="tabla-proveedores" class=" stripe w-full table-fixed">
                    <thead class="bg-gray-700 text-white p-4">
                        <th>Nombre de la Empresa</th>
                        <th>Estatus</th>
                        <th></th>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>