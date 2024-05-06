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

    it('displays the habit name', () => {
        expect(wrapper.find('#name').text()).toBe('Beber agua')
    })
})
