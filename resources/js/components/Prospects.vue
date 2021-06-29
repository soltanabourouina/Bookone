<template>
  <v-container fluid>
      <h1 class="subheading grey--text">Contacts</h1>
    <v-data-iterator
      :items="items"
      :items-per-page.sync="itemsPerPage"
      :page.sync="page"
      :search="search"
      :sort-by="sortBy.toLowerCase()"
      :sort-desc="sortDesc"
      hide-default-footer
    >
      <template v-slot:header>
        <v-toolbar
          dark
          color="#3b3e66"
          class="mb-1"
        >
          <v-text-field
            v-model="search"
            clearable
            flat
            solo-inverted
            hide-details
            prepend-inner-icon="mdi-magnify"
            label="Search"
          ></v-text-field>
          <template v-if="$vuetify.breakpoint.mdAndUp">
            <v-spacer></v-spacer>
            <v-select
              v-model="sortBy"
              flat
              solo-inverted
              hide-details
              :items="keys"
              prepend-inner-icon="mdi-magnify"
              label="Sort by"
            ></v-select>
            <v-spacer></v-spacer>
          <!-- calling the submitting card -->
              <v-dialog v-model="dialogAdd" persistent max-width="900px">
                  <template v-slot:activator="{ on, attrs }">
                      <v-btn color="accent"
                                  elevation="2"
                                  outlined
                                  roundedcolor="#3b3e66" dark v-bind="attrs" v-on="on">
                          Ajouter un contact
                      </v-btn>
                  </template>
        
      <v-card>
          <v-card-title>
              <span class="headline">Ajouter un contact</span>
          </v-card-title>
          <v-card-text>
              <v-container>
                  <v-row>
                    <v-col cols="12">
                          <v-text-field label="Nom de l'entreprise*" v-model="nom_entreprise" required>
                          </v-text-field>
                      </v-col>
                      <v-col cols="12">
                          <v-text-field label="Nom*" v-model="nom" required>
                          </v-text-field>
                      </v-col>
                      <v-col cols="12">
                          <v-text-field label="Prénom*" v-model="prenom" required>
                          </v-text-field>
                      </v-col>
                       <v-col cols="12">
                          <v-text-field label="Titre*" v-model="titre" required>
                          </v-text-field>
                      </v-col>
                      <v-col cols="12">
                         <vue-tel-input-vuetify v-model="tel"></vue-tel-input-vuetify>
                      </v-col>
                      <v-col cols="12">
                          <v-text-field label="Email*" v-model="email" required>
                          </v-text-field>
                      </v-col>
                      <v-col cols="12">
                          <v-text-field label="Logo*" v-model="logo" required>
                          </v-text-field>
                      </v-col>
                      <v-col cols="12">
                          <v-text-field label="Linkedin*" v-model="linkedin" required>
                          </v-text-field>
                      </v-col>
                      <v-col cols="12">
                           <v-textarea
                          name="input-7-1"
                          label="Motif"
                          v-model="motif"
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








    <v-dialog v-model="dialogEdit" persistent max-width="600px">
                            <v-card>
                                <v-card-title>
                                    <span class="headline">Modifier le contact</span>
                                </v-card-title>
                                <v-card-text>
                                    <v-container>
                                        <v-row>
                                 
 <v-col cols="12">
                          <v-text-field label="Nom de l'entreprise*" v-model="nom_entreprise" required>
                          </v-text-field>
                      </v-col>
                      <v-col cols="12">
                          <v-text-field label="Nom*" v-model="nom" required>
                          </v-text-field>
                      </v-col>
                      <v-col cols="12">
                          <v-text-field label="Prénom*" v-model="prenom" required>
                          </v-text-field>
                      </v-col>
                       <v-col cols="12">
                          <v-text-field label="Titre*" v-model="titre" required>
                          </v-text-field>
                      </v-col>
                      <v-col cols="12">
                         <vue-tel-input-vuetify v-model="tel"></vue-tel-input-vuetify>
                      </v-col>
                      <v-col cols="12">
                          <v-text-field label="Email*" v-model="email" required>
                          </v-text-field>
                      </v-col>
                      <v-col cols="12">
                          <v-text-field label="Logo*" v-model="logo" required>
                          </v-text-field>

                          <!--v-file-input
                         accept="image/png, image/jpeg, image/bmp"
                          placeholder="Logo de l'entreprise"
                          prepend-icon="mdi-camera"
                          label="Logo"
                          v-model="logo"
                        ></v-file-input
                        URL: stac/k ///over/flow
                        https://stackoverflow.com/questions/57773556/file-upload-using-vuetify-2-v-file-input-and-axios
                        -->
                      </v-col>
                      <v-col cols="12">
                          <v-text-field label="Linkedin*" v-model="linkedin" required>
                          </v-text-field>
                      </v-col>
                      <v-col cols="12">
                           <v-textarea
                          name="input-7-1"
                          label="Motif"
                          v-model="motif"
                          hint="Hint text"
                        ></v-textarea>
                   </v-col>
                    </v-row>
                                </v-container>
                                <small>*indicates required field</small>
                            </v-card-text>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn color="blue darken-1" text @click="dialogEdit = false">Close</v-btn>
                                <v-btn color="blue darken-1" text @click="updatecontact">Update</v-btn>
                            </v-card-actions>
                            </v-card>
                        </v-dialog>





            <v-spacer></v-spacer>
            <v-btn-toggle
              v-model="sortDesc"
              mandatory
            >
              <v-btn
                large
                depressed
                color="blue"
                :value="false"
              >
                <v-icon>mdi-arrow-up</v-icon>
              </v-btn>
              <v-btn
                large
                depressed
                color="blue"
                :value="true"
              >
                <v-icon>mdi-arrow-down</v-icon>
              </v-btn>
            </v-btn-toggle>
          </template>
        </v-toolbar>
      </template>



      <template v-slot:default="props">
        <v-row>
          <v-col
            v-for="item in props.items"
            :key="item.id"
            cols="12"
            sm="6"
            md="4"
            lg="3"
          >
            <v-card>
              <v-card-title class="subheading font-weight-bold">
                <v-avatar size="50">
                  <img src="../assets/logo.png" alt= "" />
                    </v-avatar>
                {{ item.nom_entreprise }}

            <router-link :to="{ name: 'Motif_H', params: { contact_id: item.id } }">
              <v-icon color="primary"  fab  darkclass="mr-2">mdi-comment</v-icon >
              </router-link>

            <v-spacer></v-spacer>
            <v-spacer></v-spacer>
                        <v-icon   color="#3b3e66" class="mr-2" @click="getEdit(item)"> mdi-pencil </v-icon>
                        <v-icon  color="#3b3e66" @click="deleteinvestigations(item)" >mdi-delete</v-icon>
                 </v-card-title>

     
     
              <v-divider></v-divider>

              <v-list dense>
                <v-list-item
                  v-for="(key, index) in filteredKeys"
                  :key="index"
                >
                  <v-list-item-content :class="{ 'blue--text': sortBy === key }">
                    {{ key }}:
                  </v-list-item-content>
                  <v-list-item-content
                    class="align-end"
                    :class="{ 'blue--text': sortBy === key }"
                  >
                  
                    {{item[key.toLowerCase()]}}

    
                  </v-list-item-content>
                </v-list-item>
              </v-list>
            </v-card>
          </v-col>
        </v-row>

        
      </template>

      <template v-slot:footer>
        <v-row
          class="mt-2"
          align="center"
          justify="center"
        >
          <span class="grey--text">Contacts par page</span>
          <v-menu offset-y>
            <template v-slot:activator="{ on, attrs }">
              <v-btn
                dark
                text
                color="primary"
                class="ml-2"
                v-bind="attrs"
                v-on="on"
              >
                {{ itemsPerPage }}
                <v-icon>mdi-chevron-down</v-icon>
              </v-btn>
            </template>
            <v-list>
              <v-list-item
                v-for="(number, index) in itemsPerPageArray"
                :key="index"
                @click="updateItemsPerPage(number)"
              >
                <v-list-item-title>{{ number }}</v-list-item-title>
              </v-list-item>
            </v-list>
          </v-menu>

          <v-spacer></v-spacer>

          <span
            class="mr-4
            grey--text"
          >
            Page {{ page }} of {{ numberOfPages }}
          </span>
          <v-btn
            fab
            dark
            color="blue darken-3"
            class="mr-1"
            @click="formerPage"
          >
            <v-icon>mdi-chevron-left</v-icon>
          </v-btn>
          <v-btn
            fab
            dark
            color="blue darken-3"
            class="ml-1"
            @click="nextPage"
          >
            <v-icon>mdi-chevron-right</v-icon>
          </v-btn>
        </v-row>
        
      </template>
    </v-data-iterator>
  </v-container>
</template>


<script>
import axios from 'axios'
  export default {
    data () {
      return {

                active: true,
        itemsPerPageArray: [4, 8, 12],
        search: '',
        filter: {},
        sortDesc: false,
        page: 1,
        itemsPerPage: 4,
        sortBy: 'id',
         dialogAdd: false,
        dialogEdit: false,
        dialogDelete: false,
        id:'',
        nom_entreprise: '',
        nom:'',
        prenom:'',
        logo: '',
        titre:'',
        email:'',
         tel: '',
        linkedin:'',
        motif:'',
        prospectsId:10,
        keys: [
          
        'Nom de L\'Entreprise',
        'logo',
        'Nom',
        `Prénom`,
        'Titre',
        `Tel`,
        `Email`,
        `Linkedin`,
        `motif`
         
        ],
        items:[],
        headers: [
          { text: 'Nom de L\'Entreprise', value: 'nom_entreprise' },
          { text: 'logo', value: 'logo' },
           { text: 'Nom', value: 'nom' },
          { text: 'Prénom', value: 'prenom' },
           { text: 'Titre', value: 'titre' },
           { text: 'tel', value: 'tel' },
           { text: 'Email', value: 'email' },
            { text: 'linkedin', value: 'linkedin' },
           { text: 'Motif', value: 'motif' },
          { text: 'Action', value:'action' }
        ],

      }
    },
         

    computed: {
      numberOfPages () {
        return Math.ceil(this.items.length / this.itemsPerPage)
      },
      filteredKeys () {
        return this.keys.filter(key => key !== 'Nom de L\'Entreprise')
      },
    },


    created: function () {
        this.getContacts()
    },
    methods: {
         
        // Get niveaux_job
       getContacts : function () {
            axios
            .get('http://localhost:8000/api/contact')
            .then((res) => {
                    this.items = res.data;
                     console.log(this.items);
                });
               
        },
       

// Create New contact
        saveInvestigations: function () {
            axios
            .post('http://localhost:8000/api/contact/', {

                    nom_entreprise: this.nom_entreprise,
                    logo: this.logo,
                    nom: this.nom,
                    prenom: this.prenom,
                    titre: this.titre,
                    tel: this.tel,
                    email: this.email,
                    motif: this.motif,
                    linkedin: this.linkedin
                })
                .then(res => {
                    // handle success
                    this.getContacts();
                    this.nom_entreprise;
                    this.logo;
                    this.nom;
                    this.prenom;
                    this.titre;
                    this.tel;
                    this.email;
                    this.motif;
                    this.linkedin;
                   
                    this.dialogAdd = false;
                    console.log(res);

                })
                
        },
 

 // Get Edit and Show data to Modal
        getEdit: function (item) {
            this.dialogEdit = true;
            this.id = item.id;
            this.nom_entreprise = item.nom_entreprise;
                    this.logo = item.logo;                   
                    this.nom = item.nom;
                    this.prenom = item.prenom;
                    this.titre = item.titre;
                    this.tel = item.tel;
                    this.email = item.email;
                    this.motif = item.motif;
                    this.linkedin = item.linkedin;
             
            console.log(this.id);
        },


        // Update contact
        updatecontact: function () {
            axios.put(`http://localhost:8000/api/contact/` + this.id, {
                   nom_entreprise: this.nom_entreprise,
                    logo: this.logo,
                    nom: this.nom,
                    prenom: this.prenom,
                    titre: this.titre,
                    tel: this.tel,
                    email: this.email,
                    motif: this.motif,
                    linkedin: this.linkedin
                })
                .then(res => {
                    // handle success
                    this.getContacts();
                    this.dialogEdit = false;
                     console.log(res);
                })
                
        },



//Get Delete and Show Confirm Modal
 getDelete: function (item) {
 this.dialogDelete = true;
 this.id = item.id;
 // this.name = investigations.name;
  }, 
   // Delete investigations
        deleteinvestigations: function (item) {
            if(confirm("vous voulez vraiment supprimer ce contact ?")){
                axios.delete(`http://localhost:8000/api/contact/`+item.id)
                .then(res => {
                    // handle success
                    this.getContacts();
                    this.dialogDelete = false;
                    console.log(res);
                })
            }

        },

      nextPage () {
        if (this.page + 1 <= this.numberOfPages) this.page += 1
      },
      formerPage () {
        if (this.page - 1 >= 1) this.page -= 1
      },
      updateItemsPerPage (number) {
        this.itemsPerPage = number
      },
    },
  }
</script>