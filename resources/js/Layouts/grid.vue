<script setup>
// No necesita mucha lógica, solo estructura
</script>

<template>
    <div class="grid grid-cols-12 gap-4">
        <div class="col-span-6">
            <slot name="columnaA" />
        </div>
        <div class="col-span-6">
            <slot name="columnaB" />
        </div>
    </div>
</template>

<style scoped>
/* Puedes añadir estilos específicos aquí si no usas solo Tailwind */
</style>