<script setup>
import { TransitionRoot, TransitionChild, Dialog, DialogPanel, DialogTitle } from '@headlessui/vue'
import { useHabitsStore } from '@/stores/habits'
import { ref } from 'vue'

const habits = useHabitsStore()

const loading = ref(false)

const cancelForm = () => {
    habits.closeConfirmDialog()
}

const confirmForm = () => {
    loading.value = true
    // habits.destroy()
    habits.destroy(habits.confirmIndex)
    loading.value = false
}
</script>

<template>
    <TransitionRoot appear="" :show="habits.isConfirmDialogOpen" as="template">
        <Dialog as="div" @close="habits.closeConfirmDialog" class="relative z-10">
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
                            class="w-full max-w-md p-6 overflow-hidden text-left align-middle transition-all transform bg-red-200 shadow-xl rounded-2xl">
                            <DialogTitle as="h3" class="text-lg font-semibold leading-6 text-red-700">
                                {{ $t('habits.index.confirm.confirm_section_label') }}
                            </DialogTitle>

                            <div class="mt-2">
                                <div>
                                    <p>{{ $t('habits.index.confirm.question') }}</p>
                                    <p class="mt-1 italic font-semibold text-center">{{ habits.confirmHabitName }}</p>
                                </div>
                            </div>

                            <div class="flex justify-end mt-2">
                                <button :title="$t('habits.index.button.cancel')" :disabled="loading"
                                    @click="cancelForm" type="button"
                                    class="inline-flex items-center bg-gray-600 px-3.5 py-2 rounded-md text-xs font-medium text-white">
                                    <span class="mx-1">{{ $t('habits.index.button.cancel') }}</span>
                                </button>
                                <button :title="$t('habits.index.button.confirm')" :disabled="loading"
                                    @click="confirmForm" type="button"
                                    class="ml-2 inline-flex items-center bg-red-600 px-3.5 py-2 rounded-md text-xs font-medium text-white">
                                    <span v-if="!loading" class="mx-1">{{ $t('habits.index.button.confirm') }}</span>

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
