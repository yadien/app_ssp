var HH = function () {
    var showError = function(title, message)
    {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "positionClass": "toast-top-right",
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        toastr.error(title, message);
    }
    var showSuccess = function(title, message)
    {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "positionClass": "toast-top-right",
            "onclick": null,
            "showDuration": "100",
            "hideDuration": "100",
            "timeOut": "2000",
            "extendedTimeOut": "500",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        toastr.success(title, message);
    }
    
    var showSuccessCallback = function(title, message, f)
    {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "positionClass": "toast-top-right",
            "onclick": null,
            "showDuration": "100",
            "hideDuration": "100",
            "timeOut": "2000",
            "extendedTimeOut": "500",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
            "onHidden": f
        }
        toastr.success(title, message);
    }
    
    var showSuccessReload = function(title, message)
    {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "positionClass": "toast-top-right",
            "onclick": null,
            "showDuration": "100",
            "hideDuration": "100",
            "timeOut": "2000",
            "extendedTimeOut": "500",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
            "onHidden": function() {
                window.location.reload();
            }
        }
        toastr.success(title, message);
    }
    
    var showWarning = function(title, message)
    {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "positionClass": "toast-top-right",
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        toastr.warning(title, message);
    }
    
    return {
        init: function () {
        },
        
        showError: function(message, title){
            showError(title, message);
        },
        showSuccess: function(message, title){
            showSuccess(title, message);
        },
        showSuccessCallback: function(message, title, f){
            showSuccessCallback(title, message, f);
        },
        showSuccessReload: function(message, title){
            showSuccessReload(title, message);
        },
        showWarning: function(message, title){
            showWarning(title, message);
        }
    };
}();