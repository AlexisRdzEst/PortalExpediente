<script setup>
import { Head } from '@inertiajs/vue3';
import Cardlayout from '@/Layouts/Cardlayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { router } from '@inertiajs/vue3'; //
import { Link } from '@inertiajs/vue3'; // 1. Importa el componente Link

function iniciarRegistro() {
    router.visit(route('registro.index'));
}

function login() {
    router.visit(route('login.app'));
}
// ...
</script>

<template>

    <Head title="Inicio" />

    <div class="min-h-screen bg-fondo-gris flex flex-col justify-center items-center" id="contenedor">

        <div id="contenido">
            <Cardlayout>
                <h1 class="text-3xl font-bold mb-4 ml-4 text-left">BIENVENIDO</h1>
                <p class="mb-8 text-lg ml-4 max-w-2xl">
                    Si eres un nuevo proveedor y subirás los archivos correspondientes favor de indicar dar click en
                    "Iniciar Registro" en caso de solo querer actualizar información hacerlo en "Ya soy Proveedor"
                </p>

                <div class="flex space-x-6 mt-4 justify-end">
                    <PrimaryButton color="lime" type="button" @click="login">
                        Ya soy Proveedor
                    </PrimaryButton>
                    <PrimaryButton color="orange" type="button" @click="iniciarRegistro">
                        Iniciar Registro
                    </PrimaryButton>
                </div>
            </Cardlayout>
            <div class="mt-6 w-full text-right">
                <Link :href="route('login.app')"
                    class="text-blue-700 hover:underline text-sm">
                Acceso Administrador
                </Link>
            </div>
        </div>
    </div>
</template>

<style></style>