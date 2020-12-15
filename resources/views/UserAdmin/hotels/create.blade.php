@extends('layouts.app')

@section('content')

<div class="container">
    <!-- Content here -->
    <div class="row">
        <!-- Left bar here -->
        <div class="col-md-3">
            @include('UserAdmin.partials.left_side_bar')
        </div>
        <!-- admin bar here -->
        <div class="col-md-8">
            @include('UserAdmin.partials.add_object_bar')

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif
            <form method="post" action="{{ route('hotels.store') }}">
                @csrf

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- input fields here -->
                                <input type="hidden" name="user_id" value="{{Auth::id()}}">
                                <input type="hidden" name="slug" value="{{'slug'}}">
                                <div class="form-group col">
                                    <label  for="name">Име на хотела :</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ old('name') }}" />
                                </div>
                                <div class="form-group col">
                                    <label  for="city">Град,село,местност нас.място :</label>
                                    <input type="text" class="form-control" name="city" id="city"
                                        value="{{ old('city') }}" />
                                </div>
                                <div class="form-group col">
                                    <label for="address">Адрес на хотела :</label>
                                    <input type="text" class="form-control" name="address" id="address"
                                        value="{{ old('address') }}" />
                                </div>
                                <div class="form-group col">
                                    <label for="phone">Телефон на хотела :</label>
                                    <input type="text" class="form-control" name="phone" id="phone"
                                        value="{{ old('phone') }}" />
                                </div>
                                <div class="form-group col">
                                    <label for="email">e-mail на хотела :</label>
                                    <input type="text" class="form-control" name="email" id="email"
                                        value="{{ old('email') }}" />
                                </div>
                                <div class="form-group col">
                                    <label for="web_adr">интернет сайт на хотела :</label>
                                    <input type="text" class="form-control" name="web_adr" id="web_adr"
                                        value="{{ old('web_adr') }}" />
                                </div>

                                <div class="form-group col">
                                    <label for="category">категория/вид на хотела</label>
                                    <select name="category" class="form-control" id="category" value="{{$categories}}">
                                        <option value="" disabled selected>изберете категория</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <!-- checkbox 1 col here -->
                                <div class="form-check ">
                                    <input class="form-check-input" type="checkbox" id="parking" name="parking"
                                    value="1"{{old('parking', isset($parking) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="parking">паркинг</label>
                                </div>
                                <div class="form-check ">
                                    <input class="form-check-input" type="checkbox" id="restorant" name="restorant"
                                    value="1"{{old('restorant', isset($restorant) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="restorant">ресторант</label>
                                </div>
                                <div class="form-check ">
                                    <input class="form-check-input" type="checkbox" id="internet" name="internet"
                                    value="1"{{old('internet', isset($internet) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="internet">интернет</label>
                                </div>
                                <div class="form-check ">
                                    <input class="form-check-input" type="checkbox" id="otkrit_basein" name="otkrit_basein"
                                    value="1"{{old('otkrit_basein', isset($otkrit_basein) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="otkrit_basein">открит басейн</label>
                                </div>
                                <div class="form-check ">
                                    <input class="form-check-input" type="checkbox" id="zakrit_basein" name="zakrit_basein"
                                    value="1"{{old('zakrit_basein', isset($zakrit_basein) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="zakrit_basein">закрит басейн</label>
                                </div>
                                <div class="form-check ">
                                    <input class="form-check-input" type="checkbox" id="sauna" name="sauna"
                                    value="1"{{old('sauna', isset($sauna) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="otkrit_basein">сауна</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="parna_banq" name="parna_banq"
                                    value="1"{{old('parna_banq', isset($parna_banq) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="parna_banq">парна баня</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="detski_kut" name="detski_kut"
                                    value="1"{{old('detski_kut', isset($detski_kut) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="detski_kut">детски кът</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="detski_basein" name="detski_basein"
                                    value="1"{{old('detski_basein', isset($detski_basein) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="detski_basein">детски басейн</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="mineralni_bani" name="mineralni_bani"
                                    value="1"{{old('mineralni_bani', isset($mineralni_bani) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="mineralni_bani">минерални бани</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="studio_za_masaj" name="studio_za_masaj"
                                    value="1"{{old('studio_za_masaj', isset($studio_za_masaj) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="studio_za_masaj">студио за масаж</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="fitnes" name="fitnes"
                                    value="1"{{old('fitnes', isset($fitnes) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="fitnes">фитнес</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="spa_centur" name="spa_centur"
                                    value="1"{{old('spa_centur', isset($spa_centur) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="spa_centur">спа център</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="akvapark" name="akvapark"
                                    value="1"{{old('akvapark', isset($akvapark) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="akvapark">аквапарк</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="animatori" name="animatori"
                                    value="1"{{old('animatori', isset($animatori) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="animatori">аниматори</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="baniq_toaletna" name="baniq_toaletna"
                                    value="1"{{old('baniq_toaletna', isset($baniq_toaletna) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="baniq_toaletna">баня и тоалетна</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="bar_basein" name="bar_basein"
                                    value="1"{{old('bar_basein', isset($bar_basein) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="bar_basein">бар басейн</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="bbq" name="bbq"
                                    value="1"{{old('bbq', isset($bbq) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="bbq">барбекю</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="basketbol" name="basketbol"
                                    value="1"{{old('basketbol', isset($basketbol) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="basketbol">баскетбол</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="biznes_uslugi" name="biznes_uslugi"
                                    value="1"{{old('biznes_uslugi', isset($biznes_uslugi) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="biznes_uslugi">бизнес услуги</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="bilqrd" name="bilqrd"
                                    value="1"{{old('bilqrd', isset($bilqrd) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="bilqrd">билярд</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="bouling" name="bouling"
                                    value="1"{{old('bouling', isset($bouling) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="bouling">боулинг</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="vana" name="vana"
                                    value="1"{{old('vana', isset($vana) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="vana">вана</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="voleibol" name="voleibol"
                                    value="1"{{old('voleibol', isset($voleibol) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="voleibol">волейбол</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="garaj" name="garaj"
                                    value="1"{{old('garaj', isset($garaj) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="garaj">гараж</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gladene" name="gladene"
                                    value="1"{{old('gladene', isset($gladene) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="gladene">гладене</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gotvarska_pechka" name="gotvarska_pechka"
                                    value="1"{{old('gotvarska_pechka', isset($gotvarska_pechka) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="gotvarska_pechka">готварска печка</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="djakuzi" name="djakuzi"
                                    value="1"{{old('djakuzi', isset($djakuzi) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="djakuzi">джакузи</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="domashni_lubimci" name="domashni_lubimci"
                                    value="1"{{old('domashni_lubimci', isset($domashni_lubimci) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="domashni_lubimci">домашни любимци</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="dostup_za_invalidi" name="dostup_za_invalidi"
                                    value="1"{{old('dostup_za_invalidi', isset($dostup_za_invalidi) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="dostup_za_invalidi">достъп инвалиди</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="ekskurzovod" name="ekskurzovod"
                                    value="1"{{old('ekskurzovod', isset($ekskurzovod) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="ekskurzovod">екскурзовод</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="kazino" name="kazino"
                                    value="1"{{old('kazino', isset($kazino) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="kazino">казино</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="kamina" name="kamina"
                                    value="1"{{old('kamina', isset($kamina) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="kamina">камина</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="kafe_mashina" name="kafe_mashina"
                                    value="1"{{old('kafe_mashina', isset($kafe_mashina) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="kafe_mashina">кафемашина</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="kafene" name="kafene"
                                    value="1"{{old('kafene', isset($kafene) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="kafene">кафене</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="klimatik" name="klimatik"
                                    value="1"{{old('klimatik', isset($klimatik) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="klimatik">климатик</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="konna_baza" name="konna_baza"
                                    value="1"{{old('konna_baza', isset($konna_baza) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="konna_baza">конна база</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <!-- checkbox 2 col here -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="konferentna_zala" name="konferentna_zala"
                                    value="1"{{old('konferentna_zala', isset($konferentna_zala) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="konferentna_zala">конферентна зала</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="kuhnq" name="kuhnq"
                                    value="1"{{old('kuhnq', isset($kuhnq) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="kuhnq">кухня</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="lekarski_kabinet" name="lekarski_kabinet"
                                    value="1"{{old('lekarski_kabinet', isset($lekarski_kabinet) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="lekarski_kabinet">лекарски кабинет</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="lobi_bar" name="lobi_bar"
                                    value="1"{{old('lobi_bar', isset($lobi_bar) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="lobi_bar">лоби бар</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="mehana" name="mehana"
                                    value="1"{{old('mehana', isset($mehana) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="mehana">механа</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="mikrovulnova" name="mikrovulnova"
                                    value="1"{{old('mikrovulnova', isset($mikrovulnova) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="mikrovulnova">микровълнова</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="mini_golf" name="mini_golf"
                                    value="1"{{old('mini_golf', isset($mini_golf) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="mini_golf">мини голф</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="mini_bar" name="mini_bar"
                                    value="1"{{old('mini_bar', isset($mini_bar) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="mini_bar">мини бар</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="naem_kolela" name="naem_kolela"
                                    value="1"{{old('naem_kolela', isset($naem_kolela) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="naem_kolela">колела под наем</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="noshten_bar" name="noshten_bar"
                                    value="1"{{old('noshten_bar', isset($noshten_bar) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="noshten_bar">нощен бар</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="noshten_klub" name="noshten_klub"
                                    value="1"{{old('noshten_klub', isset($noshten_klub) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="noshten_klub">нощен клуб</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="obmenno_buro" name="obmenno_buro"
                                    value="1"{{old('obmenno_buro', isset($obmenno_buro) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="obmenno_buro">обменно бюро</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="otoplenie" name="otoplenie"
                                    value="1"{{old('otoplenie', isset($otoplenie) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="otoplenie">отопление</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="ohrana" name="ohrana"
                                    value="1"{{old('ohrana', isset($ohrana) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="ohrana">охрана</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="peralnq" name="peralnq"
                                    value="1"{{old('peralnq', isset($peralnq) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="peralnq">пералня</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="plashtane_s_karta" name="plashtane_s_karta"
                                    value="1"{{old('plashtane_s_karta', isset($plashtane_s_karta) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="plashtane_s_karta">плащане с карта</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="prane" name="prane"
                                    value="1"{{old('prane', isset($prane) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="prane">пране</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="radio" name="radio"
                                    value="1"{{old('radio', isset($radio) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="radio">радио</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="rent_a_car" name="rent_a_car"
                                    value="1"{{old('rent_a_car', isset($rent_a_car) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="rent_a_car">рента кар</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="rum_serviz" name="rum_serviz"
                                    value="1"{{old('rum_serviz', isset($rum_serviz) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="rum_serviz">румсървис</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="seif" name="seif"
                                    value="1"{{old('seif', isset($seif) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="seif">сейф</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="seshoar" name="seshoar"
                                    value="1"{{old('seshoar', isset($seshoar) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="seshoar">сешоар</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="ski_garderob" name="ski_garderob"
                                    value="1"{{old('ski_garderob', isset($ski_garderob) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="ski_garderob">ски гардероб</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="snejen_djet" name="snejen_djet"
                                    value="1"{{old('snejen_djet', isset($snejen_djet) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="snejen_djet">снежен джет</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="solarium" name="solarium"
                                    value="1"{{old('solarium', isset($solarium) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="solarium">солариум</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="sudomiqlna" name="sudomiqlna"
                                    value="1"{{old('sudomiqlna', isset($sudomiqlna) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="sudomiqlna">съдомиялна</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="tv" name="tv"
                                    value="1"{{old('tv', isset($tv) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="tv">телевизия</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="telefon" name="telefon"
                                    value="1"{{old('telefon', isset($telefon) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="telefon">телефон</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="tenis_kort" name="tenis_kort"
                                    value="1"{{old('tenis_kort', isset($tenis_kort) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="tenis_kort">тенис корт</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="tenis_na_masa" name="tenis_na_masa"
                                    value="1"{{old('tenis_na_masa', isset($tenis_na_masa) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="tenis_na_masa">тенис на маса</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="terasa" name="terasa"
                                    value="1"{{old('terasa', isset($terasa) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="terasa">тераса</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="salon_za_krasota" name="salon_za_krasota"
                                    value="1"{{old('salon_za_krasota', isset($salon_za_krasota) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="salon_za_krasota">салон за красота</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="futbol" name="futbol"
                                    value="1"{{old('futbol', isset($futbol) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="futbol">футбол</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="hazqiy" name="hazqiy"
                                    value="1"{{old('hazqiy', isset($hazqiy) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="hazqiy">хазяи</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="himichesko_chistene" name="himichesko_chistene"
                                    value="1"{{old('himichesko_chistene', isset($himichesko_chistene) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="himichesko_chistene">хим.чистене</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="hladilnik" name="hladilnik"
                                    value="1"{{old('hladilnik', isset($hladilnik) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="hladilnik">хладилник</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="utiq" name="utiq"
                                    value="1"{{old('utiq', isset($utiq) ? 'checked' : '') }}>
                                    <label class="form-check-label" for="utiq">ютия</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Add Data</button>
            </form>
        </div>
    </div>
</div>
@endsection



