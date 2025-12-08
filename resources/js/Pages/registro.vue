<script setup>
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import Cardlayout from '@/Layouts/Cardlayout.vue';
import grid from '@/Layouts/grid.vue';
import CustomInput from '@/Components/CustomInput.vue'; // 1. Importa el componente
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';

// Datos reactivos de la página
const nombreEmpresa = ref('');
const rfc = ref('');
const email = ref('');
const telefono = ref('');
const password = ref('');
const checkpassword = ref('');
const viewContent = ref(0);
const errorInput = ref(0);


//Funciones a usar
function cambiarVista() {
    switch (viewContent.value) {
        case 0:
            viewContent.value = 1;
            break;
        case 1:
            if (nombreEmpresa.value != "" && rfc.value != "") {
                viewContent.value = 2;
                errorInput.value = 0;
            } else {
                errorInput.value = 1;
            }
            break;
        case 2:
            if (email.value != "" && telefono.value != "") {
                viewContent.value = 3;
                errorInput.value = 0;
            } else {
                errorInput.value = 1;
            }
            break;
    }
}

function enviarDatos() {
    var submitData = {
            "Nombre_Empresa": "",
            "RFC": "",
            "Email": "",
            "Telefono": "",
            "Password": ""
        };

    if (password.value == checkpassword.value) {
        errorInput.value = 0;
        submitData["Nombre_Empresa"] = nombreEmpresa.value;
        submitData["RFC"] = rfc.value;
        submitData["Email"] = email.value;
        submitData["Telefono"] = telefono.value;
        submitData["Password"] = password.value;
        console.log(submitData);
    }
    else{
        errorInput.value = 1;
        password.value = "";
        checkpassword.value = "";
    }
}

function regresarVista(){
    switch (viewContent.value) {
        case 3:
            viewContent.value = 2;
            errorInput.value = 0;
            password.value = "";
            checkpassword.value = "";
            break;
        case 2:
            viewContent.value = 1;
            errorInput.value = 0;
            telefono.value = "";
            email.value = "";
            break;
        case 1:
            viewContent.value = 0;
            errorInput.value = 0;
            nombreEmpresa.value = "";
            rfc.value = "";
            break;
    }
}
// ...
</script>

<template>

    <Head title="Registro" />

    <div class="min-h-screen bg-fondo-gris flex flex-col justify-center items-center" id="contenedor">

        <div id="contenido" v-if="viewContent == 0">
            <Cardlayout>
                <h1 class="text-3xl font-bold mb-4 ml-4 text-left">REGISTRO</h1>
                <p class="mb-8 text-lg ml-4 max-w-2xl">
                    Antes de iniciar el registro favor indica que el tipo de entidad fiscal eres.
                    esto con el fin de adaptar la informacion necesaria segun el tipo de persona.
                </p>
                <div class="flex space-x-6 mt-4 justify-center">
                    <PrimaryButton color="blue" type="button" @click="cambiarVista">
                        PERSONA MORAL
                    </PrimaryButton>
                    <PrimaryButton color="blue" type="button" @click="cambiarVista">
                        PERSONA FISICA
                    </PrimaryButton>
                </div>
            </Cardlayout>
        </div>

        <div id="contenido2" v-if="viewContent == 1">
            <Cardlayout>
                <grid>
                    <template #columnaA>
                        <h1 class="text-3xl font-bold mb-4 ml-4 text-left">REGISTRO</h1>
                        <p class="mb-8 text-lg ml-4 max-w-2xl">
                            Favor de llenar los campos con la informacion requerida.
                        </p>
                    </template>
                    <template #columnaB>
                        <div class="space-y-6">
                            <div>
                                <CustomInput label="Nombre de la Empresa:" v-model="nombreEmpresa" />
                            </div>
                            <div>
                                <CustomInput label="RFC:" v-model="rfc" />
                            </div>
                        </div>
                        <div class="mt-3 bg-red-200" v-if="errorInput == 1">
                            <p class="mb-8 text-base ml-4 max-w-2xl text-red-600 font-bold">
                                **datos incompletos**
                            </p>
                        </div>
                    </template>
                </grid>
                <div class="flex space-x-6 mt-4 justify-end">
                    <SecondaryButton color="blue" type="button" @click="regresarVista">
                        Regresar
                    </SecondaryButton>
                    <PrimaryButton color="orange" type="button" @click="cambiarVista">
                        CONTINUAR
                    </PrimaryButton>
                </div>
            </Cardlayout>
        </div>

        <div id="contenido3" v-if="viewContent == 2">
            <Cardlayout>
                <grid>
                    <template #columnaA>
                        <h1 class="text-3xl font-bold mb-4 ml-4 text-left">REGISTRO</h1>
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
                                <CustomInput label="Telefono de Contacto:" v-model="telefono" type="tel" />
                            </div>
                        </div>
                        <div class="mt-3 bg-red-200" v-if="errorInput == 1">
                            <p class="mb-8 text-base ml-4 max-w-2xl text-red-600 font-bold">
                                **datos incompletos**
                            </p>
                        </div>
                    </template>
                </grid>
                <div class="flex space-x-6 mt-4 justify-end">
                    <SecondaryButton color="blue" type="button" @click="regresarVista">
                        Regresar
                    </SecondaryButton>
                    <PrimaryButton color="orange" type="button" @click="cambiarVista">
                        CONTINUAR
                    </PrimaryButton>
                </div>
            </Cardlayout>
        </div>

        <div id="contenido4" v-if="viewContent == 3">
            <Cardlayout>
                <grid>
                    <template #columnaA>
                        <h1 class="text-3xl font-bold mb-4 ml-4 text-left">REGISTRO</h1>
                        <p class="mb-8 text-lg ml-4 max-w-2xl">
                            Favor de llenar los campos con la informacion requerida.
                        </p>
                    </template>
                    <template #columnaB>
                        <div class="space-y-6">
                            <div>
                                <CustomInput label="Contraseña:" v-model="password" type="password" />
                            </div>
                            <div>
                                <CustomInput label="Confirma Contraseña:" v-model="checkpassword" type="password" />
                            </div>
                        </div>
                        <div class="mt-3 bg-red-200" v-if="errorInput == 1">
                            <p class="mb-8 text-base ml-4 max-w-2xl text-red-600 font-bold">
                                **Contraseñas no coinciden**
                            </p>
                        </div>
                    </template>
                </grid>
                <div class="flex space-x-6 mt-4 justify-end">
                    <SecondaryButton color="blue" type="button" @click="regresarVista">
                        Regresar
                    </SecondaryButton>
                    <PrimaryButton color="orange" type="button" @click="enviarDatos">
                        FINALIZAR REGISTRO
                    </PrimaryButton>
                </div>
            </Cardlayout>
        </div>
    </div>
</template>

<style></style>