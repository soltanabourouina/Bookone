<template>
<div class="Niveaux_Job">
  <h3 class="subheading grey--text">Niveaux de Job</h3>
    
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

    <v-dialog v-model="dialogAdd" persistent max-width="800px">
      <template v-slot:activator="{ on, attrs }">
          <v-btn color="#3b3e66" dark v-bind="attrs" v-on="on">
              +
          </v-btn>
      </template>
      <v-card>
          <v-card-title>
              <span class="headline">Ajouter un Niveaux de Job </span>
          </v-card-title>
          <v-card-text>
              <v-container>
                  <v-row>
                         <v-col
                          class="d-flex"
                          cols="12"
                        >
                          <v-select
                            :items="items"
                            label="Niveau d'Orga"
                            Standard
                          ></v-select>
                        </v-col>

                      <v-col class="d-flex" cols="12">
                          <v-col cols="2">
                          <v-select :items="items" label="N°niveau-Job" Standard ></v-select>
                          </v-col>
                          <v-col cols="10">
                          <v-text-field label="Niveau Hierarchique*" v-model="niv_hierarchique" required> </v-text-field>
                          </v-col>

                        </v-col>
                      
                       <v-col cols="12">
                          <v-text-field label="Niveau de Poste*" v-model="niv_poste" required>
                          </v-text-field>
                      </v-col>
                       
                     
                  </v-row>
              </v-container>
              <small>*indique qu'il faut remplir le champ</small>
          </v-card-text>
          <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="blue darken-1" text @click="dialogAdd = false">Close</v-btn>
              <v-btn color="blue darken-1" text @click="saveInvestigations">Save</v-btn>
          </v-card-actions>
      </v-card>
  </v-dialog>

  <!--fin modal d'ajout-->
      <!-- Modal Update Product -->
                  
                        <v-dialog v-model="dialogEdit" persistent max-width="600px">
                            <v-card>
                                <v-card-title>
                                    <span class="headline">Modifier le niveau de Job</span>
                                </v-card-title>
                                <v-card-text>
                                    <v-container>
                                        <v-row>
                                          <v-col cols="12">
                          <v-text-field label="Libellé*" v-model="libelle" required>
                          </v-text-field>
                      </v-col>
                      <v-col cols="12">
                          <v-text-field label="etablissement*" v-model="etablissement" required>
                          </v-text-field>
                      </v-col>
                                        </v-row>
                                    </v-container>
                                    <small>*indicates required field</small>
                                </v-card-text>
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn color="blue darken-1" text @click="dialogEdit = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="updateInvestigations">Update</v-btn>
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
                                            <h2>confirmer la suppression  {{ name }} ?</h2>
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
                   
 
    <v-data-table :headers="headers" :items="niveaux_job" :search="search"  class="elevation-1">
      <template v-slot: item.actions="{ item }">
        <v-icon  small class="mr-2" @click="getEdit(item)"> mdi-pencil </v-icon>
        <v-icon small @click="deleteinvestigations(item)" >mdi-delete</v-icon>
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
          { text: 'etablissement', value: 'etablissement' },
          
          { text: 'Action', value:'actions' }
        ],
        name: '',
        description: '',
        price: '',
      
          dialogAdd: false,
        dialogEdit: false,
        dialogDelete: false,
        id: '',
        niveaux_job:[],
         items: ['1', '2', '3', '4'],
      }
    },

    created: function () {
        this.getProducts()
    },
   
      
  
 methods: {    
        // Get niveaux_job
       getProducts : function () {
            axios
            .get('http://localhost:8000/api/niveaux_job')
            .then((res) => {
                    this.niveaux_job = res.data;
                     console.log(this.niveaux_job);
                });
               
        },

    

  // Create New produit
        saveInvestigations: function () {
            axios.post('http://localhost:8000/api/niveaux_job/', {
          
                   libelle: this.libelle,
                    etablissement: this.etablissement,
                    
                })
                .then(res => {
                    // handle success
                    this.getProducts();
                    this.libelle = '';
                    this.etablissement = '';
                  
                   
                    this.dialogAdd = false;
                    console.log(res);
                })
                
        },
 

 // Get Edit and Show data to Modal
        getEdit: function (item) {
            this.dialogEdit = true;
            this.id = item.id;
            this.libelle = item.libelle;
            this.etablissement = item.etablissement;
             
            console.log(this.id);
        },


        // Update produit
        updateInvestigations: function () {
            axios.put(`http://localhost:8000/api/niveaux_job/` + this.id, {
                   libelle: this.libelle,
                    etablissement: this.etablissement,
                })
                .then(res => {
                    // handle success
                    this.getProducts();
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
        deleteinvestigations: function (item) {
            if(confirm("vous voulez vraiment supprimer ce produit ?")){
                axios.delete(`http://localhost:8000/api/niveaux_job/`+item.id)
                .then(res => {
                    // handle success
                    this.getProducts();
                    this.dialogDelete = false;
                    console.log(res);
                })
            }
        }
  }}
</script>
