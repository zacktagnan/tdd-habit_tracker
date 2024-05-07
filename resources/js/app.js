import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler.js';
import HabitList from '@/components/Habit/List.vue'

import { createPinia } from 'pinia';

import Alpine from 'alpinejs'
window.Alpine = Alpine

const pinia = createPinia()

Alpine.start()

createApp({
    components: {
        'habit-list': HabitList,
    }
}).use(pinia).mount('#app')
