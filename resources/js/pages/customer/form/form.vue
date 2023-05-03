<template src="./form.html"></template>

<script>

import {CustomerService} from "../customer-service";

export default {
    data() {
        return {
            passport : null,
            data : {
                'firstname' : '',
                'lastname' : '',
                'email' : '',
                'legal_counsel' : '',
                'dob' : '',
                'profile_date' : '',
            },
            'loading' : false,
            'errors' : {
                'firstname' : '',
                'lastname' : '',
                'email' : '',
                'dob' : '',
                'legal_counsel' : '',
                'profile_date' : '',
                'passport' : ''
            }
        }
    },

    computed: {

        customerService() {
            return new CustomerService(this.$api)
        },
    },

    methods : {

        submitCustomer()
        {

            let error = false;

            let formData = new FormData;

            for (const key in this.data) {

                if(this.data[key] === ""){
                    this.errors[key] = "Sorry ! this field is required !"
                    error = true;
                }else{
                    this.errors[key] = ""; // clear existing errors
                }

                formData.append(key, this.data[key])
            }

            if(error === true)  return; // some fields are empty

            if(this.passport !== null)
            {
                formData.append('passport', this.passport); // the user select passport, adding passport to the form data
            }
            else {
                formData.delete('passport')
            }

            this.loading = true;

            this.customerService.save(formData, this.id)
                .then((response) => {
                    this.loading = false;
                    if(response.data.status === false){
                        for (const key in response.data.data) {
                            this.errors[key] = response.data.data[key][0];
                        }
                    }else{
                        setTimeout(() => {
                            this.$router.push({name : 'Customers'});
                        }, 1500)
                        this.$refs.customerForm.reset();

                        if(this.id === undefined){
                            this.$helper.success(this.$notify, 'Law CRM', 'Customer has been created successfully')
                        }else{
                            this.$helper.success(this.$notify, 'Law CRM', 'Customer has been updated successfully')
                        }

                    }

                })
                .catch((response) => {

                })
        },


        selectPassport(e)
        {
            this.passport = e.target.files[0];
        }

    },

    props : ["id"],

    mounted() {

        if(this.id !== undefined)
        {
            this.customerService.show(this.id)
                .then((response) => {
                        this.data = response.data.data
                });
        }
    }


}

</script>
