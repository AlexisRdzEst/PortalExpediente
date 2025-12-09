<script setup>

import { ref } from 'vue';


const props = defineProps({
    fieldId:{
        type: Number,
        required: true
    } 
});


const emit = defineEmits(['file-selected']);

const fileInputRef = ref(null);

function triggerFileInput() {
    fileInputRef.value.click();
}

// 4. Función que se llama cuando se selecciona un archivo
function handleFileChange(event) {
    const file = event.target.files[0];
    if (file) {
        // Emitir el archivo seleccionado al componente padre para que lo procese
        emit('file-selected', file, props.fieldId);
        event.target.value = null;
        console.log("Props: "+ props.fieldId);
    }
}
</script>

<template>
    <div>
        <button type="button" @click="triggerFileInput"
            class="flex items-center space-x-2 bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-200 ml-auto">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L10 11.586l1.293-1.293a1 1 0 111.414 1.414l-2 2a1 1 0 01-1.414 0l-2-2a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v7a1 1 0 11-2 0V4a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            <span>Cargar Documento</span>
        </button>

        <input ref="fileInputRef" type="file" @change="handleFileChange" class="hidden" />
    </div>
</template>