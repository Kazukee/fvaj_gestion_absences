<?php
    setlocale (LC_TIME, 'fr_FR');
?>

<html>

<head>
    <meta http-equiv=Content-Type content="text/html; charset=windows-1252">
    <meta name=Generator content="Microsoft Word 14 (filtered)">
    <style>
        <!--
        /* Font Definitions */
        @font-face
        {font-family:"MS Gothic";
            panose-1:2 11 6 9 7 2 5 8 2 4;}
        @font-face
        {font-family:"MS Gothic";
            panose-1:2 11 6 9 7 2 5 8 2 4;}
        @font-face
        {font-family:Georgia;
            panose-1:2 4 5 2 5 4 5 2 3 3;}
        @font-face
        {font-family:"\@MS Gothic";
            panose-1:2 11 6 9 7 2 5 8 2 4;}
        @font-face
        {font-family:Carme;}
        @font-face
        {font-family:Fujiyama-LightCondensed;}
        @font-face
        {font-family:"Open Sans";}
        /* Style Definitions */
        p.MsoNormal, li.MsoNormal, div.MsoNormal
        {margin:0cm;
            margin-bottom:.0001pt;
            text-align:justify;
            font-size:11.0pt;
            font-family:"Arial","sans-serif";}
        h1
        {margin-top:0cm;
            margin-right:0cm;
            margin-bottom:0cm;
            margin-left:14.2pt;
            margin-bottom:.0001pt;
            text-align:justify;
            text-indent:-14.2pt;
            font-size:14.0pt;
            font-family:"Arial","sans-serif";}
        h2
        {margin:0cm;
            margin-bottom:.0001pt;
            text-align:justify;
            font-size:11.0pt;
            font-family:"Arial","sans-serif";}
        h3
        {margin:0cm;
            margin-bottom:.0001pt;
            text-align:justify;
            font-size:10.0pt;
            font-family:"Arial","sans-serif";}
        h4
        {margin:0cm;
            margin-bottom:.0001pt;
            text-align:justify;
            font-size:10.0pt;
            font-family:"Arial","sans-serif";}
        h5
        {margin:0cm;
            margin-bottom:.0001pt;
            text-align:justify;
            font-size:10.0pt;
            font-family:"Arial","sans-serif";}
        h6
        {margin:0cm;
            margin-bottom:.0001pt;
            text-align:justify;
            font-size:10.0pt;
            font-family:"Arial","sans-serif";}
        p.MsoTitle, li.MsoTitle, div.MsoTitle
        {margin-top:24.0pt;
            margin-right:0cm;
            margin-bottom:6.0pt;
            margin-left:0cm;
            text-align:justify;
            page-break-after:avoid;
            font-size:36.0pt;
            font-family:"Arial","sans-serif";
            font-weight:bold;}
        p.MsoSubtitle, li.MsoSubtitle, div.MsoSubtitle
        {margin-top:18.0pt;
            margin-right:0cm;
            margin-bottom:4.0pt;
            margin-left:0cm;
            text-align:justify;
            page-break-after:avoid;
            font-size:24.0pt;
            font-family:"Georgia","serif";
            color:#666666;
            font-style:italic;}
        .MsoChpDefault
        {font-family:"Arial","sans-serif";}
        .MsoPapDefault
        {text-align:justify;}
        /* Page Definitions */
        @page WordSection1
        {size:21.0cm 842.0pt;
            margin:110.55pt 42.55pt 62.35pt 59.55pt;}
        div.WordSection1
        {page:WordSection1;}
        -->
    </style>

</head>

<body lang=FR-CH>

<div class=WordSection1>

    <p class=MsoNormal>&nbsp;</p>

    <table class=a border=1 cellspacing=0 cellpadding=0 width=500 style='margin-left:3.5pt;border-collapse:collapse;border:none'>
        <tr style='height:70.0pt'>
            <td width=359 style='width:269.35pt;border:none;border-right:solid black 1.0pt;padding:0cm 3.5pt 0cm 3.5pt;height:70.0pt'>
                <p class=MsoNormal style='margin-top:0cm;margin-right:2.85pt;margin-bottom:
  0cm;margin-left:2.85pt;margin-bottom:.0001pt'><b><span style='font-size:16.0pt;
  background:#CCCCCC'>AVIS D'ABSENCE</span></b><a name=gjdgxs></a></p>
                <p class=MsoNormal style='margin-top:0cm;margin-right:2.85pt;margin-bottom:
  0cm;margin-left:2.85pt;margin-bottom:.0001pt'><span style='font-size:6.0pt'>&nbsp;</span></p>
                <p class=MsoNormal style='margin-top:0cm;margin-right:2.85pt;margin-bottom:
  0cm;margin-left:2.85pt;margin-bottom:.0001pt'>Au directeur,</p>
                <p class=MsoNormal style='margin-top:0cm;margin-right:2.85pt;margin-bottom:
  0cm;margin-left:2.85pt;margin-bottom:.0001pt'>Au représentant légal / à l’élève majeur</p>
                <p class=MsoNormal style='margin-top:0cm;margin-right:2.85pt;margin-bottom:
  0cm;margin-left:2.85pt;margin-bottom:.0001pt'>A l’entreprise</p>
            </td>
            <td valign=top style='width:200px;border:solid black 1.0pt;
  border-left:none;padding:0cm 3.5pt 0cm 3.5pt;height:70.0pt'>
                <p class=MsoNormal align=left style='margin-top:6.0pt;margin-right:2.85pt;
  margin-bottom:0cm;margin-left:0cm;margin-bottom:.0001pt;text-align:left;
  line-height:133%'>{{ $titre_eleve[0]->titre }} {{ $nom_eleve[0]->nom }} {{ $prenom_eleve[0]->prenom }}</p>
                <p class=MsoNormal align=left style='margin-top:6.0pt;margin-right:2.85pt;
  margin-bottom:0cm;margin-left:0cm;margin-bottom:.0001pt;text-align:left;
  line-height:133%'>{{ $adresse_eleve[0]->adresse }}</p>
                <p class=MsoNormal align=left style='margin-top:6.0pt;margin-right:2.85pt;
  margin-bottom:0cm;margin-left:0cm;margin-bottom:.0001pt;text-align:left;
  line-height:133%'>{{ $localite_eleve[0]->localite }}</p>
                <p class=MsoNormal align=left style='margin-top:6.0pt;margin-right:2.85pt;
  margin-bottom:0cm;margin-left:0cm;margin-bottom:.0001pt;text-align:left;
  line-height:133%'></p>
            </td>
        </tr>
    </table>

    <p class=MsoNormal>&nbsp;</p>

    <p class=MsoNormal>Nous vous informons que l’élève/pré-apprenti/stagiaire</p>

    <table class=a0 border=0 cellspacing=0 cellpadding=0 width=691
           style='margin-left:.4pt;border-collapse:collapse'>
        <tr style='height:20.0pt'>
            <td width=300 valign=bottom style='width:225.3pt;border:none;border-bottom:
  solid black 1.0pt;padding:0cm 0cm 0cm 0cm;height:20.0pt'>
                <p class=MsoNormal style='margin-top:0cm;margin-right:2.85pt;margin-bottom:
  0cm;margin-left:2.85pt;margin-bottom:.0001pt'><b>Nom, prénom</b>: {{ $nom_eleve[0]->nom }} {{ $prenom_eleve[0]->prenom }}</p>
            </td>
            <td width=390 valign=bottom style='width:292.7pt;border:none;border-bottom:
  solid black 1.0pt;padding:0cm 0cm 0cm 0cm;height:20.0pt'>
                <p class=MsoNormal style='margin-top:0cm;margin-right:2.85pt;margin-bottom:
  0cm;margin-left:2.85pt;margin-bottom:.0001pt'><span style='font-size:12.0pt;
  font-family:"Open Sans"'></span><b>Classe</b>: {{ $classe_eleve[0]->code }}</p>
            </td>
        </tr>
    </table>

    <p class=MsoNormal>&nbsp;</p>

    @if($classe_eleve[0]->code == 'Cl1' || $classe_eleve[0]->code == 'Cl2' || $classe_eleve[0]->code == 'Cl3' || $classe_eleve[0]->code == 'Cl4' || $classe_eleve[0]->code == 'Cl5A' || $classe_eleve[0]->code == 'Cl5B' || $classe_eleve[0]->code == 'Cl6A' || $classe_eleve[0]->code == 'Cl6B' || $classe_eleve[0]->code == 'Cl7')
        <div>
            <input type="checkbox" id="PAA" name="PAA" checked><label for="PAA">ne s’est pas présenté/e aux cours du Programme Action Apprentissage du&nbsp;:</label>
        </div>
    @else
        <div>
            <input type="checkbox" id="PAA" name="PAA"><label for="PAA">ne s’est pas présenté/e aux cours du Programme Action Apprentissage du&nbsp;:</label>
        </div>
    @endif

    @if($classe_eleve[0]->code == 'ADB1' || $classe_eleve[0]->code == 'ADB2' || $classe_eleve[0]->code == 'EC1' || $classe_eleve[0]->code == 'EC2' || $classe_eleve[0]->code == 'EC3' || $classe_eleve[0]->code == 'INF3' || $classe_eleve[0]->code == 'MED1' || $classe_eleve[0]->code == 'MED2')
        <div>
            <input type="checkbox" id="ECLAT" name="ECLAT" checked><label for="ECLAT">ne s’est pas présenté/e aux cours ECLAT du&nbsp;:</label>
        </div>
    @else
        <div>
            <input type="checkbox" id="ECLAT" name="ECLAT"><label for="ECLAT">ne s’est pas présenté/e aux cours ECLAT du&nbsp;:</label>
        </div>
    @endif
    <div>
        <input type="checkbox" id="Appui" name="Appui"><label for="Appui">ne s’est pas présenté/e aux appuis dispensés aux apprentis du&nbsp;:</label>
    </div>

    <p class=MsoNormal style='margin-right:-.1pt'>&nbsp;</p>

    <p align="center"><?php setlocale (LC_TIME, 'fr_FR'); echo strftime('%A, le %d %B %Y', strtotime($date))?></p>

    <p class=MsoNormal style='margin-right:-.1pt'>&nbsp;</p>

    <p class=MsoNormal style='margin-right:-.1pt; text-align: center;'>REMARQUES DE LA FONDATION :</p>

    <p class=MsoNormal style='margin-right:-.1pt; text-align: center;'><span style='font-family:"Open Sans"'>{{ $prenom_eleve[0]->prenom }} {{ $nom_eleve[0]->nom }} ne s'est pas présenté@if($titre_eleve[0]->titre == 'Madame')e @endif à la Fondation @if(stripos($raison, 'injustifié'))et n'a pas prévenu de son absence
        ({{ $raison }}).@else mais a prévenu de son absence ({{ $raison }}).@endif </span></p>

    <p class=MsoNormal style='margin-right:-.1pt; text-align: center;'><span style='font-family:"Open Sans"'>…………………………………………………………………………………………………………………</span></p>

    <p class=MsoNormal style='margin-right:-.1pt; text-align: center;'><span style='font-family:"Open Sans"'>…………………………………………………………………………………………………………………</span></p>

    <p class=MsoNormal>            </p>

    <p class=MsoNormal align=center style='margin-right:-.1pt;text-align:center'><b><i><span
                    style='font-size:12.0pt'>A son retour aux cours PAA, ECLAT ou aux appuis
apprentis, l'élève remettra au professeur/maître d’apprentissage/référent de la
Fondation cette pièce dûment signée par le représentant légal (ou lui-même, si
majeur).</span></i></b></p>

    <p class=MsoNormal align=center style='margin-right:-.1pt;text-align:center'><b><i><span
                    style='font-size:13.0pt'>&nbsp;</span></i></b></p>

    <p class=MsoNormal>Avec nos sentiments distingués.</p>

    <p class=MsoNormal><span style='font-size:8.0pt'>&nbsp;</span></p>

    <p class=MsoNormal><span style='font-size:8.0pt'>&nbsp;</span></p>

    <div>
        <p class=MsoNormal style="float: left;"><?php setlocale (LC_TIME, 'fr_FR'); echo strftime('Sion, le %d %B %Y', strtotime("now"))?></p>
        <p class=MsoNormal style="float: right;">La Direction : ………………………………………………….</p>
    </div>

    <br/><br/><br/>

    <p class=MsoNormal style='margin-right:-.1pt'>MOTIF DE L'ABSENCE :</p>

    <p class=MsoNormal style='line-height:150%'><span style='font-family:"Open Sans"'>&nbsp;</span></p>

    <p class=MsoNormal><span style='font-size:8.0pt'>&nbsp;</span></p>

    <div>
        <p class=MsoNormal style="float: left"><span style='font-size:10.0pt'>Date : ………………………………………………….</span></p>
        <p class=MsoNormal style="float: right"><span style='font-size:10.0pt'>Signature de l’élève : ………………………………………………….</span></p>
    </div>

    <br/><br/><br/>

    <p class=MsoNormal style="text-align: left;"><span style='font-size:10.0pt'>Signature du représentant légal (si élève mineur)&nbsp;:</span></p>
    <br/>
    <p class=MsoNormal style="text-align: left;">………………………………………………….</p>

</div>

</body>

</html>
