<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Ordre de recette pdf</title>
     <link rel="stylesheet" href="style.css">

     <style>
          body {
               font-family: 'Nunito', sans-serif;
               color: #333;
               background-color: #fff;
               margin: 0;
               padding: 0 3%;
          }

          .header {
               display: flex !important;
               justify-content: space-between;
               font-size: 12px;
               line-height: 1;
               width: 100%;
          }

          img {
               width: 100px;
               height: 50px;
               margin: 0 auto;
          }

          .img-flag {
               margin-top: 3%;
               height: 30px;
          }

          .left-side {
               flex-direction: column;
               justify-content: center;
               text-align: center;
               width: 50%;
               float: left;
               margin-left: -5%;
          }

          .right-side {
               flex-direction: column;
               justify-content: flex-end;
               text-align: right;
               width: 40%;
               float: right;
          }

          .hr-header {
               width: 15%;
               margin-top: -1%;
               margin-bottom: -1%;
          }

          h3 {
               margin-top: -2%;
          }

          .card-green {
               margin-top: 3%;
               padding: 15px 40px;
               color: #fff;
               font-weight: bolder;
               border-radius: 5px;
               height: 40px;
               display: flex;
               align-content: center;
               justify-content: center;
               text-align: center;
               background-color: #064b25;
               width: 170px;
               float: right;

          }

          .card-outline-warning {
               margin-top: 200px;
               padding: 15px 40px;
               color: #111;
               font-weight: bolder;
               border-radius: 5px;
               height: 40px;
               display: flex;
               align-content: center;
               align-items: center;
               text-align: center;
               border: 2px solid #f0ad4e;
               width: 170px;
               float: right;
          }

          h1 {
               font-size: 30px;
               font-weight: bolder;
               margin-top: 15%;
               margin-bottom: 5%;
               text-align: center;
          }

          .text-ordre-recette {
               font-size: 20px;
               margin-top: 5%;
               margin-bottom: 5%;
               text-align: justify;
               line-height: 1.5;
               letter-spacing: 2px;
          }

          table {
               width: 100%;
               border-collapse: collapse;
               margin-top: 5%;
               margin-bottom: 5%;
          }

          .border-visible {
               border: 1px solid #333;
               padding: 10px;
               text-align: center;
          }

          .td-montant {
               font-weight: bolder;
               font-size: 20px;
               width: 40%;
          }

          tbody tr td {
               height: 150px;
               padding-left: 5%;
          }

          span {
               font-weight: bolder;
               font-size: 20px;
          }

          .motif {
               border: none;
          }

          tfoot tr td {
               font-weight: bolder;
               font-size: 20px;
               text-align: center;
               border: 1px solid #333;
               padding: 15px;

          }

          .signatures {
               display: flex;
               flex-direction: row;
               justify-content: space-between;
               margin-top: 5%;
               margin-bottom: 5%;
               width: 100%;
          }

          .ordonnateur {
            font-weight: bolder;
            font-size: 20px;
            text-decoration: underline;
            float: left;
            margin: 3.5%;

        }

        .recouvrement {
            font-weight: bolder;
            font-size: 20px;
            text-decoration: underline;
            margin: 3.5%;    
        }
        .caissier {
            font-weight: bolder;
            font-size: 20px;
            text-decoration: underline;
            float: right;
            margin: 1.5%;
            
        }

          .text-sub-tab {
               font-size: 20px;
               margin-top: 30%;
               margin-bottom: 5%;
               text-align: justify;
               line-height: 1.5;
          }

          footer {
               border-top: 1px solid #333;
               border-width: 90%;
               padding: 15px;
               text-align: center;
               position: absolute;
               bottom: 0;
          }
          .contain{
               margin-top: 28%;
          }
     </style>
</head>

<body>
     <header class="header">
          <div class="left-side">
               <h5>
                    République du sénégal</h5>
               <hr class="hr-header">
               <img src="./snflag.jpeg" alt="drapeau" class="img-flag">
               <h4>
                    MINISTERE DE L'ENSEIGNEMENT SUPERIEUR DE LA RECHERCHE <br> ET DE L'INNOVATION </h4>
               <hr class="hr-header">
               <h4>
                    CENTRE REGIONAL DES OEUVRES UNIVERSITAIRES SOCIALES <br> DE ZIGUINCHOR (CROUSZ)</h4>
               <img src="./logo_crousz.png" alt="logo crousz">
               <h4>
                    DIVISION ADMINISTRATIVE ET FINANCIERE</h4>
               <hr class="hr-header">
               <h5>
                    SERVICE DU SUIVI DES RECETTES</h5>
               <h3>
                    Enregistré sous le compte</h3>
               <h3>70781</h3>
          </div>
          <div class="right-side">
               <span class="card card-green">
                    EXERCICE {{now()->year}}
               </span>
               <span class="card card-outline-warning">
                    BUDGET CROUS/Z
               </span>
          </div>
     </header>
  
     <div class="contain">
          <h1>ORDRE DE RECETTES N° </h1>
          <p class="text-ordre-recette">
               Le chef du Service de recouvrement du CROUS/Z est invité à recevoir de <br><b>{{$invoice->nomAgent}}</b> la somme de .............................................. <br>
               ({{$invoice->montant}})
          </p>
          
          <table>
               <caption></caption>
               <thead>
                    <tr>
                         <th class="motif">Pour motif:</th>
                         <th class="border-visible">Montant</th>
                    </tr>
               </thead>
               <tbody>
              
                    <tr>
                         <td class="motif">
                              <p><b>Redevance Cafétaria</b></p>
                         </td>
                         <td class="td-montant border-visible">
                         {{$invoice->montant}}
                         </td>
                    </tr>
                  
               </tbody>
               <tfoot>
                    <tr>
                         <td>TOTAL</td>
                         <td> {{$invoice->montant}}</td>
                    </tr>
               </tfoot>
              
          </table>
          <div class="signatures">
            <div class="ordonnateur">
                Chef de service de suivi des recettes:
            </div>
           
            <div class="caissier">
                pour le Comptable <br> Le Caissier :
            </div>

            <div class="recouvrement">
               Chef de service recouvrement :
            </div>
          </div>
          <div class="text-sub-tab">
               Cette somme sera portée dans les écritures du Chef du Service du Budget au compte 70781 : Redevance Cafétaria
          </div>
     </div>
     <footer class="footer">
          Kenia sur la route de l'université-BP 10 12 -Tél: 33 990 17 20-Fax: 33 990 17 35
     </footer>
</body>

</html>