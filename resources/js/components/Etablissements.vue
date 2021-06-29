<template>
<div class="Etablissements">
  <h3 class="subheading grey--text">Etablissements</h3>
 <v-container class="my-5">
     
 <v-card>
 
    <v-card-title>
 <v-spacer></v-spacer>
      <v-text-field
        v-model="search"
        append-icon="mdi-magnify"
        label="Search"
        single-line
        hide-details
      ></v-text-field>

    </v-card-title>

      <v-dialog v-model="dialogAdd" persistent max-width="600px">
      <template v-slot:activator="{ on, attrs }">
          <v-btn color="#3b3e66" dark v-bind="attrs" v-on="on">
              +
          </v-btn>
      </template>
      <v-card>
          <v-card-title>
              <span class="headline">Ajouter un Etablissement </span>
          </v-card-title>
          <v-card-text>
              <v-container>
                  <v-row>
                      <v-col cols="12">
                          <v-text-field label="Libellé*" v-model="libelle" required>
                          </v-text-field>
                      </v-col>
                      <v-col cols="12">
                          <v-text-field label="code*" v-model="code" required>
                          </v-text-field>
                      </v-col>
                     
                  </v-row>
              </v-container>
              <small>*indique qu'il faut remplir le champ</small>
          </v-card-text>
          <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="blue darken-1" text @click="dialogAdd = false">Close</v-btn>
              <v-btn color="blue darken-1" text @click="saveEtablissements">Save</v-btn>
          </v-card-actions>
      </v-card>
  </v-dialog>

  <!--fin modal d'ajout-->
      <!-- Modal Update Product -->
                  
                        <v-dialog v-model="dialogEdit" persistent max-width="600px">
                            <v-card>
                                <v-card-title>
                                    <span class="headline">Mise à jour </span>
                                </v-card-title>
                                <v-card-text>
                                    <v-container>
                                        <v-row>
                                          <v-col cols="12">
                          <v-text-field label="Libellé*" v-model="libelle" required>
                          </v-text-field>
                      </v-col>
                      <v-col cols="12">
                          <v-text-field label="code*" v-model="code" required>
                          </v-text-field>
                      </v-col>
                                        </v-row>
                                    </v-container>
                                    <small>*indicates required field</small>
                                </v-card-text>
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn color="blue darken-1" text @click="dialogEdit = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="updateEtablissements">Update</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                 
 
                    <!-- Modal Delete Product -->
                  
                        <v-dialog v-model="dialogDelete" persistent max-width="600px">
                            <v-card>
                                <v-card-title>
                                    <span class="headline"></span>
                                </v-card-title>
                                <v-card-text>
                                    <v-container>
                                        <v-row>
                                            <h2>confirmer la suppression  {{ libelle }} ?</h2>
                                        </v-row>
                                    </v-container>
                                </v-card-text>
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn color="blue darken-1" text @click="dialogDelete = false">No</v-btn>
                                    <v-btn color="info darken-1" text @click="dialogDelete= false">Yes
                                    </v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                   
 
    <v-data-table :headers="headers" :items="etablissements" :search="search"  class="elevation-1">
      <template v-slot:[`item.actions`]="{ item }">
      <v-icon color="#3b3e66" class="mr-2" @click="getEdit(item)"> mdi-pencil </v-icon>
      <v-icon color="#3b3e66" @click="deleteEtablissements(item)">mdi-delete</v-icon>
      </template>
   </v-data-table>


  </v-card>
     </v-container>
</div>
</template>

<script>
 import axios from 'axios'

  export default {
    data() {
      return {
        search: '',
        headers: [
          {
            text: 'numero',
            align: 'start',
            sortable: false,
            value: 'id',
          },
          { text: 'libelle', value: 'libelle' },
          { text: 'code', value: 'code' },
          { text: 'Action', value:'actions' }
        ],
        libelle: '',
        code: '',
      
          dialogAdd: false,
        dialogEdit: false,
        dialogDelete: false,
        
        id: '',
      
        etablissements:[],
      }
    },

    created: function () {
        this.getEtablissements()
    },
   
      
  
 methods: {    
        // Get etablissements
       getEtablissements : function () {
            axios
            .get('http://localhost:8000/api/etablissement')
            .then((res) => {
                    this.etablissements = res.data;
                     console.log(this.etablissements);
                });
               
        },

    

  // Create New produit
        saveEtablissements: function () {
            axios.post('http://localhost:8000/api/etablissement/', {
          
                   libelle: this.libelle,
                    code: this.code,
                    
                })
                .then(res => {
                    // handle success
                    this.getEtablissements();
                    this.libelle = '';
                    this.code = '';
                  
                   
                    this.dialogAdd = false;
                    console.log(res);
                })
                
        },
 

 // Get Edit and Show data to Modal
        getEdit: function (item) {
            this.dialogEdit = true;
            this.id = item.id;
            this.libelle = item.libelle;
            this.code = item.code;
             
            console.log(this.id);
        },


        // Update produit
        updateEtablissements: function () {
            axios.put(`http://localhost:8000/api/etablissement/` + this.id, {
                   libelle: this.libelle,
                    code: this.code,
                })
                .then(res => {
                    // handle success
                    this.getEtablissements();
                    this.dialogEdit = false;
                     console.log(res);
                })
                
        },



//Get Delete and Show Confirm Modal
 getDelete: function (item) {
 this.dialogDelete = true;
 this.id = item.id;
  }, 
   // Delete investigations
        deleteEtablissements: function (item) {
            if(confirm("vous voulez vraiment supprimer ce produit ?")){
                axios.delete(`http://localhost:8000/api/etablissement/`+item.id)
                .then(res => {
                    // handle success
                    this.getEtablissements();
                    this.dialogDelete = false;
                    console.log(res);
                })
            }
        }
  }}
</script>
