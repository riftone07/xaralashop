<?php

function format_devise($montant)
{
    return number_format($montant,0,','," ")  . " Fcfa";
}


function mettre_en_majuscule($chaine)
{
    return strtoupper($chaine) ;
}
