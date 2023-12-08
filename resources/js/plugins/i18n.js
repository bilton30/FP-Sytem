import { createI18n } from 'vue-i18n'
const messages = {
    pt: {  // Português (aqui assumindo que você está usando o português como idioma)
      currency: {
        style: 'currency',
        currency: 'MZN'  // Defina a moeda como MZN (Metical)
      }
    },
    // Outras localizações podem ser adicionadas aqui, se necessário
  }
  const i18n = createI18n({
    locale: 'pt', // Defina a localização padrão
    messages
    })

  
  export default i18n