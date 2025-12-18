<script setup>
import { Head } from '@inertiajs/vue3';
import { ref, onMounted, nextTick } from 'vue';
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
    // 2. CORRECCIÓN: Usa nextTick() directamente, sin "this."
    nextTick(() => {
        $('#tabla-proveedores').DataTable({
            data: ListadoProovedores.value,
            columns: [
                {
                    data: 'Nombre',
                    title: 'Nombre de la Empresa',
                },
                {
                    data: 'Estatus',
                    title: 'Estatus',
                    render: function (data, type, row) {
                        if (data === 'VALIDADA') {
                            return `<span class="text-green-800 font-bold bg-green-300 px-2 py-1 rounded-full justify-self-center">${data}</span>`;
                        } else if (data === 'NUEVO') {
                            return `<span class="text-blue-800 font-bold bg-blue-300 px-2 py-1 rounded-full justify-self-center">${data}</span>`;
                        } else {
                            return `<span class="text-red-800 font-bold bg-red-300 px-2 py-1 rounded-full justify-self-center">${data}</span>`;
                        }
                    }
                },
                {
                    data: null,
                    title: 'Acciones',
                    orderable: false, // Evita que se intente ordenar por botones
                    defaultContent: '<button class="bg-sky-600 hover:bg-sky-800 text-white rounded-md px-5 py-1 justify-self-center">Ver Expediente</button>'
                }
            ],
            // Tu configuración de idioma
            "language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                }
            }
            // ... resto de tu config (data, columns, etc)
        });
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
            <div class="">
                <table id="tabla-proveedores">
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