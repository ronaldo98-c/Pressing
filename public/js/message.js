
function checked()
{
    $('#envoyer').hide()
    $('#tout').click(function () { 
        if($('#tout').is(':checked'))   
        {
            $('input:checkbox').prop('checked', this.checked);  
            $('#envoyer').show()
        }
        else
        {
            $('input:checkbox').prop('checked', this.checked);  
            $('#envoyer').hide()
        }
        //  
    });
}
function masquerBouton(source)
{
     if(source.checked)
     {
         $('#envoyer').show()
     }
     else
     {
        $('#envoyer').hide()
     }
}
function envoyer()
{
    let tab = [];
    $('input[name="tel"]:checked').each(function() {
       tab.push(this.value)
    });
    info = JSON.stringify(tab);
    window.location = 'http://127.0.0.1:8000/messageClient?info=' + info;
}

checked()
