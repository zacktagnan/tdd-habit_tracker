<script setup>
defineProps({
    name: {
        type: String,
    }
})
</script>

<template>
    <div class="flex basis-1/2 flex-col">
        <h2 id="name" class="text-base font-semibold">{{ name }}</h2>
        <small id="executions" class="font-normal text-gray-400">1 / 3 veces</small>
    </div>
</template>
