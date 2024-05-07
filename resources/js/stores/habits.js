import axios from "axios";
import { defineStore } from "pinia";
import { ref } from "vue";

export const useHabitsStore = defineStore('habits', () => {
    const list = ref([])

    const fetch = async () => {
        try {
            let response = await axios.get('/api/habits')
            list.value = response.data.data
        } catch (error) {
            console.log(error)
        }
    }

    const newExecution = (habitIndex) => {
        list.value[habitIndex].executions_count++
    }

    return {
        list,
        fetch,
        newExecution,
    }
})
