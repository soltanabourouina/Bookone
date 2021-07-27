<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnelFileRowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnel_file_rows', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->integer('month');
            $table->string('matricule');
            $table->string('nom');
            $table->string('prenom')->nullable();
            $table->integer('sexe');
            $table->date('date_de_naissance');
            $table->date('date_anciennete');
            $table->string('c_etab')->nullable();
            $table->string('l_etab')->nullable();
            $table->string('nature_contrat')->nullable();
            $table->string('type_contrat');
            $table->string('c_classification')->nullable();
            $table->string('l_classification')->nullable();
            $table->string('v_niveau_classification')->nullable();
            $table->integer('coef');
            $table->string('c_categorie_prof_resolue');
            $table->string('l_categorie_prof_resolue');
            $table->string('c_metier_resolu')->nullable();
            $table->string('l_metier_resolu')->nullable();
            $table->string('c_emploi')->nullable();
            $table->string('l_emploi')->nullable();
            $table->bigInteger('salaire_contractuel_prorate')->nullable();
            $table->bigInteger('salaire_contractuel_etp')->nullable();
            $table->bigInteger('salaire_contractuel_annuel_etp')->nullable();
            $table->float('coef_horaire')->nullable();
            $table->integer('nbr_mois_salaire_de_base');
            $table->bigInteger('salaire_annuel_de_base');
            $table->string('mod_moi')->nullable();
            $table->integer('niv_job')->nullable();
            $table->string('poste_supp')->nullable();
            $table->string('status')->nullable();
            $table->unsignedBigInteger('transaction_id');
            $table->foreign('transaction_id', 'people_transaction_id')->references('id')->on('transactions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personnel_file_rows');
    }
}
