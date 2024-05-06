import { describe, it, expect } from "vitest";
import { mount } from "@vue/test-utils";
import HabitInfo from '@/components/Habit/Info.vue'

describe('HabitInfo.vue', () => {
    it('displays the habit name', () => {
        const wrapper = mount(HabitInfo, {
            props: {
                name: 'Beber agua'
            }
        })

        expect(wrapper.find('#name').text()).toBe('Beber agua')
    })
})
