<template>
  <v-container>
    <v-card>
      <v-tabs v-model="tab" background-color="#f4f5fd" color="#3b3e66" border-radius= "0.65rem 0.65rem 0 0"  >
        <v-tab v-for="item in items" :key="item.tab">
          {{ item.tab }}
        </v-tab>
      </v-tabs>
      <v-tabs-items v-model="tab">
        <v-tab-item v-for="item in items" :key="item.tab">
          <v-card flat>
            <v-card-text>
              <component v-bind:is="item.content"></component>
            </v-card-text>
          </v-card>
        </v-tab-item>
      </v-tabs-items>
    </v-card>


     <v-card>
      <v-tabs v-model="tab2" background-color="#f4f5fd" color="#3b3e66" border-radius= "0.65rem 0.65rem 0 0"  >
        <v-tab v-for="item in parametres" :key="item.tab2">
          {{ item.tab2 }}
        </v-tab>
      </v-tabs>
      <v-tabs-items v-model="tab2">
        <v-tab-item v-for="item in parametres" :key="item.tab2">
          <v-card flat>
            <v-card-text>
              <component v-bind:is="item.content"></component>
            </v-card-text>
          </v-card>
        </v-tab-item>
      </v-tabs-items>
    </v-card>


     <v-card>
      <v-tabs v-model="tab3" background-color="#f4f5fd" color="#3b3e66" border-radius= "0.65rem 0.65rem 0 0"  >
        <v-tab v-for="item in others" :key="item.tab3">
          {{ item.tab3 }}
        </v-tab>
      </v-tabs>
      <v-tabs-items v-model="tab3">
        <v-tab-item v-for="item in others" :key="item.tab3">
          <v-card flat>
            <v-card-text>
              <component v-bind:is="item.content"></component>
            </v-card-text>
          </v-card>
        </v-tab-item>
      </v-tabs-items>
    </v-card>

     <v-card>
      <v-tabs v-model="tab4" background-color="#f4f5fd" color="#3b3e66" border-radius= "0.65rem 0.65rem 0 0"  >
        <v-tab v-for="item in points" :key="item.tab4">
          {{ item.tab4 }}
        </v-tab>
      </v-tabs>
      <v-tabs-items v-model="tab4">
        <v-tab-item v-for="item in points" :key="item.tab4">
          <v-card flat>
            <v-card-text>
              <component v-bind:is="item.content"></component>
            </v-card-text>
          </v-card>
        </v-tab-item>
      </v-tabs-items>
    </v-card>
  </v-container>
</template>


<script>
import Etablissements from './components/Etablissements.vue';

import Departements from './components/Departements.vue';

import Niveaux_Orga from './components/Niveaux_Orga.vue';

import Niveaux_Job from './components/Niveaux_Job.vue';

import Categoriesprofs from './components/Categoriesprofs.vue';

import Typescontrats from './components/Typescontrats.vue';

import Moi_mod from './components/Moi_mod.vue';

import FilieresMetiers from './components/FilieresMetiers.vue';

import Sousfilieres from './components/Sousfilieres.vue';

import Metiers from './components/Metier.vue';

import jobs from './components/jobs.vue';

import Codepcs from './components/Codepcs.vue';

import Nineboxs from './components/nineboxs.vue';

import langues from './components/langues.vue';

import chargesfamille from './components/chargesfamille.vue';

import diplomes from './components/diplomes.vue';

import handicapes from './components/handicapes.vue';

import conges from './components/conges.vue';
    
    

export default {
  components: {
    Etablissements,
    Departements,
    Niveaux_Orga,
    Niveaux_Job,

    Categoriesprofs,
    Typescontrats,
    Moi_mod,
    FilieresMetiers,
    Sousfilieres,
    Metiers,
    jobs,
    Codepcs,
    Nineboxs,

    langues,
    chargesfamille,
    diplomes,
    handicapes,
    conges,

  },
  data() {
    return {
      tab: null,
      tab2: null,
      tab3:null,
      tab4:null,
      items: [
        { tab: 'Etablissements', content: 'Etablissements'},
        { tab: 'Departements', content: 'Departements' },
        { tab: 'Niveaux d\'Orga', content: 'Niveaux_Orga' },
        { tab: 'Niveaux de Job', content: 'Niveaux_Job' },
        
      ],
      parametres:[
        { tab2: 'Categories Professionnels', content: 'Categoriesprofs'}  ,
         { tab2: 'Filieres Metiers', content: 'FilieresMetiers'},
          { tab2: 'Sous Filieres Metiers', content: 'Sousfilieres'},
           { tab2: 'Metiers', content: 'Metiers'},
            { tab2: 'jobs', content: 'jobs'},
      ],

      others:[
           { tab3: 'Types de Contrats', content: 'Typescontrats'},     
           { tab3: 'MOI / MOD', content: 'Moi_mod'},
           { tab3: 'Code PCS', content: 'Codepcs'},
           { tab3: 'NineBox', content: 'Nineboxs'} 
      ],
       points:[
           { tab4: 'Diplomes', content: 'diplomes'},     
           { tab4: 'Chargé de Famille', content: 'chargesfamille'},
           { tab4: 'Handicapes', content: 'handicapes'},
           { tab4: 'Conges', content: 'conges'},
           { tab4: 'Langues', content: 'langues'} 
      ]

    };
  }
};
</script>
