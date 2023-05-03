export class CustomerService {

    constructor(http)
    {
        this.$http = http;
    }

    get()
    {
        return this.$http.get("customer");
    }


    search(s)
    {
        return this.$http.get("customer?criterial="+encodeURI(s));
    }

    remove(id)
    {
        return this.$http.delete("customer/"+id);
    }

    save(data, id)
    {
        if(id === undefined) {
            return this.post(data)
        }
        else {
            return this.update(data,id)
        }
    }


    post(data)
    {
        return this.$http.post("customer",data);
    }

    update(data, id)
    {
        if(data instanceof FormData) {
            data.set("_method", "PUT");
        }
        else {
            data['_method'] = "PUT";
        }
        return this.$http.post("customer/"+id,data);
    }

    show(id)
    {
        return this.$http.get('customer/'+id)
    }

    addCase(customer_id, data)
    {
        return this.$http.post('customer/'+customer_id+'/create_case', data);
    }

}
