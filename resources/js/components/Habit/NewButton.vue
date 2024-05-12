<script setup>
import { useHabitsStore } from '@/stores/habits'

const habits = useHabitsStore()
</script>

<template>
    <button
        title="New Habit"
        @click="habits.openFormDialog()"
        type="button"
        class="text-white bg-primary-600 hover:bg-primary-400 transition-all duration-200 px-3.5 py-2 rounded-md"
    >
        Nuevo Hábito
    </button>
</template>
