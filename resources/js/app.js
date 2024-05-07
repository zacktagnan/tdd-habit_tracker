import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler.js';
import HabitInfo from '@/components/Habit/Info.vue'
import ExecuteButton from '@/components/Habit/ExecuteButton.vue'
import ProgressBar from '@/components/Habit/ProgressBar.vue'

import Alpine from 'alpinejs'
window.Alpine = Alpine

Alpine.start()

createApp({
    components: {
        'habit-info': HabitInfo,
        'execute-button': ExecuteButton,
        'progress-bar': ProgressBar,
    }
}).mount('#app')
