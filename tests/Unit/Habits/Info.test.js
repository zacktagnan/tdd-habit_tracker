import { describe, it, expect, beforeEach } from "vitest";
import { mount } from "@vue/test-utils";
import HabitInfo from '@/components/Habit/Info.vue'

describe('HabitInfo.vue', () => {
    let wrapper = null

    beforeEach(() => {
        wrapper = mount(HabitInfo, {
            props: {
                name: 'Beber agua'
            }
        })
    })

    it('displays the habit executions', () => {
        expect(wrapper.find('#executions').text()).toBe('1 / 3 veces')
    })
})
