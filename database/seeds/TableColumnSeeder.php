<?php


use App\TableColumn;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableColumnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    }

    private static $undefinedColumn = [
        'undefined' => 'Non défini',
    ];

    private static $personnelColumns = [
        'matricule' => 'Matricule',
        'nom' => 'Nom',
        'prenom' => 'Prénom',
        'sexe' => 'Sexe',
        'date_de_naissance' => 'Date de Naissance',
        'date_anciennete' => 'Date Anciennete',
        'c_etab' => 'Code établissement',
        'l_etab' => 'Libellé établissement',
        'nature_contrat' => 'Nature de contrat',
		'type_contrat' => 'Type de contrat',
		'c_classification' => 'Code de classification',
		'l_classification' => 'Libellé de classification',
		'v_niveau_classification' => 'Niveau de classification',
		'coef' => 'Coefficient',
		'c_categorie_prof_resolue' => 'Code de catégorie socioprofessionelle',
		'l_categorie_prof_resolue' => 'Libellé de catégorie socioprofessionelle',
		'c_metier_resolu' => 'Code de metier',
		'l_metier_resolu' => 'Libellé de metier',
		'c_emploi' => 'Code d\'emploi',
		'l_emploi' => 'Libellé d\'emploi',
		'salaire_contractuel_prorate' => 'Salaire contractuel proraté',
		'salaire_contractuel_etp' => 'Salaire contractuel ETP',
		'salaire_contractuel_annuel_etp' => 'Salaire contractuel annuel ETP',
		'coef_horaire' => 'Coefficient horaire',
		'nbr_mois_salaire_de_base' => 'Nombre de mois pour le salaire de base',
		'salaire_annuel_de_base' => 'Salaire annuel de base',
		'mod_moi' => 'MOD / MOI',
		'niv_job' => 'Niveau job',
		'poste_supp' => 'Poste supprimé',
		'status' => 'Status',
    ];

    private static $payrollColumns = [
        'matricule' => 'Matricule',
        'nom' => 'Nom',
        'prenom' => 'Prénom',
        'codeRubrique' => 'Code Rubrique',
        'montantSalarial' => 'Montant salarial',
    ];

    private static $planPayeColumns = [
        'code_rubrique' => 'Code rubrique',
        'intitule_rubrique' => 'Intitulé Rubrique',
    ];

    public static function populate()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        TableColumn::truncate();
        foreach (TableColumnSeeder::$undefinedColumn as $key => $value) {
            TableColumn::create([
                'type' => 0,
                'name_bdd' => $key,
                'name_verbose' => $value,
            ]);
        }
        foreach (TableColumnSeeder::$personnelColumns as $key => $value) {
            TableColumn::create([
                'type' => 1,
                'name_bdd' => $key,
                'name_verbose' => $value,
            ]);
        }
        foreach (TableColumnSeeder::$payrollColumns as $key => $value) {
            TableColumn::create([
                'type' => 2,
                'name_bdd' => $key,
                'name_verbose' => $value,
            ]);
        }
        foreach (TableColumnSeeder::$planPayeColumns as $key => $value) {
            TableColumn::create([
                'type' => 3,
                'name_bdd' => $key,
                'name_verbose' => $value,
            ]);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
