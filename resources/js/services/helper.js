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

// var crud = {
//     create: function (url, formData, successCalback, errorCalback) {
//         let loading = true;
//             axios
//                 .post(url, formData, {})
//                 .then((response) => {
//                   successCalback(response);
//                     // loading = false;
//                     // this.$q.dialog({
//                     //     title: "Success",
//                     //     message: "" + response.data.message,
//                     // });
//               // Resolve com os dados bem-sucedidos
//                 })
//                 .catch((error) => {
                  
//                     if (error.response.data.errors === undefined) {
//                       errorCalback([])
//                         this.$q.dialog({
//                             title: "Error!",
//                             text: "" + error.response.data.message,
//                             icon: "error",
//                         });
//                     } else {
//                       errorCalback(error.response.data.errors);
//                         setTimeout(() => {
//                             window.scrollTo(0, 0);
//                         }, 300);
                       
                       
//                     }

//                 });
//     },
//     read: function () {},
//     update: function () {},
//     delete: function () {},
// };
export {
    formattedPrice,
    formattedPricePrefix,
    formatNumberRounded,
    replacePoints,
 
};
