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
        <div class="col-md-9">
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
            <form method="post" action="{{ route('hotels.update',[$hotel->id]) }}">
                {{method_field('PATCH')}}
                @csrf

                <div class="card"><!-- описание на обекта -->
                    <div class="card-header">
                        <span class="float-left">
                            <h4>описание на обекта</h4>
                        </span>
                        <span class="float-right">
                            <h4>
                                <p class="text-muted">примерни полета</p>
                            </h4>
                        </span>
                    </div>
                    <div class="card-body">

                        <input type="hidden" name="user_id" value="{{Auth::id()}}">
                        <div class="row">
                            <!-- input fields here -->
                            <div class="col-sm-8">
                                <div class="form-group col">
                                    <label for="name_bg"><span style="color:red">*</span>Име на обекта (бълг.)</label>
                                    <input type="text" class="form-control form-control-sm" name="name_bg" id="name_bg"
                                        class="@error('name_bg') is-invalid @enderror" value="{{ old('name_bg',$hotel->name_bg) }}" />

                                    @error('name_bg')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="name_en"><span style="color:red">*</span>Име на обекта (англ.)</label>
                                    <input type="text" class="form-control form-control-sm" name="name_en" id="name_en"
                                        class="@error('name_en') is-invalid @enderror" value="{{ old('name_en',$hotel->name_en) }}" />

                                    @error('name_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="town"><span style="color:red">*</span>Град,село,местност нас.място</label>
                                    <select name="town" class="form-control form-control-sm" id="town"
                                        class="@error('town') is-invalid @enderror">

                                        <option value="" disabled selected>избери</option>

                                        @foreach ($towns as $town)

                                         <option
                                            {{ old('town', $hotel->town_id) == $town->id ? 'selected' : '' }}
                                            value="{{$town->id}}" > {{$town->name}}
                                        </option>
                                        

                                        @endforeach

                                    </select>

                                    @error('town')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="address_bg">Адрес на обекта (бълг.)</label>
                                    <input type="text" class="form-control form-control-sm" name="address_bg" id="address_bg"
                                        class="@error('address_bg') is-invalid @enderror" value="{{ old('address_bg',$hotel->address_bg) }}" />

                                    @error('address_bg')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="address_en">Адрес на обекта (англ.)</label>
                                    <input type="text" class="form-control form-control-sm" name="address_en" id="address_en"
                                        class="@error('address_en') is-invalid @enderror" value="{{ old('address_en',$hotel->address_en) }}" />

                                    @error('address_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="phone"><span style="color:red">*</span>Телефони за резервации</label>
                                    <input type="text" class="form-control form-control-sm" name="phone" id="phone"
                                        class="@error('phone') is-invalid @enderror" value="{{ old('phone',$hotel->phone) }}" />

                                    @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="email">Е-поща</label>
                                    <input type="text" class="form-control form-control-sm" name="email" id="email"
                                        class="@error('email') is-invalid @enderror" value="{{ old('email',$hotel->email) }}" />

                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="web_adr">Интернет адрес</label>
                                    <input type="text" class="form-control form-control-sm" name="web_adr" id="web_adr"
                                        class="@error('web_adr') is-invalid @enderror" value="{{ old('web_adr',$hotel->web_adr) }}" />

                                    @error('web_adr')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="category"><span style="color:red">*</span>категория/вид на обекта</label>
                                    <select name="category" class="form-control form-control-sm" id="category"
                                        class="@error('category') is-invalid @enderror" >

                                        <option value="" disabled selected>избери</option>

                                        @foreach ($categories as $category)

                                         <option
                                            {{ old('category',$hotel->category_id) == $category->id ? 'selected' : '' }}
                                            value="{{$category->id}}"> {{$category->name}}
                                        </option>


                                        @endforeach
                                    </select>
                                    @error('category')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="stars">Брой звезди</label>
                                    <select name="stars" class="form-control form-control-sm" id="stars"
                                        class="@error('stars') is-invalid @enderror">
                                        <option
                                        {{ old('stars', $hotel->stars) == 0 ? 'selected' : '' }}
                                        value="0">няма</option>

                                        <option
                                        {{ old('stars', $hotel->stars) == 1 ? 'selected' : '' }}
                                        value="1">1</option>

                                        <option
                                        {{ old('stars', $hotel->stars) == 2 ? 'selected' : '' }}
                                        value="2">2</option>

                                        <option
                                        {{ old('stars', $hotel->stars) == 3 ? 'selected' : '' }}
                                        value="3">3</option>

                                        <option
                                        {{ old('stars', $hotel->stars) == 4 ? 'selected' : '' }}
                                        value="4">4</option>

                                        <option
                                        {{ old('stars', $hotel->stars) == 5 ? 'selected' : '' }}
                                        value="5">5</option>
                                    </select>

                                    @error('stars')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="start_price"><span style="color:red">*</span>Цени започващи от : за помещение в
                                        лева.</label>
                                    <input type="text" class="form-control form-control-sm" name="start_price" id="start_price"
                                        class="@error('start_price') is-invalid @enderror" value="{{ old('start_price',$hotel->start_price) }}" />

                                    @error('start_price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!--example input fields here -->
                            <div class="col-sm-4">
                                <fieldset disabled>
                                    <div class="form-group col">
                                        <label for="disabledTextInput" class="form-label">Пример</label>
                                        <input type="text" id="disabledTextInput" class="form-control form-control-sm"
                                            placeholder="Шератон">
                                    </div>

                                    <div class="form-group col">
                                        <label for="disabledTextInput" class="form-label">Пример</label>
                                        <input type="text" id="disabledTextInput" class="form-control form-control-sm"
                                            placeholder="Sheraton">
                                    </div>

                                    <div class="form-group col">
                                        <label for="disabledTextInput" class="form-label">Пример</label>
                                        <input type="text" id="disabledTextInput" class="form-control form-control-sm"
                                            placeholder="Банско">
                                    </div>

                                    <div class="form-group col">
                                        <label for="disabledTextInput" class="form-label">Пример</label>
                                        <input type="text" id="disabledTextInput" class="form-control form-control-sm"
                                            placeholder="Ул. Пирин 17">
                                    </div>

                                    <div class="form-group col">
                                        <label for="disabledTextInput" class="form-label">Пример</label>
                                        <input type="text" id="disabledTextInput" class="form-control form-control-sm"
                                            placeholder="17, Pirin Str.">
                                    </div>

                                    <div class="form-group col">
                                        <label for="disabledTextInput" class="form-label">Пример</label>
                                        <input type="text" id="disabledTextInput" class="form-control form-control-sm"
                                            placeholder="0887526303">
                                    </div>

                                    <div class="form-group col">
                                        <label for="disabledTextInput" class="form-label">Пример</label>
                                        <input type="text" id="disabledTextInput" class="form-control form-control-sm"
                                            placeholder="sheraton@gmail.com">
                                    </div>

                                    <div class="form-group col">
                                        <label for="disabledTextInput" class="form-label">Пример</label>
                                        <input type="text" id="disabledTextInput" class="form-control form-control-sm"
                                            placeholder="www.sheraton.com">
                                    </div>

                                    <div class="form-group col">
                                        <label for="disabledTextInput" class="form-label">Пример</label>
                                        <input type="text" id="disabledTextInput" class="form-control form-control-sm"
                                            placeholder="сем.хотел">
                                    </div>

                                    <div class="form-group col">
                                        <label for="disabledTextInput" class="form-label">Пример</label>
                                        <input type="text" id="disabledTextInput" class="form-control form-control-sm" placeholder="5">
                                    </div>

                                    <div class="form-group col">
                                        <label for="disabledTextInput" class="form-label">Пример цена в лева</label>
                                        <input type="text" id="disabledTextInput" class="form-control form-control-sm" placeholder="85">
                                    </div>

                                </fieldset>
                            </div>

                        </div>

                    </div>

                </div>
                <div class="card"><!-- Типове помещения и цени -->
                    <div class="card-header">
                        <span class="float-left">
                            <h4>Типове помещения и цени подробно </h4>
                        </span>
                        <span class="float-right">
                            <p class="text-muted">*цената е обща за помещението на вечер</p>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="form-group col">
                            <label for="price_long">
                                Пример :</br>
                                стандартна стая 2 места - 50лв.</br>
                                лукс стая 3 места - 90лв.</br>
                                апартамент 4 места - 120лв.</br>
                                легло 20лв.</br>
                                бунгало 4 места - 60лв.</br>
                            </label>
                            <textarea class="form-control form-control-sm" name="price_long" id="price_long" rows="10"
                                class="@error('price_long') is-invalid @enderror" >
                                {{ old('price_long',$hotel->price_long) }}
                             </textarea>

                            @error('price_long')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card"><!-- Екстри -->
                    <div class="card-header"><span class="float-left">
                            <h4>Екстри</h4>
                        </span></div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-sm-3">
                                <!-- checkbox 1 col here -->
                                <div class="form-check ">
                                    <input class="form-check-input"id="parking" type="checkbox"  name="parking" value="1"
                                        {{ old('parking',$extras->first()->parking) =="1" ? 'checked' : ''}} />

                                    <label class="form-check-label" for="parking">паркинг</label>

                                </div>

                                <div class="form-check ">
                                    <input class="form-check-input" type="checkbox" id="restorant" name="restorant" value="1"
                                    {{ old('restorant',$extras->first()->restorant) =="1" ? 'checked' : ''}} />
                                    <label class="form-check-label" for="restorant">ресторант</label>
                                </div>

                                <div class="form-check ">
                                    <input class="form-check-input" type="checkbox" id="internet" name="internet" value="1"
                                        @if(old('internet',$extras->first()->internet)=="1" ) checked @endif>
                                    <label class="form-check-label" for="internet">интернет</label>
                                </div>
                                <div class="form-check ">
                                    <input class="form-check-input" type="checkbox" id="otkrit_basein" name="otkrit_basein" value="1"
                                        @if(old('otkrit_basein',$extras->first()->otkrit_basein)=="1" ) checked @endif>
                                    <label class="form-check-label" for="otkrit_basein">открит басейн</label>
                                </div>
                                <div class="form-check ">
                                    <input class="form-check-input" type="checkbox" id="zakrit_basein" name="zakrit_basein" value="1"
                                        @if(old('zakrit_basein',$extras->first()->zakrit_basein)=="1" ) checked @endif>
                                    <label class="form-check-label" for="zakrit_basein">закрит басейн</label>
                                </div>
                                <div class="form-check ">
                                    <input class="form-check-input" type="checkbox" id="sauna" name="sauna" value="1"
                                        @if(old('sauna',$extras->first()->sauna)=="1" ) checked @endif>
                                    <label class="form-check-label" for="sauna">сауна</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="parna_banq" name="parna_banq" value="1"
                                        @if(old('parna_banq',$extras->first()->parna_banq)=="1" ) checked @endif>
                                    <label class="form-check-label" for="parna_banq">парна баня</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="detski_kut" name="detski_kut" value="1"
                                        @if(old('detski_kut',$extras->first()->detski_kut)=="1" ) checked @endif>
                                    <label class="form-check-label" for="detski_kut">детски кът</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="detski_basein" name="detski_basein" value="1"
                                        @if(old('detski_basein',$extras->first()->detski_basein)=="1" ) checked @endif>
                                    <label class="form-check-label" for="detski_basein">детски басейн</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="mineralni_bani" name="mineralni_bani" value="1"
                                        @if(old('mineralni_bani',$extras->first()->mineralni_bani)=="1" ) checked @endif>
                                    <label class="form-check-label" for="mineralni_bani">минерални бани</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="studio_za_masaj" name="studio_za_masaj"
                                        value="1" @if(old('studio_za_masaj',$extras->first()->studio_za_masaj)=="1" ) checked @endif>
                                    <label class="form-check-label" for="studio_za_masaj">студио за масаж</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="fitnes" name="fitnes" value="1"
                                        @if(old('fitnes',$extras->first()->fitnes)=="1" ) checked @endif>
                                    <label class="form-check-label" for="fitnes">фитнес</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="spa_centur" name="spa_centur" value="1"
                                        @if(old('spa_centur',$extras->first()->spa_centur)=="1" ) checked @endif>
                                    <label class="form-check-label" for="spa_centur">спа център</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="akvapark" name="akvapark" value="1"
                                        @if(old('akvapark',$extras->first()->akvapark)=="1" ) checked @endif>
                                    <label class="form-check-label" for="akvapark">аквапарк</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="animatori" name="animatori" value="1"
                                        @if(old('animatori',$extras->first()->animatori)=="1" ) checked @endif>
                                    <label class="form-check-label" for="animatori">аниматори</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="baniq_toaletna" name="baniq_toaletna" value="1"
                                        @if(old('baniq_toaletna',$extras->first()->baniq_toaletna)=="1" ) checked @endif>
                                    <label class="form-check-label" for="baniq_toaletna">баня и тоалетна</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="bar_basein" name="bar_basein" value="1"
                                        @if(old('bar_basein',$extras->first()->bar_basein)=="1" ) checked @endif>
                                    <label class="form-check-label" for="bar_basein">бар басейн</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="bbq" name="bbq" value="1"
                                        @if(old('bbq',$extras->first()->bbq)=="1" ) checked @endif>
                                    <label class="form-check-label" for="bbq">барбекю</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="basketbol" name="basketbol" value="1"
                                        @if(old('basketbol',$extras->first()->basketbol)=="1" ) checked @endif>
                                    <label class="form-check-label" for="basketbol">баскетбол</label>
                                </div>

                            </div>
                            <!--end col 1 -->

                            <div class="col-sm-3">
                                <!--checkbox 2 col here -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="biznes_uslugi" name="biznes_uslugi" value="1"
                                        @if(old('biznes_uslugi',$extras->first()->biznes_uslugi)=="1" ) checked @endif>
                                    <label class="form-check-label" for="biznes_uslugi">бизнес услуги</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="bilqrd" name="bilqrd" value="1"
                                        @if(old('bilqrd',$extras->first()->bilqrd)=="1" ) checked @endif>
                                    <label class="form-check-label" for="bilqrd">билярд</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="bouling" name="bouling" value="1"
                                        @if(old('bouling',$extras->first()->bouling)=="1" ) checked @endif>
                                    <label class="form-check-label" for="bouling">боулинг</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="vana" name="vana" value="1"
                                        @if(old('vana',$extras->first()->vana)=="1" ) checked @endif>
                                    <label class="form-check-label" for="vana">вана</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="voleibol" name="voleibol" value="1"
                                        @if(old('voleibol',$extras->first()->voleibol)=="1" ) checked @endif>
                                    <label class="form-check-label" for="voleibol">волейбол</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="garaj" name="garaj" value="1"
                                        @if(old('garaj',$extras->first()->garaj)=="1" ) checked @endif>
                                    <label class="form-check-label" for="garaj">гараж</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gladene" name="gladene" value="1"
                                        @if(old('gladene',$extras->first()->gladene)=="1" ) checked @endif>
                                    <label class="form-check-label" for="gladene">гладене</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gotvarska_pechka" name="gotvarska_pechka"
                                        value="1" @if(old('gotvarska_pechka',$extras->first()->gotvarska_pechka)=="1" ) checked @endif>
                                    <label class="form-check-label" for="gotvarska_pechka">готварска печка</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="djakuzi" name="djakuzi" value="1"
                                        @if(old('djakuzi',$extras->first()->djakuzi)=="1" ) checked @endif>
                                    <label class="form-check-label" for="djakuzi">джакузи</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="domashni_lubimci" name="domashni_lubimci"
                                        value="1" @if(old('domashni_lubimci',$extras->first()->domashni_lubimci)=="1" ) checked @endif>
                                    <label class="form-check-label" for="domashni_lubimci">домашни любимци</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="dostup_za_invalidi" name="dostup_za_invalidi"
                                        value="1" @if(old('dostup_za_invalidi',$extras->first()->dostup_za_invalidi)=="1" ) checked @endif>
                                    <label class="form-check-label" for="dostup_za_invalidi">достъп инвалиди</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="ekskurzovod" name="ekskurzovod" value="1"
                                        @if(old('ekskurzovod',$extras->first()->ekskurzovod)=="1" ) checked @endif>
                                    <label class="form-check-label" for="ekskurzovod">екскурзовод</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="kazino" name="kazino" value="1"
                                        @if(old('kazino',$extras->first()->kazino)=="1" ) checked @endif>
                                    <label class="form-check-label" for="kazino">казино</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="kamina" name="kamina" value="1"
                                        @if(old('kamina',$extras->first()->kamina)=="1" ) checked @endif>
                                    <label class="form-check-label" for="kamina">камина</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="kafe_mashina" name="kafe_mashina" value="1"
                                        @if(old('kafe_mashina',$extras->first()->kafe_mashina)=="1" ) checked @endif>
                                    <label class="form-check-label" for="kafe_mashina">кафемашина</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="kafene" name="kafene" value="1"
                                        @if(old('kafene',$extras->first()->kafene)=="1" ) checked @endif>
                                    <label class="form-check-label" for="kafene">кафене</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="klimatik" name="klimatik" value="1"
                                        @if(old('klimatik',$extras->first()->klimatik)=="1" ) checked @endif>
                                    <label class="form-check-label" for="klimatik">климатик</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="konna_baza" name="konna_baza" value="1"
                                        @if(old('konna_baza',$extras->first()->konna_baza)=="1" ) checked @endif>
                                    <label class="form-check-label" for="konna_baza">конна база</label>
                                </div>
                            </div>
                            <!--end col 2 -->

                            <div class="col-sm-3">
                                <!--checkbox 3 col here -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="konferentna_zala" name="konferentna_zala"
                                        value="1" @if(old('konferentna_zala',$extras->first()->konferentna_zala)=="1" ) checked @endif>
                                    <label class="form-check-label" for="konferentna_zala">конферентна зала</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="kuhnq" name="kuhnq" value="1"
                                        @if(old('kuhnq',$extras->first()->kuhnq)=="1" ) checked @endif>
                                    <label class="form-check-label" for="kuhnq">кухня</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="lekarski_kabinet" name="lekarski_kabinet"
                                        value="1" @if(old('lekarski_kabinet',$extras->first()->lekarski_kabinet)=="1" ) checked @endif>
                                    <label class="form-check-label" for="lekarski_kabinet">лекарски кабинет</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="lobi_bar" name="lobi_bar" value="1"
                                        @if(old('lobi_bar',$extras->first()->lobi_bar)=="1" ) checked @endif>
                                    <label class="form-check-label" for="lobi_bar">лоби бар</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="mehana" name="mehana" value="1"
                                        @if(old('mehana',$extras->first()->mehana)=="1" ) checked @endif>
                                    <label class="form-check-label" for="mehana">механа</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="mikrovulnova" name="mikrovulnova" value="1"
                                        @if(old('mikrovulnova',$extras->first()->mikrovulnova)=="1" ) checked @endif>
                                    <label class="form-check-label" for="mikrovulnova">микровълнова</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="mini_golf" name="mini_golf" value="1"
                                        @if(old('mini_golf',$extras->first()->mini_golf)=="1" ) checked @endif>
                                    <label class="form-check-label" for="mini_golf">мини голф</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="mini_bar" name="mini_bar" value="1"
                                        @if(old('mini_bar',$extras->first()->mini_bar)=="1" ) checked @endif>
                                    <label class="form-check-label" for="mini_bar">мини бар</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="naem_kolela" name="naem_kolela" value="1"
                                        @if(old('naem_kolela',$extras->first()->naem_kolela)=="1" ) checked @endif>
                                    <label class="form-check-label" for="naem_kolela">колела под наем</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="noshten_bar" name="noshten_bar" value="1"
                                        @if(old('noshten_bar',$extras->first()->noshten_bar)=="1" ) checked @endif>
                                    <label class="form-check-label" for="noshten_bar">нощен бар</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="noshten_klub" name="noshten_klub" value="1"
                                        @if(old('noshten_klub',$extras->first()->noshten_klub)=="1" ) checked @endif>
                                    <label class="form-check-label" for="noshten_klub">нощен клуб</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="obmenno_buro" name="obmenno_buro" value="1"
                                        @if(old('obmenno_buro',$extras->first()->obmenno_buro)=="1" ) checked @endif>
                                    <label class="form-check-label" for="obmenno_buro">обменно бюро</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="otoplenie" name="otoplenie" value="1"
                                        @if(old('otoplenie',$extras->first()->otoplenie)=="1" ) checked @endif>
                                    <label class="form-check-label" for="otoplenie">отопление</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="ohrana" name="ohrana" value="1"
                                        @if(old('ohrana',$extras->first()->ohrana)=="1" ) checked @endif>
                                    <label class="form-check-label" for="ohrana">охрана</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="peralnq" name="peralnq" value="1"
                                        @if(old('peralnq',$extras->first()->peralnq)=="1" ) checked @endif>
                                    <label class="form-check-label" for="peralnq">пералня</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="plashtane_s_karta" name="plashtane_s_karta"
                                        value="1" @if(old('plashtane_s_karta',$extras->first()->plashtane_s_karta)=="1" ) checked @endif>
                                    <label class="form-check-label" for="plashtane_s_karta">плащане с карта</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="prane" name="prane" value="1"
                                        @if(old('prane',$extras->first()->prane)=="1" ) checked @endif>
                                    <label class="form-check-label" for="prane">пране</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="radio" name="radio" value="1"
                                        @if(old('radio',$extras->first()->radio)=="1" ) checked @endif>
                                    <label class="form-check-label" for="radio">радио</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="rent_a_car" name="rent_a_car" value="1"
                                        @if(old('rent_a_car',$extras->first()->rent_a_car)=="1" ) checked @endif>
                                    <label class="form-check-label" for="rent_a_car">рента кар</label>
                                </div>

                            </div>
                            <!--end col 3 -->

                            <div class="col-sm-3">
                                <!--checkbox 4 col here -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="rum_serviz" name="rum_serviz" value="1"
                                        @if(old('rum_serviz',$extras->first()->rum_serviz)=="1" ) checked @endif>
                                    <label class="form-check-label" for="rum_serviz">румсървис</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="seif" name="seif" value="1"
                                        @if(old('seif',$extras->first()->seif)=="1" ) checked @endif>
                                    <label class="form-check-label" for="seif">сейф</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="seshoar" name="seshoar" value="1"
                                        @if(old('seshoar',$extras->first()->seshoar)=="1" ) checked @endif>
                                    <label class="form-check-label" for="seshoar">сешоар</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="ski_garderob" name="ski_garderob" value="1"
                                        @if(old('ski_garderob',$extras->first()->ski_garderob)=="1" ) checked @endif>
                                    <label class="form-check-label" for="ski_garderob">ски гардероб</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="snejen_djet" name="snejen_djet" value="1"
                                        @if(old('snejen_djet',$extras->first()->snejen_djet)=="1") checked @endif>
                                    <label class="form-check-label" for="snejen_djet">снежен джет</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="solarium" name="solarium" value="1"
                                        @if(old('solarium',$extras->first()->solarium)=="1" ) checked @endif>
                                    <label class="form-check-label" for="solarium">солариум</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="sudomiqlna" name="sudomiqlna" value="1"
                                        @if(old('sudomiqlna',$extras->first()->sudomiqlna)=="1" ) checked @endif>
                                    <label class="form-check-label" for="sudomiqlna">съдомиялна</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="tv" name="tv" value="1"
                                        @if(old('tv',$extras->first()->tv)=="1" ) checked @endif>
                                    <label class="form-check-label" for="tv">телевизия</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="telefon" name="telefon" value="1"
                                        @if(old('telefon',$extras->first()->telefon)=="1" ) checked @endif>
                                    <label class="form-check-label" for="telefon">телефон</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="tenis_kort" name="tenis_kort" value="1"
                                        @if(old('tenis_kort',$extras->first()->tenis_kort)=="1" ) checked @endif>
                                    <label class="form-check-label" for="tenis_kort">тенис корт</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="tenis_na_masa" name="tenis_na_masa" value="1"
                                        @if(old('tenis_na_masa',$extras->first()->tenis_na_masa)=="1" ) checked @endif>
                                    <label class="form-check-label" for="tenis_na_masa">тенис на маса</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="terasa" name="terasa" value="1"
                                        @if(old('terasa',$extras->first()->terasa)=="1" ) checked @endif>
                                    <label class="form-check-label" for="terasa">тераса</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="salon_za_krasota" name="salon_za_krasota"
                                        value="1" @if(old('salon_za_krasota',$extras->first()->salon_za_krasota)=="1" ) checked @endif>
                                    <label class="form-check-label" for="salon_za_krasota">салон за красота</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="futbol" name="futbol" value="1"
                                        @if(old('futbol',$extras->first()->futbol)=="1" ) checked @endif>
                                    <label class="form-check-label" for="futbol">футбол</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="hazqiy" name="hazqiy" value="1"
                                        @if(old('hazqiy',$extras->first()->hazqiy)=="1" ) checked @endif>
                                    <label class="form-check-label" for="hazqiy">хазяи</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="himichesko_chistene" name="himichesko_chistene"
                                        value="1" @if(old('himichesko_chistene',$extras->first()->himichesko_chistene)=="1" ) checked @endif>
                                    <label class="form-check-label" for="himichesko_chistene">хим.чистене</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="hladilnik" name="hladilnik" vvalue="1"
                                        @if(old('hladilnik',$extras->first()->hladilnik)=="1" ) checked @endif>
                                    <label class="form-check-label" for="hladilnik">хладилник</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="utiq" name="utiq" value="1"
                                        @if(old('utiq',$extras->first()->utiq)=="1" ) checked @endif>
                                    <label class="form-check-label" for="utiq">ютия</label>
                                </div>


                            </div>
                            <!--end col 4 -->

                        </div>
                    </div>
                </div>
                <div class="card"><!-- описание на обекта (български език)-->
                    <div class="card-header">
                        <span class="float-left">
                            <h4>описание</h4>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="form-group col">
                            <label for="description">Описание на обекта (български език)</label>
                            <textarea class="form-control form-control-sm" name="description" id="description" rows="10"
                                class="@error('description') is-invalid @enderror" >
                                {{ old('description',$hotel->description) }}
                             </textarea>

                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">напред</button>
                </div>




            </form>
        </div>
    </div>
</div>
@endsection
