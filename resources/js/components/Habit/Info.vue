<script setup>
import { transChoice } from 'laravel-vue-i18n';

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
    // Sin traducciones mediante 'laravel-vue-i18n', será necesario activarlo así
    //    -> se recibe este valor desde el componente List.vue
    //    mediante la etiqueta de este componente
    // times_per_day_text: {
    //     type: String,
    // },
})
</script>

<template>
    <div class="flex flex-col basis-1/2">
        <h2 id="name" class="text-base font-semibold">{{ name }}</h2>
        <small id="executions" class="font-normal text-gray-500">{{ executions_count }} / {{
 times_per_day }} {{ transChoice('habits.index.list.times_per_day', times_per_day) }}</small>
    </div>
</template>
