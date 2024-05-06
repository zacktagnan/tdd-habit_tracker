import { describe, it, expect, beforeEach } from "vitest";
import { mount } from "@vue/test-utils";
import ExecutionButton from '@/components/Habit/ExecutionButton.vue'

describe('ExecutionButton.vue', () => {
    let wrapper = null

    beforeEach(() => {
        wrapper = mount(ExecutionButton)
    })

    it('renders the execution button', () => {
        expect(wrapper.find('#execute').text()).toBe('+1')
    })
})
