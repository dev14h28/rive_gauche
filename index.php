<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

include_once('config.php');

if (isset($_POST['nom'])
        && isset($_POST['prenom'])
        && isset($_POST['tel'])
        && isset($_POST['mail'])
) {

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['mail'];
    $telephone = $_POST['tel'];
    if(isset($_POST["checkbox1"])){
        $type2 = 1;
    }else{
        $type2 = 0;
    }
    if(isset($_POST["checkbox2"])){
        $type3 = 1;
    }
    else{
        $type3 = 0;
    }
    if(isset($_POST["checkbox3"])){
        $info_comm = 1;
    }else{
        $info_comm = 0;
    }
    if(isset($_POST["checkbox4"])){
        $data_perso = 1;
    }else{
        $data_perso = 0;
    }
    $message = '';

    if (isset($_POST['commentaire'])) {
        $message = $_POST['commentaire'];
    }
    /* $sql = "INSERT INTO formulaire
    (type_location, telecharger, preference_tel, preference_email, civilite, nom, email, code_postal, telephone, message)
    VALUES
    ('".mysqli_real_escape_string($conn,$type_location)."',
     '".mysqli_real_escape_string($conn,$telecharger)."',
    '".mysqli_real_escape_string($conn,$preference_tel)."',
    '".mysqli_real_escape_string($conn,$preference_email)."',
    '".mysqli_real_escape_string($conn,$civilite)."',
    '".mysqli_real_escape_string($conn,$nom)."',
    '".mysqli_real_escape_string($conn,$email)."',
    '".mysqli_real_escape_string($conn,$code_postal)."',
    '".mysqli_real_escape_string($conn,$telephone)."',
    '".mysqli_real_escape_string($conn,$message)."')"; */

    $sql = "INSERT INTO formulaire 
    (Nom, Prenom, Telephone, Email, Commentaire, Type2, Type3, Info_comm, Data_personnel)
    VALUES 
    ('" . mysqli_real_escape_string($conn, $nom) . "',
    '" . mysqli_real_escape_string($conn, $prenom) . "',
    '" . mysqli_real_escape_string($conn, $telephone) . "',
    '" . mysqli_real_escape_string($conn, $email) . "',
    '" . mysqli_real_escape_string($conn, $message) . "',
    '" . mysqli_real_escape_string($conn, $type2) . "',
    '" . mysqli_real_escape_string($conn, $type3) . "',
    '" . mysqli_real_escape_string($conn, $info_comm) . "',
    '" . mysqli_real_escape_string($conn, $data_perso) . "')";

    if ($conn->query($sql) === TRUE) {


        // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';

        // En-têtes additionnels
        $headers[] = 'From: Pierres Territoire <noreply@test.com>';

        // Envoi du document à l'utilisateur
        //if($telecharger == 1){
        // Plusieurs destinataires
        $to = $email; // notez la virgule

        // Sujet
        $subject = 'Pierres Territoire';

        // message
        /* $message_doc = '
        <html>
         <body>
           <p>Nous vous remercions sinc&egrave;rement pour l&apos;int&eacute;r&ecirc;t que vous portez &agrave; FASTT Confiance Bailleur.</p>
          <p>Vous pouvez consulter ou t&eacute;l&eacute;charger le document qui d&eacute;taille les garanties et b&eacute;n&eacute;fices du service pour les propri&eacute;taires, en cliquant sur ce lien : <a href="https://fr.calameo.com/read/0052240807e2e672c5ff0" target="_blank">https://fr.calameo.com/read/0052240807e2e672c5ff0</a></p>
          <p>Et si vous avez besoin d&apos;un conseil ou simplement une question, n&apos;h&eacute;sitez pas appeler nos conseillers au 0 809 400 668 (service gratuit + prix de l&apos;appel).</p>
          <p>L&apos;&eacute;quipe FASTT Confiance Bailleur vous souhaite une tr&egrave;s belle journ&eacute;e</p>
         </body>
        </html>
        '; */

        $message_doc = '
         <html>
          <body>
           <p>Votre formulaire a &eacute;t&eacute; envoy&eacute; avec succ&egrave;s.</p>
           <p>Vous pouvez d&egrave;s aujourd hui, si vous le souhaitez, d&eacute;poser votre logement vacant en cliquant <a href="https://www.locservice.fr/" target="_blank">ici</a></p>
          </body>
         </html>
         ';


        // Envoi
        mail($to, $subject, $message_doc, implode("\r\n", $headers));
        //}

        // Envoi du formulaire par mail
        // Plusieurs destinataires
        $to_form = ''; // notez la virgule

        // Sujet
        $subject_form = 'Pierres Territoire // Formulaire Question RiveGauche';
        /* if($telecharger == 1){
            $telecharger_message = "Oui";
        }else{
            $telecharger_message = "Non";
        }
        if($preference_tel == 1){
            $preference_tel_message = "Oui";
        }else{
            $preference_tel_message = "Non";
        }
        if($preference_email == 1){
            $preference_email_message = "Oui";
        }else{
            $preference_email_message = "Non";
        } */
        // message
        /* $message_old = '
        <html>
         <body>
           <p>Nouveau formulaire saisi par : '.htmlentities($civilite).' '.htmlentities($nom).'</p>
          <!--<p>La location : '.htmlentities($type_location).'</p> -->
          <!--<p>La personne souhaite t&eacute;l&eacute;charger la documentation : '.$telecharger_message.'</p>-->
          <p>Les pr&eacute;f&eacute;rences de contact : </p>
          <p>T&eacute;l&eacute;phone : '.$preference_tel_message.'</p>
          <!-- <p>Email : '.$preference_email_message.'</p>-->
          <p><br />Code postal : '.htmlentities($code_postal).'</p>
          <!--<p>T&eacute;l&eacute;phone : '.htmlentities($telephone).'</p>-->
          <p>Email : '.htmlentities($email).'</p>
          <p>Message : '.htmlentities($message).'</p>
         </body>
        </html>
        '; */

        $message_form = '
         <html>
          <body>
            <p>Nouveau formulaire saisi par : ' . htmlentities($prenom) . ' ' . htmlentities($nom) . '</p>
           <p>Email : ' . htmlentities($email) . '</p>
           <p>Telephone : ' . htmlentities($telephone) . '</p>
           <p>Message : ' . htmlentities($message) . '</p>
          </body>
         </html>
         ';

        // Envoi
        mail($to_form, $subject_form, $message_form, implode("\r\n", $headers));

        // echo "Success";
    } else {
        // echo "Error: " . $sql . "<br>" . $conn->error;
        // echo "Failed";
    }
    $conn->close();
    /*    
    mysql_query($query) or trigger_error(mysql_error() . $query);
    mysql_close();*/
    /*if($_POST['username'] == $username && $_POST['password'] == $password){ // Si les infos correspondent...
        session_start();
        $_SESSION['user'] = $username;
        echo "Success";
    }
    else{ // Sinon
        echo "Failed";
    }*/
} else {
    // echo "Failed";
}
?>

<!doctype html>
<html class="no-js" lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foundation for Sites</title>
    <link rel="stylesheet" href="css/app.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Asap:400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Prata" rel="stylesheet">
</head>
<body>

<div id="contact" class="dosis">
    <a href="tel:0359611744" class="text-uppercase">Contactez-nous au : 03 61 58 46 78</a>
</div>

<header>
    <img src="img/triangle/triangle-1.png" class="triangle-1" alt="">
    <img id="logo-bas" src="img/logo-bas.png" alt="">
    <div class="grid-x">
        <div class="cell medium-12 large-5 small-12 align-item-center text-center">
            <div id="block-triangle-top" class="hide-for-small-only">
                <img src="img/triangle/triangle-2.png" class="triangle-2">
                <img src="img/triangle/triangle-3.png" class="triangle-3">
            </div>
            <img id="logo-rive-gauche" src="img/logo-rive-gauche.png" class="margin-bottom-2">
            <p class="text-center center dosis logo-subtitle">Habiter Rive Gauche,<br>
                c’est l’opportunité de bénéficier<br>
                d’un cadre exceptionnel </p>
            <p class="text-center dosis">Tout ici est baigné de nature et a été pensé pour le bien-être et le<br>
                respect de l’environnement :</p>
            <p class="text-center dosis">Bordée au nord par la Lys et son agréable chemin de<br> halage la résidence
                Rive Gauche s’organise autour<br> d’un espace paysager, lieu idéal pour la promenade, la détente<br>
                et le
                bonheur des enfants...</p>
            <div id="block-rond">
                <div class="rond-rouge opensans">
                    <br>
                    <br>
                    <span class="text-uppercase font-bold rond-txt1">Frais de notaire<br>
            offerts**</span>
                    <p class="rond-txt2">pour les 5 premiers<br> réservataires</p>
                    <p class="text-uppercase font-color-yellow rond-txt3">Offre valable jusqu'au<br>
                        06/03/2019 !</p>
                </div>
                <div class="rond-marron opensans">
                    <br>
                    <br>
                    <br>
                    <span class="px14 rond-txt1">à partir de</span>
                    <p class="font-bold rond-txt2">106 000€*</p>
                </div>
                <img src="img/triangle/triangle-4.png" class="triangle-4">
            </div>
        </div>
        <div class="cell large-6 medium-12 small-12">
            <div id="block-arbre">
                <img src="img/arbre1.png" class="arbre-1">
                <p class="text-center">
                    <span class="prata font-color-or-fonce px24">Devenez propriétaire</span><br>
                    <span class="prata px36 font-color-or font-bold">en bord<br>
                        de Lys</span><br>
                    <span class="opensans">Prenez PLACE...<br>
                    Ici la nature vous accueille à bras ouvert</span>
                </p>
            </div>
        </div>
    </div>
</header>
<div id="fauteuil-formululaire" class="opensans">
    <img src="img/fauteuil.png" class="img-fauteuil">
    <div id="block-info" class="text-center">
        <img src="img/triangle/triangle-2.png" class="triangle-block-info" alt="">
        <p class="text-uppercase block-info-txt1">appartements neufs<br> du 2 au 4 pièces avec parking.</p>
        <p class="block-info-txt2">Des appartements conçus pour offrir un maximum d'espace dans les pièces à vivre.</p>
        <p class="block-info-txt3">Les larges ouvertures et une luminosité optimale renforcent l'impression de
            bien-être. Ils disposent d'une terasse ou d'un balcon d'où l'on peut profiter de vues exceptionnelles sur
            les jardins et/ou surla Lys.</p>
    </div>
    <div>
        <div class="grid-x">
            <div id="youtube" class="cell medium-6 large-6 small-12">
                <iframe class="video-youtube" height="375" src="https://www.youtube.com/embed/lMB-6uO64eU"
                        frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
            </div>
            <div id="formulaire" class="cell medium-6 large-6 small-12">
                <form method="POST" id="contact-form">
                    <div class="text-center">
                        <p class="font-color-orange text-uppercase"><span class="font-bold">Une question ?</span><br>
                            un rendez-vous ? contactez-nous !</p>

                        <p class="font-weight-light">Demande d'informations pour le programme : Rive Gauche</p>
                    </div>
                    <div class="grid-x grid-margin-x align-middle">
                        <div class="medium-3 small-3 cell text-right">
                            <label>Nom*</label>
                        </div>
                        <div class="marge-right medium-9 small-9 cell">
                            <input type="text" name="nom" required>
                        </div>
                        <div class="medium-3 small-3 cell text-right">
                            <label>Prénom*</label>
                        </div>
                        <div class="marge-right medium-9 small-9 cell">
                            <input type="text" name="prenom" required>
                        </div>
                        <div class="medium-3 small-3 cell text-right">
                            <label>Téléphone*</label>
                        </div>
                        <div class="marge-right medium-9 small-9 cell">
                            <input type="tel" name="tel" required>
                        </div>
                        <div class="medium-3 small-3 cell text-right">
                            <label for="middle-label">Email*</label>
                        </div>
                        <div class="marge-right medium-9 small-9 cell">
                            <input type="email" id="middle-label" name="mail" required>
                        </div>
                        <div class="medium-3 small-3 cell text-right">
                            <label>Commentaire :</label>
                        </div>
                        <div class="medium-9 small-9 cell">
                            <textarea name="commentaire"></textarea>
                        </div>

                        <div class="medium-12 small-12 cell grid-margin-x grid-margin-y">
                            <div class="grid-x">
                                <div class="cell medium-3 small-3">
                                    <input id="checkbox1" name="checkbox1" class='red-checkbox' type="checkbox">
                                </div>
                                <div class="cell medium-9 small-9">
                                    <label
                                            class="label-checkbox" for="checkbox1"><span
                                                class="font-bold">Type 2</span> Avec Balcon et place de parking à partir de 106
                                        000
                                        €*</label>
                                </div>

                                <div class="cell medium-3 small-3">
                                    <input id="checkbox2" name="checkbox2" class='red-checkbox' type="checkbox">
                                </div>
                                <div class="cell medium-9 small-9">
                                    <label
                                            class="label-checkbox" for="checkbox2"><span
                                                class="font-bold">Type 3</span> Avec Balcon ou terrasse et 2 places de parking à
                                        partir
                                        de 157 000 €*</label>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn-map" value="Ce programme m'intéresse">
                        <div class="medium-12 cell">
                            <div class="grid-x">
                                <div class="medium-1 small-1 cell">
                                    <input id="checkbox3" name="checkbox3" class='black-checkbox' type="checkbox"/>
                                </div>
                                <div class="medium-11 small-11 cell">
                                    <label class="label-checkbox2" for="checkbox3">J'accepte de recevoir des
                                        informations commerciales de la part de Pierres & Territoires de France
                                        Nord</label>
                                </div>
                                <div class="medium-1 small-1 cell">
                                    <input id="checkbox4" class='black-checkbox' type="checkbox"/>
                                </div>
                                <div class="medium-11 small-11 cell">
                                    <label class="label-checkbox2" name="checkbox4" for="checkbox4">J'accepte que les données
                                        personnelles saisies dans le formulaire ci-dessus soient collectées par Pierres
                                        et territoires de France Nord, société du Groupe Procivis Nord, propriété
                                        exclusive de : Pierres et territoires de France Nord SAS au capital de 6 858 000
                                        €, RCS Lille 306 854 779 Siège social : 7 Rue de Tenremonde à LILLE (59000) à
                                        des fins de traitement de ma demande et soient enregistrées dans le respect des
                                        dispositions du RGPD. </label>
                                </div>
                            </div>
                        <div>
                    </div>
                </form>
            </div>

            </form>
        </div>
    </div>
</div>
</div>

<div id="prestations">
    <div class="grid-x align-center-middle grid-margin-y">
        <div class="cell medium-6">
            <div class="grid-x">
                <div class="cell medium-2 small-2 align-self-middle text-center hide-for-small-only">
                    <img src="img/picto-prestations.png" alt="">
                </div>
                <div class="cell medium-10 small-12 list-custom padding-1">
                    <h2 class="text-uppercase text-color-red dosis">Détails et prestations</h2>
                    <ul class="margin-bottom-3">
                        <li>Cuisine ouverte sur séjour pour un maximum de convivialité</li>
                        <li>Salle de bains aménagée avec baignoire, sèche-serviettes</li>
                        <li>meuble vasque avec miroir et bandeau lumineux</li>
                        <li>Chauffage et production d’eau chaude par chaudière gaz à condensation</li>
                        <li>Accès sécurisé à la résidence avec vidéophone</li>
                        <li>Ascenseur</li>
                        <li>Balcon ou terrasse</li>
                        <li>Parking sécurisé, couvert ou aérien</li>
                        <li>RT 2012</li>
                    </ul>
                    <a href="" class="btn-map text-uppercase">Télécharger la plaquette</a>
                </div>
            </div>
        </div>
        <div class="orbit cell medium-6 small-12 hide-for-small-only" role="region" aria-label="Favorite Space Pictures"
             data-orbit>
            <div class="orbit-wrapper">
                <div class="orbit-controls">
                    <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;
                    </button>
                    <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
                </div>
                <ul class="orbit-container">
                    <li class="is-active orbit-slide">
                        <figure class="orbit-figure">
                            <img class="orbit-image" src="img/slide-1.jpg"
                                 alt="Space">
                        </figure>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div id="container-map" class="margin-top-3">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7506.908820165147!2d2.8693017611676863!3d50.693163101405815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47dcd6f04f567831%3A0xc230400941d729a0!2s112+Rue+du+N%2C+59280+Armenti%C3%A8res!5e0!3m2!1sfr!2sfr!4v1549293810245"
                height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
        <div class="grid-container">
            <div class="grid-x align-justify">
                <div id="block-map" class="cell large-5 medium-12 text-center padding-3">
                <span class="text-color-red dosis"><span class="text-uppercase">Les atouts de ce programme</span><br>
                    Ce que l’on vient chercher à Armentières ?</span>
                    <p class="margin-top-1">
                        D’abord le calme et une vie au plus près de la nature à quelques minutes de Lille. Idéalement
                        située, la ville est bien desservie par les transports en commun (gare, réseau de bus Transpole
                        …).
                        Armentières est reconnue pour son dynamisme et son confort de vie : médiathèque, piscine,
                        nombreuses
                        structures scolaires, sportives et culturelles. Le centre-ville est animé toute l’année grâce à
                        ses
                        commerces de proximité (400 commerçants dont 180 dans le centre-ville)</p>
                </div>
                <div id="btn-contact" class="cell large-5 medium-12">
                    <a href="tel:0359611744" class="text-uppercase btn-map">Contactez-nous au : 03 61 58 46 78</a>
                </div>
            </div>
        </div>

    </div>

    <footer>
        <div id="rappel-limite" class="padding-3">
            <div class="grid-container">
                <div class="grid-x align-center-middle">
                    <div class="cell medium-3">
                        <img src="img/logo-bas.png" alt="">
                    </div>
                    <div class="cell medium-9 dosis">
                        <p>
                            Dans la limite des stocks disponibles et selon conditions en vigueur au 09/02/2018,
                            modifiables
                            à tout moment sans préavis. Prix indiqués, parking compris, hors option, en TVA 5,5%
                            éventuelles
                            aides de la MEL déduites. La TVA à 5.5%, les aides de la MEL sont soumises à conditions de
                            ressources et réservées aux logements à usage de résidence principale. ** Offre valable du
                            14/01/2019 au 06/03/2019 pour les 5 premiers clients personnes physiques avec lesquels sera
                            signé un contrat de réservation mentionnant l’offre avant le 06/03/2019 suivi de la
                            signature
                            d’un acte de vente portant sur un appartement du programme Rive Gauche à Armentières. Les «
                            frais de notaires » seront pris en charge par le vendeur et correspondent aux honoraires et
                            droits payables lors de la signature de l’acte de vente à l’exclusion des frais de garantie
                            liés
                            au financement de l’acquisition tels que frais d’hypothèques, de caution, de privilège et
                            autres.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer-rappel">
            <div class="grid-container">
                <div class="grid-x align-center-middle grid-margin-x grid-margin-y">
                    <div class="cell medium-6 small-12 text-center">
            <span class="dosis dosis-custom">Un conseiller se tient à votre écoute pour vous<br>
            renseigner sur votre projet immobilier</span>
                    </div>
                    <div class="cell medium-6 small-12 btn-center-responsive  text-center padding-1">
                        <a href="" class="text-uppercase button-footer">
                            Demander à être rappelé
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer-finish" class="grid-container padding-3">
            <div class="grid-x grid-margin-x">
                <div class="cell medium-3">
                    <img src="img/logo-footer.png" alt="">
                </div>
                <div class="cell medium-3">
                    <ul>
                        <span class="underline-none"><li class="font-bold margin-bottom-1 underline-none"><a href="">Programmes Immobiliers Neufs</a></li></span>
                        <li><a href="">Maisons pour devenir propriétaire</a></li>
                        <li><a href="">Appartements pour devenir propriétaire</a></li>
                        <li><a href="">Terrains à bâtir viabilisés</a></li>
                        <li><a href="">Appartements neufs pour investir</a></li>
                        <li><a href="">Maisons neuves pour investir</a></li>
                        <li><a href="">Dernières opportunités dans le neuf</a></li>
                    </ul>
                </div>
                <div class="cell medium-3">
                    <ul>
                        <span class="underline-none"><li class="font-bold margin-bottom-1 underline-none"><a href="">Pierres et Territoires de France Nord</a></li></span>
                        <li><a href="">Maisons pour devenir propriétaire</a></li>
                        <li><a href="">Appartements pour devenir propriétaire</a></li>
                        <li><a href="">Terrains à bâtir viabilisés</a></li>
                        <li><a href="">Appartements neufs pour investir</a></li>
                        <li><a href="">Maisons neuves pour investir</a></li>
                        <li><a href="">Dernières opportunités dans le neuf</a></li>
                    </ul>
                </div>
                <div class="cell medium-3">
                    <ul>
                        <span class="underline-none"><li class="font-bold margin-bottom-1"><a href="">Promoteur et Lotisseur Immobilier</a></li></span>
                        <li><a href="">Maisons pour devenir propriétaire</a></li>
                        <li><a href="">Appartements pour devenir propriétaire</a></li>
                        <li><a href="">Terrains à bâtir viabilisés</a></li>
                        <li><a href="">Appartements neufs pour investir</a></li>
                        <li><a href="">Maisons neuves pour investir</a></li>
                        <li><a href="">Dernières opportunités dans le neuf</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/what-input/dist/what-input.js"></script>
    <script src="node_modules/foundation-sites/dist/js/foundation.js"></script>
    <script src="js/app.js"></script>
</body>
</html>
