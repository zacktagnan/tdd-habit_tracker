<script setup>
import { TransitionRoot, TransitionChild, Dialog, DialogPanel, DialogTitle } from '@headlessui/vue'
import { useHabitsStore } from '@/stores/habits'
import { ref } from 'vue'

const habits = useHabitsStore()

const loading = ref(false)

const submitForm = async() => {
    loading.value = true
    if (habits.formData.id) {
        await habits.update()
    } else {
        await habits.store()
    }
    loading.value = false
}
</script>

<template>
    <TransitionRoot appear="" :show="habits.isFormDialogOpen" as="template">
        <Dialog as="div" @close="habits.closeFormDialog" class="relative z-10">
            <TransitionChild as="template" enter="duration-300 ease-out" enter-from="opacity-0" enter-to="opacity-100"
                leave="duration-200 ease-in" leave-from="opacity-100" leave-to="opacity-0">
                <div class="fixed inset-0 bg-black bg-opacity-25" />
            </TransitionChild>

            <div class="fixed inset-0 overflow-y-auto">
                <div class="flex items-center justify-center min-h-full p-4 text-center">
                    <TransitionChild as="template" enter="duration-300 ease-out" enter-from="opacity-0 scale-95"
                        enter-to="opacity-100 scale-100" leave="duration-200 ease-in" leave-from="opacity-100 scale-100"
                        leave-to="opacity-0 scale-95">
                        <DialogPanel
                            class="w-full max-w-md p-6 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl">
                            <DialogTitle as="h3" class="text-lg font-semibold leading-6 text-gray-900">
                                {{
                                    habits.formData.id
                                        ? $t('habits.index.form.update_section_label')
                                        : $t('habits.index.form.store_section_label')
                                }}
                            </DialogTitle>

                            <div class="mt-2">
                                <div class="mt-4">
                                    <label for="name" class="block text-sm font-medium text-gray-700">
                                        {{ $t('habits.index.form.name_label_input') }}
                                    </label>
                                    <input type="text" v-model="habits.formData.name" name="name"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-primary-400">
                                    <span v-if="habits.validationErrors.hasOwnProperty('name')"
                                        class="text-xs text-red-600">
                                        {{ habits.validationErrors.name[0] }}
                                    </span>
                                </div>

                                <div class="mt-4">
                                    <label for="times_per_day" class="block text-sm font-medium text-gray-700">
                                        {{ $t('habits.index.form.times_per_day_label_input') }}
                                    </label>
                                    <input type="text" v-model="habits.formData.times_per_day" name="times_per_day"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-primary-400">
                                    <span v-if="habits.validationErrors.hasOwnProperty('times_per_day')"
                                        class="text-xs text-red-600">
                                        {{ habits.validationErrors.times_per_day[0] }}
                                    </span>
                                </div>
                            </div>

                            <div class="flex justify-end mt-6">
                                <button :disabled="loading" @click="submitForm" type="button"
                                    :title="habits.formData.id
                                        ? $t('habits.index.button.update')
                                        : $t('habits.index.button.store')"
                                    class="inline-flex items-center bg-primary-600 hover:bg-primary-400 px-3.5 py-2 rounded-md text-sm font-medium text-white">
                                    <span v-if="!loading" class="mx-1">
                                        {{
                                            habits.formData.id
                                                ? $t('habits.index.button.update')
                                                : $t('habits.index.button.store')
                                        }}
                                    </span>

                                    <svg v-if="loading" class="w-5 h-5 ml-2 mr-2 text-white animate-spin"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                            stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>
