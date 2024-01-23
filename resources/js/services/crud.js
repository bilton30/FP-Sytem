var crud = {

    create: function (){
      axios
      .post("/roles", formData, {})
      .then((response) => {
        this.initialize()
        this.close();
        this.loading = false;
        this.$q.dialog({
          title: 'Success',
          message: '' + response.data.message,
        })
      })
      .catch((error) => {
        this.loading = false;
        if (error.response.data.errors === undefined) {
          // console.log(error.response.data);
          this.close();
          this.$q.dialog({
            title: "Erro!",
            text: "" + error.response.data.message,
            icon: "error"
          });
        } else {
          setTimeout(function () {
            window.scrollTo(0, 0);
          }, 300);
          this.errors = error.response.data.errors
        }
      });
  
    },
    read:function (){
  
    },
    update: function () {
      
    },
    delete:function (){
  
    },
  }
  export {crud}

  