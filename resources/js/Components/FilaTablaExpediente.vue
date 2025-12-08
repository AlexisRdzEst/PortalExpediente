<script setup>
</script>

<template>
     <tr class="border-b border-gray-200">
        <td class="text-gray-800 text-lg p-4 align-top">
             <slot name="celdaA"/>
        </td>
        <td class="p-4 w-[250px] text-right align-top">
            <slot name="celdaB"/>
        </td>
     </tr>
</template>

<style scoped>
</style>