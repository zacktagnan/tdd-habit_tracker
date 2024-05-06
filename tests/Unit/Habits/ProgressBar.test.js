import { describe, it, expect, beforeEach } from "vitest";
import { mount } from "@vue/test-utils";
import ProgressBar from '@/components/Habit/ProgressBar.vue'

describe('ProgressBar.vue', () => {
    let wrapper = null

    beforeEach(() => {
        wrapper = mount(ProgressBar, {
            props: {
                percent: 30,
            }
        })
    })

    it('displays the habit percentage', () => {
        expect(wrapper.find('#percent').text()).toBe('30%')
    })
})
