<script setup>
import HabitInfo from '@/components/Habit/Info.vue'
import ExecuteButton from '@/components/Habit/ExecuteButton.vue'
import ProgressBar from '@/components/Habit/ProgressBar.vue'
import { useHabitsStore } from '@/stores/habits'

defineProps({
    times_per_day_text: {
        type: String,
    },
})

const habits = useHabitsStore()

const fetchHabits = async () => {
    await habits.fetch()
}

fetchHabits()
</script>

<template>
    <div class="divide-y divide-gray-300/5">
        <div v-for="(habit, index) in habits.list" :key="habit.id" class="text-base leading-7 text-gray-900">
            <div class="flex items-center py-2.5">
                <habit-info :name="habit.name" :executions_count="habit.executions_count"
                    :times_per_day="habit.times_per_day" :times_per_day_text="times_per_day_text" />

                <execute-button></execute-button>

                <progress-bar :percent="habits.percent(index)"></progress-bar>
            </div>
        </div>
    </div>
</template>
