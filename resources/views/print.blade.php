<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    
    <style>
    .invoice-box {
        max-width: 900px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }

    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">{{$pressingNom}}</td>
                            
                            <td>
                                {{$pressingAdresse}}<br>
                                {{$pressingTelephone}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Ticket numero:<br>
                                Date du depot de(s) vêtement(s):<br>
                                Date du retrait de(s) vêtement(s):<br>
                                Telephone client:<br>
                                Nom client:<br>
                                Caisse:
                            </td>
                            
                            <td>
                                {{$entree->id}}<br>
                                {{$entree->dateEntree}}<br>
                                {{$date}}<br>
                                {{$clientTelephone}}<br>
                                {{$clientNom}}<br>
                                {{$userNom}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                  Element
                </td>
                
                <td>
                    Description
                </td>
            </tr>
            
            <tr class="item">
                <td>
                  Nombre de vêtements
                </td>
                
                <td>
                  {{$entree->totalVetement}}
                </td>
                
            </tr>
            <tr class="item">
                <td>
                Detail
                </td>
                
                <td>
                    @if(count($details) > 0)
                        @foreach($details as $detail)
                            {{$detail->categorie->nom}}-{{$detail->marque}}-{{$detail->couleur}}-{{$detail->categorie->prix}}-{{$detail->quantite}}<br>
                        @endforeach
                    @endif
                </td>
                
            </tr>

            
            <tr class="heading">
                <td>
                    Element
                </td>
                
                <td>
                    Prix
                </td>
            </tr>
            
            <tr class="item">
                <td>
                  Prix unitaire(kg):
                </td>
                
                <td>
                  {{$entree->pu}}
                </td>
            </tr>
            
            <tr class="item">
                <td>
                  Poids:
                </td>
                
                <td>
                  {{$entree->poids}}
                </td>
            </tr>
            <tr class="item">
                <td>
                  Total:
                </td>
                
                <td>
                  {{$entree->pt}}Fcfa
                </td>
            </tr>
            <tr class="item">
                <td>
                  Montant versé:
                </td>
                
                <td>
                  {{$entree->montantVerse}}Fcfa
                </td>
            </tr>
            <tr class="item">
                <td>
                  Reste:
                </td>
                
                <td>
                  {{$entree->montantRestant}}Fcfa
                </td>
            </tr>
            <tr class="item">
                <td>
                  Dette:
                </td>
                @if($entree->client->redevances()->first() != null)
                    <td>
                        {{$entree->client->redevances()->first()->montant}}Fcfa
                    </td>
                @else
                    <td>
                        0Fcfa
                    </td>
                @endif
            </tr>
            <tr class="total">
                <td><strong>Merci de toujours nous faire confiance</strong></td>
               
                <td></td>
            </tr>
        </table>
    </div>
</body>
</html>
