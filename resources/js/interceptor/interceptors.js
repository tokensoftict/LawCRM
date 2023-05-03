import axios from 'axios';
import environment from "../environment";


const instance = axios.create()

instance.interceptors.request.use(function (request) {


    request.baseURL = environment[import.meta.env.MODE].baseUrl

    request.transformRequest = [function (data, headers) {

        let form_data = new FormData();

        if(!(data instanceof FormData)) {
            for (let key in data ) {
                if(typeof  data[key] == "object"){
                    form_data.append(key, JSON.stringify(data[key]));
                }else{
                    form_data.append(key, data[key]);
                }
            }
        }
        else {
            form_data = data
        }

        return form_data;
    }];
    return request;
}, function (error) {
    // Do something with request error
    return Promise.reject(error);
});

instance.interceptors.response.use((response) => response, (error) => {

});


export  default instance;


