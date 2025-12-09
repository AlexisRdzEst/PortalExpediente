<script setup>
import { Head } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TablaExpediente from '@/Layouts/TablaExpediente.vue';
import { ref } from 'vue';

const documentosDelExpediente = ref([]);

function recibirDocumentos(archivos) {
    documentosDelExpediente.value = archivos;
    console.log("El padre recibió estos archivos:", documentosDelExpediente.value);
}

const submitExpediente = () => {
    // Aquí usarías documentosDelExpediente.value para armar tu FormData
    console.log("Enviando al backend:", documentosDelExpediente.value);
};

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
                EXPEDIENTE DEL PROVEEDOR
            </h1>
            <p class="mb-10">
                Aqui estan enlistados cada uno de lo Documentos del expediente del Proveedor [NOMBRE DEL PROVEEDOR], es
                importante tener el catalago completo para temas fiscales.
            </p>
            <TablaExpediente @update-files="recibirDocumentos">

            </TablaExpediente>
            <div class="flex justify-center my-10">
                <PrimaryButton @click="submitExpediente" color="orange" type="button">
                    Enviar Documentacion
                </PrimaryButton>
            </div>
        </div>
    </div>
</template>