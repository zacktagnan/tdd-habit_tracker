<script setup>
defineProps({
    name: {
        type: String,
    },
    executions_count: {
        type: Number,
    },
    times_per_day: {
        type: Number,
    },
    times_text: {
        type: String,
    },
})
</script>

<template>
    <div class="flex basis-1/2 flex-col">
        <h2 id="name" class="text-base font-semibold">{{ name }}</h2>
        <small id="executions" class="font-normal text-gray-400">{{ executions_count }} / {{
 times_per_day }} {{ times_text }}</small>
    </div>
</template>
