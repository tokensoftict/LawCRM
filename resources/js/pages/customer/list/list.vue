<template src="./list.html"></template>

<script>

import {CustomerService} from "../customer-service";
import _ from "lodash";

export default {

    data(){
        return {
            'search' : '',
            'customers' : [],
            cacheCustomer :[],
        }
    },

    methods : {

        productSearch(event)
        {
            if(event.target.value.length > 2)
            {
                this.customer_Search(event.target.value,this);
            }else
            {
                this.customers = this.cacheCustomer;
            }
        },

        customer_Search : _.debounce(( search, vm) => {
            vm.customerService.search(search)
                .then((response)=>{
                    vm.customers = response.data.data;
                });
        }),

    },

    computed : {
        customerService() {
            return new CustomerService(this.$api)
        },
    },

    mounted() {

        this.customerService.get().then((response) => {
            this.customers = response.data.data;
            this.cacheCustomer = response.data.data;
        });


    }

}

</script>
