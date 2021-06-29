<template>
<div class="langues">
  <h1 class="subheading grey--text">Langues</h1>
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

    <!--Modal pour l'ajout d'une enquete -->
      <v-dialog v-model="dialogAdd" persistent max-width="600px">
      <template v-slot:activator="{ on, attrs }">
          <v-btn color="primary" dark v-bind="attrs" v-on="on">
              Nouvelle Langue
          </v-btn>
      </template>
      <v-card>
          <v-card-title>
              <span class="headline">Ajouter une Langue </span>
          </v-card-title>
          <v-card-text>
              <v-container>
                  <v-row>
                      <v-col cols="12">
                          <v-text-field label="Type Congé*" v-model="libelle" required>
                          </v-text-field>
                      </v-col>
                    
                  </v-row>
              </v-container>
              <small>*indique qu'il faut remplir le champ</small>
          </v-card-text>
          <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="blue darken-1" text @click="dialogAdd = false">Close</v-btn>
              <v-btn color="blue darken-1" text @click="savelangues">Save</v-btn>
          </v-card-actions>
      </v-card>
  </v-dialog>

  <!--fin modal d'ajout-->
      <!-- Modal Update Product -->
                  
                        <v-dialog v-model="dialogEdit" persistent max-width="600px">
                            <v-card>
                                <v-card-title>
                                    <span class="headline">Modifier le Libellé de la langue</span>
                                </v-card-title>
                                <v-card-text>
                                    <v-container>
                                        <v-row>
                                          <v-col cols="12">
                          <v-text-field label="Congé*" v-model="libelle" required>
                          </v-text-field>
                      </v-col>
                     
                                        </v-row>
                                    </v-container>
                                    <small>*indicates required field</small>
                                </v-card-text>
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn color="blue darken-1" text @click="dialogEdit = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="updatelangues">Update</v-btn>
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
                                            <h2>confirmer la suppression de la langue: {{ libelle }} ?</h2>
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
                   
 
    

  <v-data-table :headers="headers" :items="langues" :search="search"  class="elevation-1">
      <template v-slot:[`item.actions`]="{ item }">
      <v-icon color="#3b3e66" class="mr-2" @click="getEdit(item)"> mdi-pencil </v-icon>
      <v-icon color="#3b3e66" @click="deletelangues(item)">mdi-delete</v-icon>
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
          { text: 'Type Congé', value: 'libelle' },
           { text: 'Action', value:'actions' }
        ],
        libelle: '',
       
      
          dialogAdd: false,
        dialogEdit: false,
        dialogDelete: false,
        
        id: '',
        langues:[],
      }
    },
    created: function () {
        this.getlangues()
    },
   
      
  
 methods: {    
        // Get langues
       getlangues : function () {
            axios
            .get('http://localhost:8000/api/langue')
            .then((res) => {
                    this.langues = res.data;
                     console.log(this.langues);
                });
               
        },
    
  // Create New produit
        savelangues: function () {
            axios.post('http://localhost:8000/api/langue/', {
          
                   libelle: this.libelle
                  
                })
                .then(res => {
                    // handle success
                    this.getlangues();
                    this.libelle = '';
                    
                   
                    this.dialogAdd = false;
                    console.log(res);
                })
                
        },
 
 // Get Edit and Show data to Modal
        getEdit: function (item) {
            this.dialogEdit = true;
            this.id = item.id;
            this.libelle = item.libelle;
             
            console.log(this.id);
        },
        // Update produit
        updatelangues: function () {
            axios.put(`http://localhost:8000/api/langue/` + this.id, {
                   libelle: this.libelle,
                   
                })
                .then(res => {
                    // handle success
                    this.getlangues();
                    this.dialogEdit = false;
                     console.log(res);
                })
                
        },
//Get Delete and Show Confirm Modal
 getDelete: function (item) {
 this.dialogDelete = true;
 this.id = item.id;
  }, 
        deletelangues: function (item) {
            if(confirm("vous voulez vraiment supprimer ce type de congé?")){
                axios.delete(`http://localhost:8000/api/langue/`+item.id)
                .then(res => {
                    // handle success
                    this.getlangues();
                    this.dialogDelete = false;
                    console.log(res);
                })
            }
        }
  }}
</script>