<script setup>
import { ref } from 'vue';

const executions_count = ref(0)

const newExecution = () => {
    executions_count.value++
}
</script>

<template>
    <div class="flex basis-1/4 justify-center p-2.5">
        <button
            title="Aggregate Execution"
            id="execute"
            @click="$emit('newExecution')"
            class="px-4 py-2 text-2xl font-semibold text-white rounded-lg bg-primary-600 hover:bg-primary-400">+1</button>
    </div>
</template>
