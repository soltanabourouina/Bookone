<template>
<div class="motif_h">
    <h1 class="subheading grey--text">Historique des contacts</h1>
 <v-container class="my-5">
     
 <v-card>
 
    <v-card-title>
 <v-spacer></v-spacer>
     

    </v-card-title>

      <v-dialog v-model="dialogAdd" persistent max-width="600px">
      <template v-slot:activator="{ on, attrs }">
          <v-btn color="primary" dark v-bind="attrs" v-on="on">
          Mise à Jour du Motif         
         </v-btn>
      </template>
      <v-card>
          <v-card-title>
              <span class="headline">Mise à Jour du Motif </span>
          </v-card-title>
          <v-card-text>
              <v-container>
                  <v-row> 
                 
                    <v-col cols="12" sm="6" md="4" >
                    <v-menu
                      v-model="menu"
                      :close-on-content-click="false"
                      :nudge-right="40"
                      transition="scale-transition"
                      offset-y
                      min-width="auto"
                    >
                    <template v-slot:activator="{ on, attrs }">
                      <v-text-field
                        v-model="date"
                        label="Date de la mise à jour:"
                        prepend-icon="mdi-calendar"
                        readonly
                        v-bind="attrs"
                        v-on="on"
                      ></v-text-field>
                    </template>
                    <v-date-picker
                      v-model="date"
                      @input="menu = false"
                    ></v-date-picker>
                  </v-menu>
                  </v-col>

                <v-col cols="12">
                    <v-textarea
                      name="input-7-1"
                      label="Motif"
                      v-model="content"
                      hint="Hint text"
                    ></v-textarea>
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
  
                 
<!--debut  modal modif-->

<v-dialog v-model="dialogEdit" persistent max-width="600px">
     <v-card>
          <v-card-title>
              <span class="headline">Modifier le Motif </span>
          </v-card-title>
          <v-card-text>
              <v-container>
                  <v-row> 
                 
                    <v-col cols="12" sm="6" md="4" >
                    <v-menu
                      v-model="menu"
                      :close-on-content-click="false"
                      :nudge-right="40"
                      transition="scale-transition"
                      offset-y
                      min-width="auto"
                    >
                    <template v-slot:activator="{ on, attrs }">
                      <v-text-field
                        v-model="date"
                        label="Date de la mise à jour:"
                        prepend-icon="mdi-calendar"
                        readonly
                        v-bind="attrs"
                        v-on="on"
                      ></v-text-field>
                    </template>
                    <v-date-picker
                      v-model="date"
                      @input="menu = false"
                    ></v-date-picker>
                  </v-menu>
                  </v-col>

                <v-col cols="12">
                    <v-textarea
                      name="input-7-1"
                      label="Motif"
                      v-model="content"
                      hint="Hint text"
                    ></v-textarea>
                </v-col>
                      

                  </v-row>
              </v-container>
              <small>*indique qu'il faut remplir le champ</small>
          </v-card-text>
          <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="blue darken-1" text @click="dialogEdit = false">Close</v-btn>
              <v-btn color="blue darken-1" text @click="updatMotifs">Save</v-btn>
          </v-card-actions>
      </v-card>
  </v-dialog>

                     <v-dialog v-model="dialogDelete" persistent max-width="600px">
                            <v-card>
                                <v-card-title>
                                    <span class="headline"></span>
                                </v-card-title>
                                <v-card-text>
                                    <v-container>
                                        <v-row>
                                            <h2>confirmer la suppression  {{ date }} ?</h2>
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

  <v-timeline >
    <v-timeline-item v-for="item in motifs" :key="item.id">
    
      <v-row>
          <v-col 
          >
            <v-card>
              <v-card-title class="subheading font-weight-bold">
                {{ item.date }}
                <v-spacer></v-spacer>
                     
                        <v-icon   color="#3b3e66" class="mr-2" @click="getEdit(item)"> mdi-pencil </v-icon>
                        <v-icon  color="#3b3e66" @click="DeleteMotifs(item)" >mdi-delete</v-icon>
               </v-card-title>
               <v-card-text>
                   {{item.content}}
               </v-card-text>
            </v-card>
          </v-col>
        </v-row>
   
    </v-timeline-item>
   
  </v-timeline>
              

  </v-card>
</v-container>
</div>
</template>

<script>
 import axios from 'axios'

  export default {
    data() {
   
      console.log('je viens de lid contact tel',this.$route.params.contact_id)
  
      return {
         date: new Date().toISOString().substr(0, 10),
         menu: false,
       
         dialogAdd: false,
         dialogEdit: false,
         dialogDelete: false,
               itemsPerPageArray: [4, 8, 12],
         page: 1,
        itemsPerPage: 4,
        filteredKeys: '',
        id: '',
        content:'',
       
        motifs:[],
        contacts_id : this.$route.params.contact_id,
      }
    },

    created: function () {
        this.getMotifs()
    },
   
 methods: {    
        // Get motifs of a specific contact
       getMotifs : function () {
            axios
            .get('http://localhost:8000/api/motif/'+ this.contacts_id)
            .then((res) => {
                    this.motifs = res.data;
                   
                     console.log(this.motifs);
                   
                });
                
        },
 
    

  // Create New produit
        saveInvestigations: function () {
            axios.post('http://localhost:8000/api/motif/', {
          
                    content: this.content,
                    date:this.date,
                    contacts_id: this.$route.params.contact_id
                })
                .then(res => {
                    // handle success
                    this.getMotifs();
                    this.date = '';
                    this.content = '';                   
                    this.dialogAdd = false;
                    console.log(res);
                })
                
        },
 

 // Get Edit and Show data to Modal
        getEdit: function (item) {
            this.dialogEdit = true;
            this.id = item.id;
            this.date = item.date;
            this.content = item.content;
            console.log(this.id);
        },


        // Update produit
        updatMotifs: function () {
            axios.put(`http://localhost:8000/api/motif/` + this.id, {
                   date: this.date,
                    content: this.content
                })
                .then(res => {
                    // handle success
                    this.getMotifs();
                    this.dialogEdit = false;
                     console.log(res);
                })
                
        },



//Get Delete and Show Confirm Modal
 getDelete: function (item) {
 this.dialogDelete = true;
 this.id = item.id;
 
  }, 
   // Delete motifs
        DeleteMotifs: function (item) {
            if(confirm("vous voulez vraiment supprimer ce motif ?")){
                axios.delete(`http://localhost:8000/api/motif/`+item.id)
                .then(res => {
                    // handle success
                    this.getMotifs();
                    this.dialogDelete = false;
                    console.log(res);
                })
            }
        }
  }}
</script>
