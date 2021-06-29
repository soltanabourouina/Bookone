<template>
<div class="filieres_metiers">
  <h3 class="subheading grey--text">Filieres Metiers</h3>
   
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
              <span class="headline">Ajouter une Filiere Métier</span>
          </v-card-title>
          <v-card-text>
              <v-container>
                  <v-row>
                      <v-col cols="12">
                          <v-text-field label="Libellé*" v-model="libelle" required>
                          </v-text-field>
                      </v-col>
                     
                          <v-col
                          class="d-flex"
                          cols="12"
                        >
                          <v-select
                            :items="categories"
                            label="Categorie Professionnel:"
                            Standard
                          ></v-select>
                        </v-col>

                        <v-col
                          class="d-flex"
                          cols="12"
                        >
                          <v-select
                            :items="departements"
                            label="Departement:"
                            Standard
                          ></v-select>
                        </v-col>
                     
                  </v-row>
              </v-container>
              <small>*indique qu'il faut remplir le champ</small>
          </v-card-text>
          <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="blue darken-1" text @click="dialogAdd = false">Close</v-btn>
              <v-btn color="blue darken-1" text @click="saveFilieresMetiers">Save</v-btn>
          </v-card-actions>
      </v-card>
  </v-dialog>

  <!--fin modal d'ajout-->
      <!-- Modal Update Product -->
                  
                        <v-dialog v-model="dialogEdit" persistent max-width="600px">
                            <v-card>
                                <v-card-title>
                                    <span class="headline">Modifier une Filiere Metier</span>
                                </v-card-title>
                                <v-card-text>
                                    <v-container>
                                        <v-row>
                                          <v-col cols="12">
                          <v-text-field label="Libellé*" v-model="libelle" required>
                          </v-text-field>
                      </v-col>
                         <v-col
                          class="d-flex"
                          cols="12"
                        >
                          <v-select
                            :items="categories"
                            label="Categorie Professionnel:"
                            Standard
                          ></v-select>
                        </v-col>

                        <v-col
                          class="d-flex"
                          cols="12"
                        >
                          <v-select
                            :items="departements"
                            label="Departement:"
                            Standard
                          ></v-select>
                        </v-col>
                                        </v-row>
                                    </v-container>
                                    <small>*indicates required field</small>
                                </v-card-text>
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn color="blue darken-1" text @click="dialogEdit = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="updateFilieresMetiers">Update</v-btn>
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
                   
 
    <v-data-table :headers="headers" :items="filieres_metiers" :search="search"  class="elevation-1">
      <template v-slot: item.actions="{ item }">
        <v-icon  small class="mr-2" @click="getEdit(item)"> mdi-pencil </v-icon>
        <v-icon small @click="deleteFilieresMetiers(item)" >mdi-delete</v-icon>
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
          { text: 'categories', value: 'categories' },
          {text: 'departements',value:'departements'},
          { text: 'Action', value:'actions' }
        ],
        name: '',
        description: '',
        price: '',
      
          dialogAdd: false,
        dialogEdit: false,
        dialogDelete: false,
        id: '',
        investigationsNameDelete: '',
        filieres_metiers:[],
      }
    },

    created: function () {
        this.getFilieresMetiers()
    },
   
      
  
 methods: {    
        // Get filieres_metiers
       getFilieresMetiers : function () {
            axios
            .get('http://localhost:8000/api/filieres_metier')
            .then((res) => {
                    this.filieres_metiers = res.data;
                     console.log(this.filieres_metiers);
                });
               
        },

    

  // Create New produit
        saveFilieresMetiers: function () {
            axios.post('http://localhost:8000/api/filieres_metier/', {
          
                   libelle: this.libelle,
                    categories: this.categories,
                    departements:this.departements,
                    
                })
                .then(res => {
                    // handle success
                    this.getFilieresMetiers();
                    this.libelle = '';
                    this.categories = '';
                    this.departements='';
                   
                    this.dialogAdd = false;
                    console.log(res);
                })
                
        },
 

 // Get Edit and Show data to Modal
        getEdit: function (item) {
            this.dialogEdit = true;
            this.id = item.id;
            this.libelle = item.libelle;
            this.categories = item.categories;
             this.departements=item.departements;
            console.log(this.id);
        },


        // Update produit
        updateFilieresMetiers: function () {
            axios.put(`http://localhost:8000/api/filieres_metier/` + this.id, {
                   libelle: this.libelle,
                    categories: this.categories,
                    departements:this.departements,
                })
                .then(res => {
                    // handle success
                    this.getFilieresMetiers();
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
        deleteFilieresMetiers: function (item) {
            if(confirm("vous voulez vraiment supprimer ce produit ?")){
                axios.delete(`http://localhost:8000/api/filieres_metier/`+item.id)
                .then(res => {
                    // handle success
                    this.getFilieresMetiers();
                    this.dialogDelete = false;
                    console.log(res);
                })
            }
        }
  }}
</script>
