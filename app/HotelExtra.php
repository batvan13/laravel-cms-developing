<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelExtra extends Model
{
     // Mass assigned
     protected $fillable=[
         'hotel_id',
         'parking',
         'restorant',
         'internet',
         'otkrit_basein',
         'zakrit_basein',
         'sauna',
         'parna_banq',
         'detski_kut',
         'detski_basein',
         'mineralni_bani',
         'studio_za_masaj',
         'fitnes',
         'spa_centur',
         'akvapark',
         'animatori',
         'baniq_toaletna',
         'bar_basein',
         'bbq',
         'basketbol',
         'biznes_uslugi',
         'bilqrd',
         'bouling',
         'vana',
         'voleibol',
         'garaj',
         'gladene',
         'gotvarska_pechka',
         'djakuzi',
         'domashni_lubimci',
         'dostup_za_invalidi',
         'ekskurzovod',
         'kazino',
         'kamina',
         'kafe_mashina',
         'kafene',
         'klimatik',
         'konna_baza',
         'konferentna_zala',
         'kuhnq',
         'lekarski_kabinet',
         'lobi_bar',
         'mehana',
         'mikrovulnova',
         'mini_golf',
         'mini_bar',
         'naem_kolela',
         'noshten_bar',
         'noshten_klub',
         'obmenno_buro',
         'otoplenie',
         'ohrana',
         'peralnq',
         'plashtane_s_karta',
         'prane',
         'radio',
         'rent_a_car',
         'rum_serviz',
         'seif',
         'seshoar',
         'ski_garderob',
         'snejen_djet',
         'solarium',
         'sudomiqlna',
         'tv',
         'telefon',
         'tenis_kort',
         'tenis_na_masa',
         'terasa',
         'salon_za_krasota',
         'futbol',
         'hazqiy',
         'himichesko_chistene',
         'hladilnik',
         'utiq'
    ];

     public function hotel()
    {
    	return $this->belongsTo('App\Hotel');
    }
}
