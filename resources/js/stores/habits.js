import axios from "axios";
import { defineStore } from "pinia";
import { reactive, ref } from "vue";

export const useHabitsStore = defineStore('habits', () => {
    const list = ref([])
    const isDialogOpen = ref(false)

    const validationErrors = ref({})
    const formData = reactive({
        'id': '',
        'name': '',
        'times_per_day': '',
    })

    const fetch = async () => {
        try {
            let response = await axios.get('/api/habits')
            list.value = response.data.data
        } catch (error) {
            console.log(error)
        }
    }

    const newExecution = (habitIndex) => {
        if (list.value[habitIndex].executions_count < list.value[habitIndex].times_per_day) {
            list.value[habitIndex].executions_count++

            // axios.post('/api/habits/' + list.value[habitIndex].id + '/execution')
            // o
            axios.post(`/api/habits/${list.value[habitIndex].id}/execution`)
        }
    }

    const percent = (habitIndex) => {
        return list.value[habitIndex].times_per_day > 0
            ? Math.floor((list.value[habitIndex].executions_count / list.value[habitIndex].times_per_day) * 100)
            : 0
    }

    const openDialog = () => {
        isDialogOpen.value = true
    }

    const closeDialog = () => {
        resetErrorsAndForm()
        isDialogOpen.value = false
    }

    const resetErrorsAndForm = () => {
        validationErrors.value = {}
        formData.id = ''
        formData.name = ''
        formData.times_per_day = ''
    }

    const store = async () => {
        try {
            let response = await axios.post('/api/habits', formData)

            list.value = response.data.data
            closeDialog()
        } catch (error) {
            console.log(error)
            if (error.response.status == 422) {
                validationErrors.value = error.response.data.errors
            }
        }
    }

    const edit = async (habitIndex) => {
        formData.id = list.value[habitIndex].id
        formData.name = list.value[habitIndex].name
        formData.times_per_day = list.value[habitIndex].times_per_day

        openDialog()
    }

    const update = async () => {
        try {
            let response = await axios.put(`/api/habits/${formData.id}/update`, formData)

            list.value = response.data.data
            closeDialog()
        } catch (error) {
            console.log(error)
            if (error.response.status == 422) {
                validationErrors.value = error.response.data.errors
            }
        }
    }

    return {
        list,
        isDialogOpen,
        validationErrors,
        formData,
        fetch,
        newExecution,
        percent,
        openDialog,
        closeDialog,
        store,
        edit,
        update,
    }
})
