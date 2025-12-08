<script setup>
// No necesita mucha lógica, solo estructura
</script>

<template>
    <div class="bg-white w-full max-w-4xl p-10 rounded-[50px] shadow-2xl">
        <img src="/images/Logo.png" alt="The Fuentes Corporation" class="h-16 mb-6 ml-4" />
        <slot />

    </div>
</template>

<style scoped>
/* Puedes añadir estilos específicos aquí si no usas solo Tailwind */
</style>