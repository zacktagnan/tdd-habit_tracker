import { describe, it, expect, beforeEach } from "vitest";
import { mount } from "@vue/test-utils";
import ExecuteButton from '@/components/Habit/ExecuteButton.vue'

describe('ExecuteButton.vue', () => {
    let wrapper = null

    beforeEach(() => {
        wrapper = mount(ExecuteButton)
    })

    it('renders the execution button', () => {
        expect(wrapper.find('#execute').text()).toBe('+1')
    })

    it('increment the executions', async () => {
        await wrapper.find('#execute').trigger('click')
        expect(wrapper.emitted('newExecution')).toBeTruthy()
    })
})
