<template src="./profile.html"></template>

<script>

import {CustomerService} from "../customer-service";

export default {

    data() {
        return {
            passport : null,
            loading : false,
            case_details : '',
            case_details_error : '',
            cases : [],
            data : {
                'firstname' : '',
                'lastname' : '',
                'email' : '',
                'legal_counsel' : '',
                'dob' : '',
                'profile_date' : '',
                'image' : ''
            },
        }
    },

    computed: {
        customerService() {
            return new CustomerService(this.$api)
        },
    },

    methods : {

        createCase(){

            if(this.case_details === "") {
                this.case_details_error = 'This field is required, can not be blank';
                return ;
            }

            this.loading = true;

            let data = {'case_details' : this.case_details};

            this.customerService.addCase(this.id, data)
                .then((response) => {
                    this.data = response.data.data
                    this.cases = response.data.data.cases
                    this.loading = false
                    this.$refs.close.click();
                    this.$helper.success(this.$notify, 'Law CRM', 'Customer Case has been added successfully!')
                });

        },

        getProfile()
        {
            if(this.id !== undefined)
            {
                this.customerService.show(this.id)
                    .then((response) => {
                        this.data = response.data.data
                        this.cases = response.data.data.cases
                    });
            }
        }

    },

    props : ["id"],

    mounted() {
        this.getProfile();
    }
}

</script>
