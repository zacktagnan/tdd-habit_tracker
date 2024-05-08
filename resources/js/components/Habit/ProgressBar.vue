<script setup>
import { ref } from 'vue';

const props = defineProps({
    percent: {
        type: Number,
    },
})

const circumference = 30 * 2 * Math.PI
</script>

<template>
    <div class="flex justify-center basis-1/4">
        <div class="relative inline-flex items-center justify-center overflow-hidden">
            <div id="percent" class="absolute inset-0 flex items-center justify-center text-sm font-semibold">
                {{ percent }}%
            </div>
            <svg class="w-20 h-20 transform -rotate-90">
                <circle class="text-gray-300" stroke-width="6" stroke="currentColor" fill="transparent" r="30" cx="40"
                    cy="40" />
                <circle class="transition-all duration-200 text-primary-600 hover:text-primary-400" stroke-width="6"
                    stroke="currentColor" fill="transparent" r="30" cx="40" cy="40" :stroke-dasharray="circumference"
                    :stroke-dashoffset="circumference - ((percent / 100) * circumference)" stroke-linecap="round" />
            </svg>
        </div>
    </div>
</template>
