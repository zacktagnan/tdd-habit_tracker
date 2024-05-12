import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler.js';
import MainDialog from '@/components/MainDialog.vue'
// import ConfirmDialog from '@/components/ConfirmDialog.vue'
import HabitList from '@/components/Habit/List.vue'

import { createPinia } from 'pinia';

// import HabitFormDialog from '@/components/Habit/FormDialog.vue'
import HabitNewButton from '@/components/Habit/NewButton.vue'

import Alpine from 'alpinejs'
window.Alpine = Alpine

const pinia = createPinia()

Alpine.start()

createApp({
    components: {
        'main-dialog': MainDialog,
        // 'confirm-dialog': ConfirmDialog,
        'habit-list': HabitList,
        // 'habit-form-dialog': HabitFormDialog,
        'habit-new-button': HabitNewButton,
    }
}).use(pinia).mount('#app')
