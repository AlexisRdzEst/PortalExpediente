<script setup>
import { ref, watch } from 'vue'; 
import FilaTablaExpediente from '@/Components/FilaTablaExpediente.vue';
import FileUploadButton from '@/Components/FileUploadButton.vue'; //

// Variables Reactivas
const nombreEmpresa = ref("Nombre Ejemplo");
// ... (tu array de documentos original) ...
const documentos = ref([
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
]);

const emit = defineEmits(['update-files']);

const archivosSeleccionados = ref([]);

watch(archivosSeleccionados, (nuevoValor) => {
    emit('update-files', nuevoValor);
}, { deep: true });

// --- CORRECCIÓN 1: Eliminamos createUploadHandler porque no es necesaria ---

// Funciones 
function handleFileUpload(file, documentId) {
    console.log("ID Recibido FINAL:", documentId); 

    if (!file) {
        console.warn("No se seleccionó ningún archivo para el ID:", documentId);
        return;
    }
    
    const nuevoRegistro = {
        doc_id: documentId,
        file: file,
        name: file.name,
        size: file.size
    };

    // Buscamos si ya existe un archivo para este ID y lo reemplazamos, o agregamos uno nuevo
    const indiceExistente = archivosSeleccionados.value.findIndex(a => a.doc_id === documentId);
    
    if (indiceExistente >= 0) {
        archivosSeleccionados.value[indiceExistente] = nuevoRegistro;
    } else {
        archivosSeleccionados.value.push(nuevoRegistro);
    }

    console.log("Archivos seleccionados:", archivosSeleccionados.value);
}
</script>

<template>
    <div class="w-full max-w-4xl bg-white rounded-xl overflow-hidden mb-5">

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
                        <div class="flex flex-col items-end gap-2">
                            
                            <FileUploadButton 
                                :field-id="index" 
                                @file-selected="handleFileUpload" 
                            />

                            <div v-if="archivosSeleccionados.find(a => a.doc_id === index)" class="text-xs text-green-600 font-bold">
                                ✅ {{ archivosSeleccionados.find(a => a.doc_id === index).name }}
                            </div>
                        </div>

                    </template>
                </FilaTablaExpediente>
            </tbody>
        </table>
    </div>
</template>

<style scoped></style>