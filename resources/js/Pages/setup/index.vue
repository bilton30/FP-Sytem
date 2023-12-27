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
                                <label class="form-label">manually enter the company's identification data below.</label>
                                <div class="form-row">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" v-model="form.name"  placeholder="company Name" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="nuit" v-model="form.nuit"  id="nuit" placeholder="Nuit" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email"  v-model="form.email"  id="email" placeholder="Email" />
                                </div>
                                <div class="form-group">

                                    <input type="file" id="file-input"  name="file-input"   accept="image/*" />

                                    <label id="file-input-label" for="file-input">Select the company logo file</label>
                                </div>

                                <div class="form-row">
                                    <div class="form-group">
                                        <input type="text" name="contact1"  v-model="form.contact1"  id="contact1" placeholder="Phone number" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="contact2" id="contact2"  v-model="form.contact2" 
                                            placeholder="Alternative Phone number" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="address " id="address "   v-model="form.address" placeholder="address" />
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
                            </figure>{{ form.branch.length  }}

                            <div class="fieldset-content" v-if="form.branch.length > 0">
                                <label class="form-label">Enter the identification details for all branches or
                                    subsidiaries.</label>
                                <div v-for="index in form.branchNumber" :key="index">

                                    <div class="form-group" style=" font-size: 22px;" >
                                        <label for="rating_quanlity" >Branch {{ index }} Registration Form.</label>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group">
                                            <input type="text" name="name" v-model="form.branch[index-1].name"  id="name" placeholder="Company Name" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="nuit" v-model="form.branch[index-1].nuit" id="nuit" placeholder="Nuit" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" v-model="form.branch[index-1].email" id="email" placeholder="Email" />
                                    </div>
                                    <div class="form-group">

                                        <input type="file" id="file-input" name="file-input" accept="image/*" />

                                        <label id="file-input-label" for="file-input">Select the company logo file</label>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group">
                                            <input type="text" name="contact1" v-model="form.branch[index-1].contact1" id="contact1" placeholder="Phone number" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="contact2" id="contact2" v-model="form.branch[index-1].contact2"
                                                placeholder="Alternative Phone number" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="address " id="address " v-model="form.branch[index-1].address" placeholder="address" />
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
                branch:[] 
            },
            currentStep: 0,
            totalStep: 2,
            tab: 'cashier'

        }
    },
    watch: {
        'form.branchNumber': function (val, oldVal) {
            this. add()
            if (this.form.branchNumber >= 1) {
                this.totalStep = 3
                // console.log('Valor atual:', val);
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
                this.submitForm()
                return
            }
        },
        submitForm() {
            this.$refs.dialogRef.show()
        },
        add(){
         
            for (let index = 0; index < this.form.branchNumber; index++) {
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
</style>