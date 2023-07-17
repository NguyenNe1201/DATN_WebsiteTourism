

$().ready(function () {
    $("#AdminForm").validate({
        rules: {
           
            password: {
                required: true,
                minlength: 5
            },
           
            email: {
                required: true,
                email: true
            },
        },
        messages: {
            password: {
                required: "Please provide a password.",
                minlength: "Your password must be at least 5 characters long."
            },
          
            email: {
                email: "Please enter a valid email address.",
                required: "Please enter a email."
            },
            
        }
    });
    $("#CustomerForm").validate({
        rules: {
           
            password: {
                required: true,
                minlength: 5
            },
           
            email: {
                required: true,
                email: true
            },
        },
        messages: {
           
            password: {
                required: "Please provide a password.",
                minlength: "Your password must be at least 5 characters long."
            },
          
            email: {
                email: "Please enter a valid email address.",
                required: "Please enter a email."
            },
            
        }
    });
});
