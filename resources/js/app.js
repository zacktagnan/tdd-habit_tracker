import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler.js';
import { i18nVue } from 'laravel-vue-i18n';

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
}).use(pinia)
    .use(i18nVue, {
        resolve: async lang => {
            const langs = import.meta.glob('../../lang/*.json');
            return await langs[`../../lang/${lang}.json`]();
        }
    })
    .mount('#app')
