<script setup>
// 1. Definir las Props que el componente aceptará del padre
const props = defineProps({
    // La etiqueta del campo. Es un string y es requerido.
    label: {
        type: String,
        required: true,
    },
    type: {
        type: String,
        default: 'text', // 👈 Valor por defecto: 'text'
    },
    // El ID y 'for' para la accesibilidad. Opcional, se puede generar si no se pasa.
    fieldId: {
        type: String,
        default: 'custom-field-' + Math.random().toString(36).substring(2, 9),
    },
    // El modelo de datos (v-model) que enlaza el input
    modelValue: [String, Number],
});

// 2. Definir los eventos que el componente puede emitir (necesario para v-model)
const emit = defineEmits(['update:modelValue']);
</script>

<template>
    <div>
        <label :for="fieldId" class="block text-lg text-gray-800 mb-2">
            {{ label }}
        </label>

        <input
            :id="fieldId"
            :value="modelValue"
            @input="emit('update:modelValue', $event.target.value)"
            :type="type"
            placeholder=""
            class="w-full px-4 py-3 text-lg border-2 border-gray-500 rounded-lg focus:outline-none focus:border-blue-500 transition duration-150"
        />
        </div>
</template>