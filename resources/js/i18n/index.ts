import { createI18n } from 'vue-i18n';

import en from './en.json';
import fr from './fr.json';

export const i18n = createI18n({
    legacy: false, // IMPORTANT avec <script setup>
    locale: localStorage.getItem('locale') ?? 'fr',
    fallbackLocale: 'en',
    messages: {
        fr,
        en,
    },
});
