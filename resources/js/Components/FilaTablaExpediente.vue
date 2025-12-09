<script setup>
</script>

<template>
     <tr class="border-b border-gray-200">
        <td class="text-gray-800 text-lg p-4 align-center">
             <slot name="celdaA"/>
        </td>
        <td class="p-4 w-[250px] text-right align-center">
            <slot name="celdaB"/>
        </td>
     </tr>
</template>

<style scoped>
</style>