<script setup>
import { computed } from 'vue';

// 1. Definir las Props para personalización (color y tipo)
const props = defineProps({
    type: { type: String, default: 'button' },
    color: { type: String, default: 'orange' },
});

// 2. Definir los eventos que el componente puede emitir
const emit = defineEmits(['click']);

const baseClasses = 'bg-white font-semibold py-3 px-8 hover:bg-gray-300 hover:underline rounded-lg transition duration-200';

// 3. Propiedad computada para determinar las clases de color dinámicamente
const colorClasses = computed(() => {
    switch (props.color) {
        case 'lime':
            return 'text-lime-500';
        case 'blue':
            return 'text-blue-800';
        case 'orange':
        default:
            return 'text-orange-500';
    }
});
</script>

<template>
    <button
        :type="type"
        :class="[baseClasses, colorClasses]"
        @click="emit('click')"
        >
             <slot />
    </button>
</template>
