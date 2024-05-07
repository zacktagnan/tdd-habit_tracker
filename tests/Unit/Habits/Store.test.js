import { createPinia, setActivePinia } from "pinia";
import { beforeEach, describe, it, expect } from "vitest";
import { useHabitsStore } from '@/stores/habits'

describe('Habits Store', () => {
    let habits = null

    beforeEach(() => {
        setActivePinia(createPinia())
        habits = useHabitsStore()
    })

    it('fetches the list of habits', async () => {
        await habits.fetch()
        expect(habits.list.length).toBe(1)
    })

    it('increments the executions', async () => {
        await habits.fetch()
        const habitIndex = 0
        habits.list[habitIndex].executions_count = 0

        habits.newExecution(habitIndex)

        expect(habits.list[habitIndex].executions_count).toBe(1)
    })
})
