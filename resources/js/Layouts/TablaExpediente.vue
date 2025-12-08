<script setup>
import { ref } from 'vue';
import FilaTablaExpediente from '@/Components/FilaTablaExpediente.vue';
import FileUploadButton from '@/Components/FileUploadButton.vue';

//Variebles Reactivas
const nombreEmpresa = ref("Nombre Ejemplo");
const documentos = ref([]);
const archivosSeleccionados = ref([]);

//Variables No reactivas
const arregloMoral = [
    "Acta Costitutiva",
    "Poder Notarial que acredite al representate legal",
    "identificacion Oficial del Representante Legal",
    "Constancia de Situacion Fiscal",
    "Comprobante de Domicilio",
    "Opinion del cumplimiento de Obligaciones Fiscales (32D)",
    "Opinion de Cumplimiento de Obligaciones fiscales en Material del Seguro Social (IMSS)",
    "Tarjeta de indentificacion patronal IMSS",
    "Declaracion anuel del ejercicio inmediato anterior",
    "Ultima declaracion informativa de Operaciones con terceros (DIOT) presentada"
]

documentos.value = arregloMoral;

// Esta función toma el ID (index) y devuelve una función que será ejecutada al hacer click.
function createUploadHandler(documentId) {
    // 1. Devolvemos la función que será ejecutada cuando el hijo emita 'file-selected'
    return (file) => {
        // 2. Aquí llamamos a tu función original, asegurando que documentId ya tiene el valor correcto (0, 1, 2, ...)
        handleFileUpload(file, documentId);
    };
}

//Funciones 
function handleFileUpload(file, documentId) {
    console.log("ID Recibido FINAL:", documentId); // ¡Esto debe ser 0, 1, 2, 3...!

    // 🛑 VALIDACIÓN NECESARIA CONTRA EL ERROR DE UNDEFINED 🛑
    if (!file) {
        console.warn("No se seleccionó ningún archivo para el ID:", documentId);
        return;
    }
    
    // 1. Crear el objeto que queremos guardar
    const nuevoRegistro = {
        doc_id: documentId, // Por ejemplo, 'acta', 'poder', etc.
        file: file,         // El objeto File
        name: file.name,    // Nombre del archivo para mostrar en la UI
        size: file.size     // Tamaño del archivo
    };

    archivosSeleccionados.value.push(nuevoRegistro);

    console.log("Archivos seleccionados:", archivosSeleccionados.value);

    // La reactividad se encarga de actualizar la interfaz
}
</script>

<template>
    <div lass="w-full max-w-4xl bg-white rounded-xl overflow-hidden mb-5">

        <div class="bg-gray-700 text-white p-4">
            <h2 class="text-xl font-semibold">Documentacion de {{ nombreEmpresa }}</h2>
        </div>
        <table class="w-full table-fixed">
            <tbody>
                <FilaTablaExpediente v-for="(documento, index) in documentos" :key="index">
                    <template #celdaA>
                        {{ documento }}
                    </template>
                    <template #celdaB>
                        indice: {{ index }}
                        <FileUploadButton :field-id="index" @file-selected="createUploadHandler(index)" />
                    </template>
                </FilaTablaExpediente>
            </tbody>
        </table>
    </div>
</template>

<style scoped></style>