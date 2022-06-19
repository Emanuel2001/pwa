$(function() {
    $("form[name='forma']").validate({
        rules: {
            title: {
                required: true,
                minlength:5,
                maxlength: 30  
            },
            about: {
                required: true,
                minlength:10,
                maxlength: 100 
            },
            content:{
                required: true
            },
            photo:{
                required: true
            },
            category:{
                required: true
            }
        },

        messages: {
            title: {
                required: "Naslov vjesti mora imati izmedu 5 i 30 znakova!",
                minlength: "Naslov nesmije imati manje od 5 znakova!",
                maxlength: "Naslov nesmije imati vise od 30 znakova!",
            },
            about: {
                minlength: "Kratki sadrzaj nesmije imati manje od 10 znakova!",
                maxlength: "Kratki sadrzaj nesmije imati vise od 100 znakova!",
                required: "Kratki sadrzaj mora imati izmedu 10 i 100 znakova!"
            },
            content: {
                required: "Sadrzaj mora biti unesen!",
       
            },
            photo: {
                required: "Slika mora biti unesena!",
            },
            category: {
                required: "Odaberite kategoriju!",
   
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
  });