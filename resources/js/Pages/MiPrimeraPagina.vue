<script setup>
// Define las 'props' (datos) que vienen desde Laravel
const props = defineProps({
    mensaje: String,
});
</script>

<template>
    <Head title="Mi Primera Página" /> 

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold">{{ props.mensaje }}</h1>
                <p class="mt-4">¡Tu aplicación Laravel + Vue está funcionando perfectamente!</p>
            </div>
        </div>
    </div>
</template>