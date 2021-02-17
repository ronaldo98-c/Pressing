
function choix()
{
    if(document.getElementById('type').value === "simple")
    {
        document.querySelectorAll('[id=poids]').forEach(element=> 
            element.style.display = 'none'
        )
        document.querySelectorAll('[id=pu]').forEach(element=> 
            element.style.display = 'none'
        )
        document.querySelectorAll('[id=prixRepassage]').forEach(element=> 
            element.style.display = 'none'
        )
    }
    else
    {
        document.querySelectorAll('[id=poids]').forEach(element=> 
            element.style.display = 'block'
        )
        document.querySelectorAll('[id=pu]').forEach(element=> 
            element.style.display = 'block'
        )
        document.querySelectorAll('[id=prixRepassage]').forEach(element=> 
            element.style.display = 'block'
        )
    }

}
choix()
$('#type').change(choix);


