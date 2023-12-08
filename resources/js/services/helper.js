export function formattedPrice( amount) {
    return new Intl.NumberFormat('pt-PT', { style: 'decimal', minimumFractionDigits: 2, maximumFractionDigits: 2 }).format(amount);
  }
  export function formattedPricePrefix( amount) {
    return formattedPrice(amount)+" MT"
  }
  export function formatNumberRounded(amount) {
    if (amount >= 1000000) {
      return (amount / 1000000).toFixed(2) + 'M';
    } 
    // else if (amount >= 1000) {
    //   return (amount / 1000).toFixed(2) + 'K';
    // }
     else {
      return new formattedPrice(amount);
    }
  }