require('./bootstrap');

import { createApp } from 'vue'
import Feedback from './components/Feedback'

const app = createApp({})

app.component('feedback', Feedback)

app.mount('#app')