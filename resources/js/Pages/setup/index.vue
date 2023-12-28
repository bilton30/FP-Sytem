<template>
    <div class="main">

        <div class="container">
            <form method="POST" id="signup-form" class="signup-form wizard clearfix" enctype="multipart/form-data"
                role="application">
                <div class="steps clearfix">
                    <ul role="tablist">
                        <li role="tab" class="first done" aria-disabled="false" aria-selected="false">
                            <a id="signup-form-t-0" href="#signup-form-h-0" aria-controls="signup-form-p-0">
                                <h3 class="title"></h3>
                            </a>
                        </li>
                        <li role="tab" class="current" aria-disabled="false" aria-selected="true">
                            <a id="signup-form-t-1" href="#signup-form-h-1" aria-controls="signup-form-p-1">
                                <span class="current-info audible"> </span>
                                <h3 class="title"></h3>
                            </a>
                        </li>
                        <li role="tab" class="last done" aria-disabled="false" aria-selected="false">
                            <a id="signup-form-t-2" href="#signup-form-h-2" aria-controls="signup-form-p-2">
                                <h3 class="title"></h3>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="content clearfix">
                    <h3 id="signup-form-h-0" tabindex="-1" class="title"></h3>
                    <fieldset id="signup-form-p-0" role="tabpanel" aria-labelledby="signup-form-h-0" class="body current"
                        aria-hidden="true" style="">
                        <span class="step-current">
                            <span class="step-current-content">
                                <span class="step-number"><span>0{{ currentStep + 1 }}</span>/0{{ totalStep }}</span>
                                <span class="step-inner step-inner-1"></span>
                                <span class="step-inner step-inner-1"></span>
                                <span class="step-inner step-inner-1"></span>
                            </span>
                        </span>
                        <div class="fieldset-flex">
                            <figure>
                                <img src="/images/Fill-out-amico.png" alt="">
                            </figure>
                            <div class="fieldset-content">

                                <div style="margin-right: 10px;">
                                    <label class="form-label">manually enter the company's identification data
                                        below.</label>
                                    <div class="alert alert-danger" v-if="errors.length" role="alert">
                                        <b>Please correct the following error(s):</b>
                                        <ul class="alert-ul">
                                            <li v-for="error in errors" key="error">{{ replacePoints(error) }}</li>
                                        </ul>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" v-model="form.name"
                                                placeholder="company Name" @input="removeErrorMessage('name')" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="nuit" v-model="form.nuit" id="nuit"
                                                @input="removeErrorMessage('nuit')" placeholder="Nuit" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" v-model="form.email" id="email"
                                            @input="removeErrorMessage('email')" placeholder="Email" />
                                    </div>
                                    <div class="form-group">

                                        <input type="file" id="file-input" @change="handleFileChange" name="file-input"
                                            accept="image/*" />

                                        <label id="file-input-label" for="file-input">Select the company logo file</label>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group">
                                            <input type="text" name="contact1" v-model="form.contact1" id="contact1"
                                                @input="removeErrorMessage('contact1')" placeholder="Phone number" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="contact2" id="contact2" v-model="form.contact2"
                                                @input="removeErrorMessage('contact2')"
                                                placeholder="Alternative Phone number" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="address " id="address " v-model="form.address"
                                            @input="removeErrorMessage('address')" placeholder="address" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <h3 id="signup-form-h-1" tabindex="-1" class="title current"></h3>
                    <fieldset id="signup-form-p-1" role="tabpanel" aria-labelledby="signup-form-h-1" class="body current"
                        aria-hidden="false" style="display: none;">
                        <span class="step-current">
                            <span class="step-current-content">
                                <span class="step-number"><span>0{{ currentStep + 1 }}</span>/0{{ totalStep }}</span>
                            </span>
                        </span>
                        <div class="fieldset-flex">
                            <figure>
                                <img src="/images/FAQ8.png" alt="" height="260" width="290">
                            </figure>
                            <div class="fieldset-content">
                                <label for="your_review" class="form-label">The organization has branches or subsidiaries
                                    that need to be registered?</label>

                                <div class="form-flex">
                                    <label for="branch">Yes</label>
                                    <div class="form-radio">
                                        <input type="radio" id="branch" name="branch" v-model="form.haveBranch"
                                            value="1" /><label for="branch" title="Rocks!"></label>
                                    </div>
                                    <label for="branch">No</label>
                                    <div class="form-radio">
                                        <input type="radio" id="branch" name="branch" v-model="form.haveBranch"
                                            value="0" /><label for="branch" title="Rocks!"></label>
                                    </div>
                                </div>
                                <div v-if="form.haveBranch == 1">
                                    <div class="form-group" style=" font-size: 22px;">
                                        <label for="rating_quanlity">How many branches or subsidiaries does the company
                                            have?</label>
                                    </div>
                                    <div class="form-group">

                                        <input type="number" name="branch_number " v-model="form.branchNumber" @input="add"
                                            placeholder="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <h3 id="signup-form-h-2" tabindex="-1" class="title"></h3>
                    <fieldset id="signup-form-p-2" role="tabpanel" aria-labelledby="signup-form-h-2" class="body current"
                        aria-hidden="true" style="display: none;">
                        <!-- Step 3 content here -->
                        <span class="step-current">
                            <span class="step-current-content">
                                <span class="step-number"><span>0{{ currentStep + 1 }}</span>/0{{ totalStep }}</span>
                            </span>
                        </span>
                        <div class="fieldset-flex">
                            <figure>
                                <img src="/images/branch.png" alt="">
                            </figure>

                            <div class="fieldset-content" v-if="form.branch.length == form.branchNumber">
                                <label class="form-label">Enter the identification details for all branches or
                                    subsidiaries.</label>
                                <div class="alert alert-danger" v-if="errors.length" role="alert">
                                    <b>Please correct the following error(s):</b>
                                    <ul class="alert-ul">
                                        <li v-for="error in errors" key="error">{{ replacePoints(error) }}</li>
                                    </ul>
                                </div>
                                <div v-for="index in form.branchNumber" :key="index" style="margin-right: 10px;">

                                    <div class="form-group" style=" font-size: 22px;" v-if="form.branch.length > 1">
                                        <label for="rating_quanlity">Branch {{ index }} Registration Form.</label>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group">
                                            <input type="text" name="name" v-model="form.branch[index - 1].name"
                                                @input="callRemoveErrorMessage(index - 1, 'name')"
                                                placeholder="Company Name" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="nuit" v-model="form.branch[index - 1].nuit" id="nuit"
                                                @input="callRemoveErrorMessage(index - 1, 'nuit')" placeholder="Nuit" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" v-model="form.branch[index - 1].email" id="email"
                                            @input="callRemoveErrorMessage(index - 1, 'email')" placeholder="Email" />
                                    </div>
                                    <div class="form-group">

                                        <input type="file" style=" display: none;" :id="`file-input_${index}`"
                                            :ref="`fileInputDynamic_${index}`" @change="handleDynamicFileChange(index)"
                                            name="file-input" accept="image/*" />

                                        <label id="file-input-label" :for="`file-input_${index}`">Select the company logo
                                            file</label>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group">
                                            <input type="text" name="contact1" v-model="form.branch[index - 1].contact1"
                                                @input="callRemoveErrorMessage(index - 1, 'contact1')" id="contact1"
                                                placeholder="Phone number" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="contact2" id="contact2"
                                                @input="callRemoveErrorMessage(index - 1, 'contact2')"
                                                v-model="form.branch[index - 1].contact2"
                                                placeholder="Alternative Phone number" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="address " id="address "
                                            @input="callRemoveErrorMessage(index - 1, 'address')"
                                            v-model="form.branch[index - 1].address" placeholder="address" />
                                    </div>


                                </div>
                            </div>
                        </div>


                    </fieldset>

                </div>
                <div class="actions clearfix">
                    <ul role="menu" aria-label="Pagination">
                        <li class="" aria-disabled="false">
                            <a href="#previous" @click="prev(currentStep - 1)" v-if="currentStep > 0"
                                role="menuitem">Prev</a>
                        </li>
                        <li aria-hidden="false" aria-disabled="false" class="" v-if="totalStep != currentStep + 1"
                            style="display: list-item;">
                            <a href="#next" @click="next(currentStep + 1)" role="menuitem">Next</a>
                        </li>
                        <li aria-hidden="true" v-if="totalStep == currentStep + 1">
                            <a href="#finish" :style="{ 'pointer-events': form.haveBranch === '' ? 'none' : 'auto' }"
                                :disabled="form.haveBranch == '' ? true : null" @click="next(currentStep + 1)"
                                role="menuitem">Submit</a>
                        </li>
                    </ul>
                </div>
            </form>
        </div>

    </div>
    <q-dialog ref="dialogRef" persistent transition-show="scale" transition-hide="scale">
        <q-card>
            <q-toolbar>
                <q-avatar style="height: 1.5em; width: 1.5em;">
                    <img src="/assets/images/64tu_58nt_220517.jpg">
                </q-avatar>

                <q-toolbar-title><span class="text-weight-bold">download the desktop application.</span> </q-toolbar-title>

                <q-btn flat round dense icon="close" v-close-popup />
            </q-toolbar>

            <q-card-section class="column items-center">
                Click the button below to download the desktop application.<br>
                <div class="q-pa-md q-gutter-md column items-center">
                    <q-btn color="teal">
                        <q-icon left size="3em" name="download" />
                        <div>download </div>
                    </q-btn>
                </div>
            </q-card-section>

        </q-card>
    </q-dialog>
</template>
  
<script>
import "../../../css/style.css";
import { router } from '@inertiajs/vue3'
import axios from "axios";
import { defineComponent, defineAsyncComponent } from 'vue'
export default defineComponent({
    name: 'post',
    props: {

    },
    components: {

        //  app,
    },
    data() {
        return {
            errors: [
            ],
            loading: false,
            dynamicFormFiles: [],
            staticFormFile: null,
            form: {
                haveBranch: '',
                branchNumber: 1,
                name: "",
                nuit: "",
                email: "",
                logo: "",
                address: "",
                contact1: "",
                contact2: "",
                branch: [
                    {
                        name: "",
                        nuit: "",
                        email: "",
                        logo: null,
                        address: "",
                        contact1: "",
                        contact2: "",
                    }
                ]
            },
            currentStep: 0,
            totalStep: 2,
            tab: 'cashier'
        }
    },
    watch: {
        'form.branchNumber': function (val, oldVal) {

            if (this.form.branchNumber >= 1) {
                this.totalStep = 3
            } else {
                this.totalStep = 2
            }
        },
        'form.haveBranch': function (val, oldVal) {

            if (this.form.haveBranch == 1) {
                this.totalStep = 3
            } else {
                this.totalStep = 2
            }
        }
    },
    mounted() {
        // console.log(this.data)

        // this.$refs.dialogRef.show()
    },

    methods: {
        activeByIndex(current) {
            for (let index = 0; index < this.totalStep; index++) {
                var element = document.getElementById("signup-form-p-" + index);
                if (current == index) {
                    if (element !== null) {
                        element.style.removeProperty("display");
                    }
                } else {
                    element.style.setProperty("display", "none");
                }
            }
        },
        prev(prev) {
            if (prev >= 0) {
                this.activeByIndex(prev)
                this.currentStep--
            } else {
                return
            }
        },
        next(next) {
            if (next != this.totalStep) {
                this.activeByIndex(next)
                this.currentStep++
            } else {
                this.loading = true
                this.submitForm()
                return
            }

        },
        handleFileChange(event) {
            this.form.logo = event.target.files[0];
            this.form.logo
            const label = document.querySelector('[for=file-input]');

            if (this.form.logo && this.form.logo.name) {
                // Obtenha o nome do arquivo e adicione em negrito
                const fileName = this.form.logo.name;
                label.innerHTML = `<strong style="color:#222;">${fileName}</strong>`;
            } else {
                // Se nenhum arquivo for selecionado, redefina o texto padrão
                label.innerHTML = 'Select the company logo file';
            }

        },
        handleDynamicFileChange(index) {
            const fileInput = this.$refs[`fileInputDynamic_${index}`][0];
            this.form.branch[index - 1].logo = fileInput.files[0];
            const label = document.querySelector(`[for=file-input_${index}]`);

            if (fileInput.files.length > 0) {
                // Obtenha o nome do arquivo e adicione em negrito
                const fileName = fileInput.files[0].name;
                label.innerHTML = ` <strong style="color:#222;">${fileName}</strong>`;
            } else {
                // Se nenhum arquivo for selecionado, redefina o texto padrão
                label.innerHTML = 'Select the company logo file';
            }

        },
        prepareForm() {
            const formData = new FormData();
            for (const key in this.form) {
                // Se o campo for um objeto (como branch), itere sobre seus subcampos
                if (typeof this.form[key] === 'object') {
                    for (let i = 0; i < this.form[key].length; i++) {
                        for (const subKey in this.form[key][i]) {
                            formData.append(`${key}[${i}][${subKey}]`, this.form[key][i][subKey]);
                        }
                        // Adicione o arquivo ao FormData para o formulário dinâmico
                    }
                } else {
                    formData.append(key, this.form[key]);
                }
            }
            if (this.form.logo) {
                formData.append('logo', this.form.logo);
            }
            return formData
        },
        submitForm() {
            if (this.form.haveBranch == 0) {
                this.form.branch[0].name = this.form.name
                this.form.branch[0].email = this.form.email
                this.form.branch[0].nuit = this.form.nuit
                this.form.branch[0].address = this.form.address
                this.form.branch[0].contact1 = this.form.contact1
                this.form.branch[0].contact2 = this.form.contact2
                this.form.branch[0].logo = this.form.logo
            }
            const formData = this.prepareForm()
            axios
                .post("/company", formData)
                .then(({ data: result }) => {
                    if (result.success) {
                        // alert("ok");
                        // this.$refs.dialogRef.show()

                        this.$q.dialog({
                            title: 'Success',
                            message: '' + result.message,

                        }).onDismiss(() => {
                            this.$refs.dialogRef.show()
                        })
                    } else {
                        console.log("Erro");
                        this.$q.dialog({
                            title: 'Error',
                            message: '' + result.message,
                        })
                    }
                    this.loading = false

                })
                .catch((error) => {
                    if (error.response.data.errors === undefined) {
                        // console.log(error.response.data);
                        this.$q.dialog({
                            title: "Erro!",
                            text: "" + error.response.data.message,
                            icon: "error"
                        });
                    } else {
                        this.errors = error.response.data.errors
                    }

                    this.currentStep = 1
                    this.prev(this.currentStep - 1)
                    this.loading = false

                })
        },

        add() {
            if (this.form.branchNumber !== '') {
                var totalToAdd = Math.abs(this.form.branchNumber - this.form.branch.length);
                for (let index = 0; index < totalToAdd; index++) {
                    this.form.branch.push({
                        name: "",
                        nuit: "",
                        email: "",
                        logo: "",
                        address: "",
                        contact1: "",
                        contact2: "",
                    });
                }
            }

        },
        replacePoints(message) {
            // Replace dots with spaces, ignoring dots at the end of the sentence.
            return message.slice(0, -1).replace(/\./g, ' ') + message.slice(-1);
        },
        callRemoveErrorMessage(branchIndex, fieldName) {
            // Calls the method removeErrorMessage with the specific field.
            this.removeErrorMessage(`branch.${branchIndex}.${fieldName}`);
        },
        removeErrorMessage(fieldName) {
            // Finds the index of the error message associated with the field.
            const index = this.errors.findIndex(message => message.toLowerCase().includes(fieldName.toLowerCase()));

            // Removes the error message if found.
            if (index !== -1) {
                this.errors.splice(index, 1);
            }
        },
    }
})
</script>

<style>
#file-input {
    display: none;
}

#file-input-label {
    /* font-size: 1.3em; */

    /* border: 1px solid black; */
    height: 50px;

    width: 100%;
    display: block;
    border: 1px solid #ebebeb;
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    -o-border-radius: 5px;
    -ms-border-radius: 5px;
    font-size: 14px;
    color: #999;
    font-weight: bold;
    /* font-family: "Poppins"; */
    padding: 15px 20px;
    box-sizing: border-box;
    font-weight: 500;
}

.alert {
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: .25rem;
}

.alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
}

.alert-ul {
    margin-block-start: 0.5em;
    margin-block-end: 0.5em;
}
</style>