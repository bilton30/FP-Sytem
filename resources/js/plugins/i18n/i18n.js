import { createI18n } from "vue-i18n";
import pt from "./lang/pt.json";
const messages = {
    pt: pt,

};
const i18n = createI18n({
    locale: "pt", // Defina a localização padrão
    messages,
});

export default i18n;
