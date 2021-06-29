<template>
<div class="departement">
  <h3 class="subheading grey--text">departement</h3>
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
              <span class="headline">Ajouter un Departement </span>
          </v-card-title>
          <v-card-text>
              <v-container>
                  <v-row>
                      <v-col cols="12">
                          <v-text-field label="Libellé*" v-model="libelle" required>
                          </v-text-field>
                      </v-col>
                      <v-col cols="12">
                          <v-text-field label="Code*" v-model="code" required>
                          </v-text-field>
                      </v-col>
                          <v-col class="d-flex" cols="12">
                    
                        <v-select  @input="selectId($event)"
                        label="Etablissement" 
                        @change="changeItem"
                         return-object
                        :items="etablissements"
                            item-text="libelle" 
                            item-value="id" 
                           
                           >
                            </v-select>
                 
  <p>Selected ID: {{ selectedId }}</p>
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
                                    <span class="headline">Modifier le produit</span>
                                </v-card-title>
                                <v-card-text>
                                    <v-container>
                                        <v-row>
                                          <v-col cols="12">
                          <v-text-field label="Libellé*" v-model="libelle" required>
                          </v-text-field>
                      </v-col>
                       <v-col cols="12">
                          <v-text-field label="Code*" v-model="code" required>
                          </v-text-field>
                      </v-col>
                       <v-col class="d-flex" cols="12">
                        <v-select label="Etablissement" 
                        :items="etablissements"
                            item-text="libelle" 
                            item-value="id" >
                            </v-select>
                          </v-col> 
                          
                                        </v-row>
                                    </v-container>
                                    <small>*indicates required field</small>
                                </v-card-text>
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn color="blue darken-1" text @click="dialogEdit = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="updateEdepartement">Update</v-btn>
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
                   
 
    <v-data-table :headers="headers" :items="departement" :search="search"  class="elevation-1">
   <template v-slot:[`item.actions`]="{ item }">
      <v-icon color="#3b3e66" class="mr-2" @click="getEdit(item)"> mdi-pencil </v-icon>
      <v-icon color="#3b3e66" @click="deletedepartement(item)">mdi-delete</v-icon>
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
        libelle: '',
        code:'',
        etablissements_id: '',
      
          dialogAdd: false,
        dialogEdit: false,
        dialogDelete: false,
      
        id: '',
      
        departement:[],
       etablissements:[],
            selectedId: ''
      
      }
    },

    created: function () {
        this.getdepartement()
        this.getetablissements()
        },
   
      
  
 methods: {    
   
    selectId(e) {
      this.selectedId = e.id
    },

        // Get departement
       getdepartement : function () {
            axios
            .get('http://localhost:8000/api/departement')
            .then((res) => {
                    this.departement = res.data;
                     console.log(this.departement);
                });
               
        },
        //get data from etablissements & populate the select option
            getetablissements : function() {
                axios.get('http://localhost:8000/api/etablissement')
                    .then(res => {
                    console.log('hehre',res)
                    this.etablissements = [...res.data]
                    });
            },

      
  // Create New produit
        saveInvestigations: function () {
            axios.post('http://localhost:8000/api/departement/', {
          
                   libelle: this.libelle,
                   code: this.code,
                    etablissements_id: this.etablissements.id,
                })
                .then(res => {
                    // handle success
                    this.getdepartement();
                    this.libelle = '';
                    this.code='';
                    this.etablissements_id = '';
                  
                   
                    this.dialogAdd = false;
                    console.log('hhhhh',res,this.etablissements.id);

                })
                
        },
 

 // Get Edit and Show data to Modal
        getEdit: function (item) {
            this.dialogEdit = true;
            this.id = item.id;
            this.libelle = item.libelle;
            this.code=item.code;
            this.etablissements_id = item.etablissements.id;
             
            console.log(this.id);
        },


        // Update produit
        updateEdepartement: function () {
            axios.put(`http://localhost:8000/api/departement/` + this.id, {
                   libelle: this.libelle,
                   code: this.code,
                    etablissements_id: this.etablissements.id,

                })
                .then(res => {
                    // handle success
                    this.getdepartement();
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
        deletedepartement: function (item) {
            if(confirm("vous voulez vraiment supprimer ce produit ?")){
                axios.delete(`http://localhost:8000/api/departement/`+item.id)
                .then(res => {
                    // handle success
                    this.getdepartement();
                    this.dialogDelete = false;
                    console.log(res);
                })
            }
        }
  }}
</script>
