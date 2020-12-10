<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelExtrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_extras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotel_id')->unsigned();
            $table->boolean('parking')->nullable();
            $table->boolean('restorant')->nullable();
            $table->boolean('internet')->nullable();
            $table->boolean('otkrit_basein')->nullable();
            $table->boolean('zakrit_basein')->nullable();
            $table->boolean('sauna')->nullable();
            $table->boolean('parna_banq')->nullable();
            $table->boolean('detski_kut')->nullable();
            $table->boolean('detski_basein')->nullable();
            $table->boolean('mineralni_bani')->nullable();
            $table->boolean('studio_za_masaj')->nullable();
            $table->boolean('fitnes')->nullable();
            $table->boolean('spa_centur')->nullable();
            $table->boolean('akvapark')->nullable();
            $table->boolean('animatori')->nullable();
            $table->boolean('baniq_toaletna')->nullable();
            $table->boolean('bar_basein')->nullable();
            $table->boolean('bbq')->nullable();
            $table->boolean('basketbol')->nullable();
            $table->boolean('biznes_uslugi')->nullable();
            $table->boolean('bilqrd')->nullable();
            $table->boolean('bouling')->nullable();
            $table->boolean('vana')->nullable();
            $table->boolean('voleibol')->nullable();
            $table->boolean('garaj')->nullable();
            $table->boolean('gladene')->nullable();
            $table->boolean('gotvarska_pechka')->nullable();
            $table->boolean('djakuzi')->nullable();
            $table->boolean('domashni_lubimci')->nullable();
            $table->boolean('dostup_za_invalidi')->nullable();
            $table->boolean('ekskurzovod')->nullable();
            $table->boolean('kazino')->nullable();
            $table->boolean('kamina')->nullable();
            $table->boolean('kafe_mashina')->nullable();
            $table->boolean('kafene')->nullable();
            $table->boolean('klimatik')->nullable();
            $table->boolean('konna_baza')->nullable();
            $table->boolean('konferentna_zala')->nullable();
            $table->boolean('kuhnq')->nullable();
            $table->boolean('lekarski_kabinet')->nullable();
            $table->boolean('lobi_bar')->nullable();
            $table->boolean('mehana')->nullable();
            $table->boolean('mikrovulnova')->nullable();
            $table->boolean('mini_golf')->nullable();
            $table->boolean('mini_bar')->nullable();
            $table->boolean('naem_kolela')->nullable();
            $table->boolean('noshten_bar')->nullable();
            $table->boolean('noshten_klub')->nullable();
            $table->boolean('obmenno_buro')->nullable();
            $table->boolean('otoplenie')->nullable();
            $table->boolean('ohrana')->nullable();
            $table->boolean('peralnq')->nullable();
            $table->boolean('plashtane_s_karta')->nullable();
            $table->boolean('prane')->nullable();
            $table->boolean('radio')->nullable();
            $table->boolean('rent_a_car')->nullable();
            $table->boolean('rum_serviz')->nullable();
            $table->boolean('seif')->nullable();
            $table->boolean('seshoar')->nullable();
            $table->boolean('ski_garderob')->nullable();
            $table->boolean('snejen_djet')->nullable();
            $table->boolean('solarium')->nullable();
            $table->boolean('sudomiqlna')->nullable();
            $table->boolean('tv')->nullable();
            $table->boolean('telefon')->nullable();
            $table->boolean('tenis_kort')->nullable();
            $table->boolean('tenis_na_masa')->nullable();
            $table->boolean('terasa')->nullable();
            $table->boolean('salon_za_krasota')->nullable();
            $table->boolean('futbol')->nullable();
            $table->boolean('hazqiy')->nullable();
            $table->boolean('himichesko_chistene')->nullable();
            $table->boolean('hladilnik')->nullable();
            $table->boolean('utiq')->nullable();
            $table->timestamps();

            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotel_extras');
    }
}
