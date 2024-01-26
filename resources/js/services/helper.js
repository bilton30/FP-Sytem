import axios from "axios";
function formattedPrice(amount) {
    return new Intl.NumberFormat("pt-PT", {
        style: "decimal",
        minimumFractionDigits: 2,
        maximumFractionDigits: 2,
    }).format(amount);
}

function formattedPricePrefix(amount) {
    return formattedPrice(amount) + " MT";
}

function formatNumberRounded(amount) {
    if (amount >= 1000000) {
        return (amount / 1000000).toFixed(2) + "M";
    }
    // else if (amount >= 1000) {
    //   return (amount / 1000).toFixed(2) + 'K';
    // }
    else {
        return new formattedPrice(amount);
    }
}

function replacePoints(message) {
    // Replace dots with spaces, ignoring dots at the end of the sentence.
    return message.slice(0, -1).replace(/\./g, " ") + message.slice(-1);
}
// function prepareForm(form, method = 'POST') {
//     const formData = new FormData();
//     for (const key in form) {
//       if (typeof form[key] === 'object') {
//         for (let i = 0; i < form[key].length; i++) {
//           // formData.append(`${key}[${i}]`, form[key][i]);
//           if (typeof form[key][i] !== 'object') {
//             formData.append(`${key}[${i}]`, form[key][i]);
//             console.log("aqui")
//           }
//           for (const subKey in form[key][i]) {
//             formData.append(`${key}[${i}][${subKey}]`, form[key][i][subKey]);
//             console.log("aqui2")
//           }
//         }
//       } else {
//         formData.append(key, form[key]);
//       }
//     }
//     formData.append("_method", method);
//     return formData
//   }


  function prepareForm(form, method = 'POST') {
    const formData = new FormData();


    const appendToFormData = (key, value) => {
        if (Array.isArray(value)) {
            for (let i = 0; i < value.length; i++) {
                if (typeof value[i] !== 'object') {
                    formData.append(`${key}[${i}]`, value[i]);
                } else {
                    for (const subKey in value[i]) {
                        appendToFormData(`${key}[${i}][${subKey}]`, value[i][subKey]);
                    }
                }
            }
        } else if (typeof value === 'object' && value !== null) {
            for (const subKey in value) {
                appendToFormData(`${key}[${subKey}]`, value[subKey]);
            }
        } else {
            formData.append(key, value);
        }
    };

    for (const key in form) {
        appendToFormData(key, form[key]);
    }

    formData.append("_method", method);
    return formData;
}
export {
    formattedPrice,
    formattedPricePrefix,
    formatNumberRounded,
    replacePoints,
    prepareForm,
 
};
