var getParams = function (url) {
    var params = {};
    var parser = document.createElement('a');
    parser.href = url;
    var query = parser.search.substring(1);
    var vars = query.split('&');
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split('=');
        params[pair[0]] = decodeURIComponent(pair[1]);
    }
    return params;
};
function setInputVal()
{
    var info = getParams(window.location.href)
    var ta = info.info
    var monTab = JSON.parse(ta);
    for(var i=0;i<monTab.length;i++)
    {
        document.getElementById("telephone").value += monTab[i]+",";
    }
}
userAction = async () => {
    var message = document.getElementById("message").value
    var nomPressing = document.getElementById("nomPressing").value
    var info = getParams(window.location.href)
    var ta = info.info
    var monTab = JSON.parse(ta);
    for(var i=0;i<monTab.length;i++)
    {
        //const response = await fetch('https://sms.etech-keys.com/ss/api.php?login=657219233&password=Ga@123456&sender_id='+nomPressing+'&destinataire='+monTab[i]+'&message='+message+'&ext_id=0123456&programmation=0');
        //const myJson = await response.json(); //extract JSON from the http response
        //console.log(myJson)
        let headers = new Headers();

        headers.append('Content-Type', 'application/json');
        headers.append('Accept', 'application/json');
        headers.append('Origin','http://localhost:8000');

        fetch('https://sms.etech-keys.com/ss/api.php?login=657219233&password=Ga@123456&sender_id='+nomPressing+'&destinataire='+monTab[i]+'&message='+message+'&ext_id=0123456&programmation=0', {
            mode: 'cors',
            credentials: 'include',
            method: 'GET',
            headers: headers
        })
        .then(response => response.json())
        .then(json => console.log(json))
        .catch(error => alert('Authorization failed : ' + error.message));
    }
    clearInputAndRedirect()
}
function clearInputAndRedirect()
{
    document.getElementById("message").value = ''
    alert("Le message a été envoyé au client")
}
setInputVal()