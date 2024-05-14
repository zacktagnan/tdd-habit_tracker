<script setup>
import HabitInfo from '@/components/Habit/Info.vue'
import ExecuteButton from '@/components/Habit/ExecuteButton.vue'
import ProgressBar from '@/components/Habit/ProgressBar.vue'
import HabitEditButton from '@/components/Habit/EditButton.vue'
import HabitDeleteButton from '@/components/Habit/DeleteButton.vue'
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

const deleteHabitConfirmation = (habitIndex) => {
    if (confirm('Are you sure you want to DELETE it?')) {
        habits.destroy(habitIndex)
    }
}
// --------------------------------------------------------
// Ya no en uso por haber implementado un Confirm personalizado (ConfirmDialog.vue)

fetchHabits()
</script>

<template>
    <div class="divide-y divide-gray-300/5">
        <div v-for="(habit, index) in habits.list" :key="habit.id" class="text-base leading-7 text-gray-900">
            <div class="flex items-center py-2.5">
                <!-- Sin traducciones mediante 'laravel-vue-i18n' -->
                <!-- <habit-info :name="habit.name" :executions_count="habit.executions_count"
                    :times_per_day="habit.times_per_day" :times_per_day_text="times_per_day_text" />
                <execute-button @new-execution="habits.newExecution(index)" />
                <progress-bar :percent="habits.percent(index)" /> -->
                <habit-info :name="habit.name" :executions_count="habit.executions_count"
                    :times_per_day="habit.times_per_day" />

                <execute-button
                    @new-execution="habits.newExecution(index)"
                    :title="$t('habits.index.button.one_more_execution')" />

                <progress-bar
                    :percent="habits.percent(index)"
                    :title="$t('habits.index.form.current_completed_percent')" />

                <div>
                    <!-- <habit-edit-button @edit="habits.edit(index)" />
                    <habit-delete-button @destroy="habits.confirm(index)" />
                    <habit-delete-button @destroy="deleteHabitConfirmation(index)" /> -->
                    <habit-edit-button @edit="habits.edit(index)" :title="$t('habits.index.button.edit')" />
                    <habit-delete-button @destroy="habits.confirm(index)" :title="$t('habits.index.button.delete')" />
                </div>
            </div>
        </div>
    </div>
</template>
