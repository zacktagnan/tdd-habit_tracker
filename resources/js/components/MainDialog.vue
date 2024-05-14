<script setup>
import ConfirmDialog from '@/components/ConfirmDialog.vue'
import HabitFormDialog from '@/components/Habit/FormDialog.vue'
import { useHabitsStore } from '@/stores/habits'

const habits = useHabitsStore()
</script>

<template>
    <confirm-dialog />
    <habit-form-dialog />
</template>
