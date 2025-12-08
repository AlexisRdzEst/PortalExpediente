<script setup>
import { ref } from 'vue';
import { Head } from '@inertiajs/vue3';
import Cardlayout from '@/Layouts/Cardlayout.vue';
import grid from '@/Layouts/grid.vue';
import CustomInput from '@/Components/CustomInput.vue'; // 1. Importa el componente
import PrimaryButton from '@/Components/PrimaryButton.vue';

//Valores reactivos
const email = ref("");
const password = ref("");
const errorInput = ref(0);

//Metodos
function enviarDatos() {
    var datosSubmit = {
        "Email": "",
        "Password": ""
    };

    if (email.value != "" && password.value != "") {
        datosSubmit["Email"] = email.value;
        datosSubmit["Password"] = password.value;
        errorInput.value = 0;
    } else {
        errorInput.value = 1;
        email.value = "";
        password.value = "";
    }
}

</script>

<template>

    <Head title="Login" />

    <div class="min-h-screen bg-fondo-gris flex flex-col justify-center items-center" id="contenedor">
        <Cardlayout>
            <grid>
                <template #columnaA>
                    <h1 class="text-3xl font-bold mb-4 ml-4 text-left">INICIA SESION</h1>
                    <p class="mb-8 text-lg ml-4 max-w-2xl">
                        Favor de llenar los campos con la informacion requerida.
                    </p>
                </template>
                <template #columnaB>
                    <div class="space-y-6">
                        <div>
                            <CustomInput label="Correo Electronico:" v-model="email" type="email" />
                        </div>
                        <div>
                            <CustomInput label="Contraseña:" v-model="password" type="password" />
                        </div>
                    </div>
                    <div class="mt-3 bg-red-200" v-if="errorInput == 1">
                        <p class="mb-3 text-base ml-4 max-w-2xl text-red-600 font-bold">
                            **Datos incompletos**
                        </p>
                    </div>
                </template>
            </grid>
            <div class="flex space-x-6 mt-4 justify-end">
                <PrimaryButton color="orange" type="button" @click="enviarDatos">
                    Iniciar Sesion
                </PrimaryButton>
            </div>
        </Cardlayout>
    </div>
</template>