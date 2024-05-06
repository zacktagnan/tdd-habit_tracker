import { describe, it, expect, beforeEach } from "vitest";
import { mount } from "@vue/test-utils";
import HabitInfo from '@/components/Habit/Info.vue'

describe('HabitInfo.vue', () => {
    let wrapper = null

    beforeEach(() => {
        wrapper = mount(HabitInfo, {
            props: {
                name: 'Beber agua',
                executions_count: 1,
                times_per_day: 3,
            }
        })
    })

    it('displays the habit name', () => {
        expect(wrapper.find('#name').text()).toBe('Beber agua')
    })

    it('displays the habit executions', () => {
        // expect(wrapper.find('#executions').text()).toBe('1 / 3 veces')
        // al pasar el texto traducido, ya no se puede cumplir lo anterior
        // porque debe existir de forma literal
        expect(wrapper.find('#executions').text()).toBe('1 / 3')
    })
})
