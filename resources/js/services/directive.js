export const can = {
    mounted(el, binding) {
      el.hidden = !Permissions.includes(binding.value);
    },
  };
  
  export const canany = {
    mounted(el, binding) {
      const permissions = binding.value.split(',');
      let can = false;
  
      permissions.forEach((permission) => {
        if (Permissions.includes(permission)) {
          can = true;
          return;
        }
      });
  
      el.hidden = !can;
    },
  };