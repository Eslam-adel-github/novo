import objectToFormData from 'object-to-formdata';

window.Helpers = new (class {
    
    /**
     * Confirmation Swal Delete Message.
     *
     * @param  {string} _route
     */
    KTSwalAjaxRemoveRequest(_route, _file) {
        swal.fire({
            title: 'Confirmation',
            text: 'Are You Sure You Want to Delete it?!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'yes',
            cancelButtonText: 'no',
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    method: 'POST',
                    url: _route,
                    data: {
                        file: _file,
                        _method: 'DELETE',
                    },
                    success (res) {
                        swal.fire( res.message, '' , 'success' );
                        location.reload();
                    },
                    error (xhr) {
                        swal.fire( 'faild_delete', '' , 'error' )
                    },
                });
            }
        });
    }

    /**
     * Append Validation Errors Comming From Laravel To a viewable array.
     *
     * @param  {array} messages
     * @return {array}
     */
    appendValidationErrors(messages, vue = null) {
        // $("html").animate({ scrollTop: 0 }, 600);

        var validation_errors = [];

        vue.errors.clear();

        for (var key in messages.errors) {
            if (Array.isArray(messages.errors[key])) {
                for (var i = 0; i < messages.errors[key].length; i++) {
                    validation_errors.push(messages.errors[key][i]);
                    if (vue !== null) {
                        vue.errors.add({
                            field: key,
                            msg: messages.errors[key][i]
                        });
                    }
                }
            } else {
                validation_errors.push(messages.errors[key]);
            }
        }

        return validation_errors;
    }

    /**
     * EncodeVar
     *
     * @param {array} array
     */
    EncodeVar (array) {
        return JSON.stringify(array);
    }

    isJson(str) {
        try {
            JSON.parse(str);
        } catch (e) {
            return false;
        }
        return true;
    }

    DecodeVar (json) {
        if (this.isJson(json)) {
            return JSON.parse(json);
        } else {
            return {}; // return empty object to avoid erros
        }
    }

    VarByLang (json, language) {
        if (this.isJson(json)) {
            return this.DecodeVar(json)[language];
        } else {
            return json;
        }
    }

    handleFailure (vue, error) {
        vue.validation_errors = this.appendValidationErrors(error.response.data, vue);
        vue.isLoading = false;
        $('.submitBtnContainer #save_btn').attr("class", "btn btn-brand").attr("disabled", vue.isLoading);
    }

    handleSuccess (vue, res, message, redirect) {
        if (res.data.success) {
            swal.fire(message.success, message.message, "success");
            if (redirect !== "") {
                setTimeout(() => {
                    window.location = redirect;
                }, 1000)
            }
        }
        vue.isLoading = false;
        $('.submitBtnContainer #save_btn').attr("class", "btn btn-brand").attr("disabled", vue.isLoading);
    }

    objectToFormData(obj, cfg, fd, pre) {
        return objectToFormData(obj, cfg, fd, pre);
    }
})();

window.addEventListener('unhandledrejection', function (e) {
    console.log('error found')
    console.log(e);
    //It Will handle JS errors 
  })
  