import Vue from 'vue';
import Vuetify from 'vuetify/lib';

Vue.use(Vuetify);

export default new Vuetify({
    theme: {
        options: {
            customProperties: true
        },
        themes: {
            light: {
                primary: '#795548',
                secondary: '#A1887F',
                accent: '#FFCA28',
                error: '#FF5252',
                info: '#2196F3',
                success: '#4CAF50',
                warning: '#f3a040'
            },
            dark: {
                primary: '#795548',
                secondary: '#A1887F',
                accent: '#FFCA28',
                error: '#FF5252',
                info: '#2196F3',
                success: '#4CAF50',
                warning: '#f3a040'
            }
        }
    }
})
