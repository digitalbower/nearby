<script src="https://cdn.tailwindcss.com"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    cyan: {
                        500: '#06b6d4',
                        600: '#0891b2',
                        700: '#0e7490',
                    },
                },
            },
        },
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"></script>
<script>
$(document).ready(function () {
 $('#login').validate({  
    rules: {  
      email: {  
        required: true,  
        email: true,  
      },  
      password: {  
          required: true,  
      }
    },  
    messages: {  
      email: 'Email is required', 
      password: { 
        required:'Password is required' ,
      },
    },  
    errorElement: 'small',
    errorClass: "text-red-500",
    highlight: function (element) {
        return false;
    },
    unhighlight: function (element) {
        return false;
    }
  }); 
}); 
 </script>