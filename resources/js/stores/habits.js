import axios from "axios";
import { defineStore } from "pinia";
import { reactive, ref } from "vue";

export const useHabitsStore = defineStore('habits', () => {
    const list = ref([])
    const isFormDialogOpen = ref(false)
    const isConfirmDialogOpen = ref(false)
    const confirmIndex = ref('')
    const confirmMessage = ref('')

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

    const openFormDialog = () => {
        isFormDialogOpen.value = true
    }

    const closeFormDialog = () => {
        isFormDialogOpen.value = false
        setTimeout(() => resetErrorsAndForm(), 500)
    }

    const openConfirmDialog = () => {
        isConfirmDialogOpen.value = true
    }

    const closeConfirmDialog = () => {
        isConfirmDialogOpen.value = false
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

            // Excepto la primera carga del DATA desde el FETCH, en los demás,
            // si el ORDER de la consulta es el de DESC, habrá que establecer
            // el REVERSE en esta carga para respetar el ORDER inicial
            list.value = response.data.data.reverse()
            closeFormDialog()
        } catch (error) {
            console.log(error)
            if (error.response.status == 422) {
                validationErrors.value = error.response.data.errors
            }
        }
    }

    const edit = (habitIndex) => {
        formData.id = list.value[habitIndex].id
        formData.name = list.value[habitIndex].name
        formData.times_per_day = list.value[habitIndex].times_per_day

        openFormDialog()
    }

    const update = async () => {
        try {
            let response = await axios.put(`/api/habits/${formData.id}/update`, formData)

            list.value = response.data.data.reverse()
            closeFormDialog()
        } catch (error) {
            console.log(error)
            if (error.response.status == 422) {
                validationErrors.value = error.response.data.errors
            }
        }
    }

    // const destroy = async (habitIndex) => {
    const destroy = async () => {
        try {
            let response = await axios.delete(`/api/habits/${confirmIndex.value}/destroy`)

            list.value = response.data.data.reverse()
            closeConfirmDialog()
        } catch (error) {
            console.log(error)
        }
    }

    const confirm = (habitIndex) => {
        confirmIndex.value = list.value[habitIndex].id
        confirmMessage.value = list.value[habitIndex].name

        openConfirmDialog()
    }

    return {
        list,
        isFormDialogOpen,
        isConfirmDialogOpen,
        confirmIndex,
        confirmMessage,
        validationErrors,
        formData,
        fetch,
        newExecution,
        percent,
        openFormDialog,
        closeFormDialog,
        openConfirmDialog,
        closeConfirmDialog,
        store,
        edit,
        update,
        destroy,
        confirm,
    }
})
