export function validateField(vm,fields,ignoreIndices=[]){
    let value = true
    Object.keys(fields).forEach(item => {
      if (ignoreIndices.includes(item)) {
        return; 
      }
       if(!fields[item]){
        // console.log(item,fields[item]);
          vm.$q.notify({
              color: 'red-5',
              textColor: 'white',
              icon: 'warning',
              message: 'Please type your '+formatarString(item)
            })
        value = false
       }
    });
    return value
  }

  export function formatarString(str) {
    return str
        .replace(/([a-z])([A-Z])/g, '$1 $2') // Adiciona um espaço entre letras maiúsculas e minúsculas
        .replace(/_/g, ' ') // Substitui underscores (_) por espaços
        .toLowerCase(); // Converte a string para letras minúsculas
}