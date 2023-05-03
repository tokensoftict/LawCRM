
const helpers = {

    error(notify,title,message){
        notify({
            title:title,
            text:message,
            type: 'error',
            duration: 3000,
        })
        this._alert(message,'error')
    },
    success(notify,title,message){
        notify({
            title:title,
            text:message,
            type: 'success',
            duration: 3000,
        });

        this._alert(message,'success')
    },
    warning(notify,title,message){
        notify({
            title:title,
            text:message,
            type: 'warning',
            duration: 3000,
        })
        this._alert(message,'warning')
    },
    _alert(msg = '', type = 'success'){
        const toast = window.Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: 3000,
        });
        toast.fire({
            icon: type,
            title: msg,
            padding: '10px 20px',
        });
    }


}


export default helpers;
