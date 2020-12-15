<?php

namespace App\Http\Controllers\UserAdmin;

use App\Hotel;
use App\HotelExtra;
use App\HotelCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HotelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd("index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = HotelCategory::all();
        $extras = HotelExtra::all();

        return view('UserAdmin.hotels.create',compact('categories','extras'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'city' => 'required|max:255',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);
        $hotelId = Hotel::create([
            'user_id'=>$request->get('user_id'),
            'slug'=>$request->get('slug'),
            'name'=>$request->get('name'),
            'city'=>$request->get('city'),
            'address'=>$request->get('address'),
            'phone'=>$request->get('phone'),
            'email'=>$request->get('email'),
            'web_adr'=>$request->get('web_adr'),
            'category_id'=>(int)$request->get('category'),
        ]);
        HotelExtra::create([
            'hotel_id'=>$hotelId->id,
            'parking'=>$request->get('parking'),
            'restorant'=>$request->get('restorant'),
            'internet'=>$request->get('internet'),
            'otkrit_basein'=>$request->get('otkrit_basein'),
            'zakrit_basein'=>$request->get('zakrit_basein'),
            'sauna'=>$request->get('sauna'),
            'parna_banq'=>$request->get('parna_banq'),
            'detski_kut'=>$request->get('detski_kut'),
            'detski_basein'=>$request->get('detski_basein'),
            'mineralni_bani'=>$request->get('mineralni_bani'),
            'studio_za_masaj'=>$request->get('studio_za_masaj'),
            'fitnes'=>$request->get('fitnes'),
            'spa_centur'=>$request->get('spa_centur'),
            'akvapark'=>$request->get('akvapark'),
            'animatori'=>$request->get('animatori'),
            'baniq_toaletna'=>$request->get('baniq_toaletna'),
            'bar_basein'=>$request->get('bar_basein'),
            'bbq'=>$request->get('bbq'),
            'basketbol'=>$request->get('basketbol'),
            'biznes_uslugi'=>$request->get('biznes_uslugi'),
            'bilqrd'=>$request->get('bilqrd'),
            'bouling'=>$request->get('bouling'),
            'vana'=>$request->get('vana'),
            'voleibol'=>$request->get('voleibol'),
            'garaj'=>$request->get('garaj'),
            'gladene'=>$request->get('gladene'),
            'gotvarska_pechka'=>$request->get('gotvarska_pechka'),
            'djakuzi'=>$request->get('djakuzi'),
            'domashni_lubimci'=>$request->get('domashni_lubimci'),
            'dostup_za_invalidi'=>$request->get('dostup_za_invalidi'),
            'ekskurzovod'=>$request->get('ekskurzovod'),
            'kazino'=>$request->get('kazino'),
            'kamina'=>$request->get('kamina'),
            'kafe_mashina'=>$request->get('kafe_mashina'),
            'kafene'=>$request->get('kafene'),
            'klimatik'=>$request->get('klimatik'),
            'konna_baza'=>$request->get('konna_baza'),
            'konferentna_zala'=>$request->get('konferentna_zala'),
            'kuhnq'=>$request->get('kuhnq'),
            'lekarski_kabinet'=>$request->get('lekarski_kabinet'),
            'lobi_bar'=>$request->get('lobi_bar'),
            'mehana'=>$request->get('mehana'),
            'mikrovulnova'=>$request->get('mikrovulnova'),
            'mini_golf'=>$request->get('mini_golf'),
            'mini_bar'=>$request->get('mini_bar'),
            'naem_kolela'=>$request->get('naem_kolela'),
            'noshten_bar'=>$request->get('noshten_bar'),
            'noshten_klub'=>$request->get('noshten_klub'),
            'obmenno_buro'=>$request->get('obmenno_buro'),
            'otoplenie'=>$request->get('otoplenie'),
            'ohrana'=>$request->get('ohrana'),
            'peralnq'=>$request->get('peralnq'),
            'plashtane_s_karta'=>$request->get('plashtane_s_karta'),
            'prane'=>$request->get('prane'),
            'radio'=>$request->get('radio'),
            'rent_a_car'=>$request->get('rent_a_car'),
            'rum_serviz'=>$request->get('rum_serviz'),
            'seif'=>$request->get('seif'),
            'seshoar'=>$request->get('seshoar'),
            'ski_garderob'=>$request->get('ski_garderob'),
            'snejen_djet'=>$request->get('snejen_djet'),
            'solarium'=>$request->get('solarium'),
            'sudomiqlna'=>$request->get('sudomiqlna'),
            'tv'=>$request->get('tv'),
            'telefon'=>$request->get('telefon'),
            'tenis_kort'=>$request->get('tenis_kort'),
            'tenis_na_masa'=>$request->get('tenis_na_masa'),
            'terasa'=>$request->get('terasa'),
            'salon_za_krasota'=>$request->get('salon_za_krasota'),
            'futbol'=>$request->get('futbol'),
            'hazqiy'=>$request->get('hazqiy'),
            'himichesko_chistene'=>$request->get('himichesko_chistene'),
            'hladilnik'=>$request->get('hladilnik'),
            'utiq'=>$request->get('utiq')
        ]);


        return redirect('/hotels')->with('success', 'Hotel is successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
