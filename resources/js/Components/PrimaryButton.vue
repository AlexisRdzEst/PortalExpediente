<script setup>
import { computed } from 'vue';

// 1. Definir las Props para personalización (color y tipo)
const props = defineProps({
    type: { // El tipo de botón (submit, button, reset)
        type: String,
        default: 'button',
    },
    color: { // Para elegir el color base (ej. 'orange', 'lime')
        type: String,
        default: 'orange', // El color por defecto es naranja (como tu ejemplo)
    },
});

// 2. Definir los eventos que el componente puede emitir
const emit = defineEmits(['click']);

// 3. Propiedad computada para determinar las clases de color dinámicamente
const colorClasses = computed(() => {
    switch (props.color) {
        case 'lime':
            return 'bg-lime-500 hover:bg-lime-600';
        case 'blue':
            return 'bg-blue-500 hover:bg-blue-600';
        case 'orange':
        default:
            return 'bg-orange-500 hover:bg-orange-600';
    }
});
</script>

<template>
    <button
        :type="type"
        :class="colorClasses"
        @click="emit('click')"
        class="text-white font-semibold py-3 px-8 rounded-lg shadow-md transition duration-200"
    >
        <slot />
    </button>
</template>