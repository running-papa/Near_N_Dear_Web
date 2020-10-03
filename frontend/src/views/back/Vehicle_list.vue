<template>
  <v-container
    id="vehicle_list"
    fluid
    tag="section"
  >
    <base-v-component
      :heading="$t('Vehicle_title')"
      link="components/simple-tables"
    />

    <v-card>
    <v-card-title>
      <v-btn depressed class="mb-2" color="info" fab dark>
        <v-icon  size="32" >{{"mdi-clipboard-text"}}</v-icon>
      </v-btn>   
      <v-spacer></v-spacer>
      <v-text-field
        v-model="search"
        append-icon="mdi-magnify"
        label="Search"
        single-line
        hide-details
      ></v-text-field>
      <v-btn depressed class="mb-2"  @click="additem()" color="info" fab dark>
       <v-icon>{{"mdi-plus"}}</v-icon>
      </v-btn>
    </v-card-title>
    <v-data-table
      dense 
      :headers="headers"
      :items="vehicle"
      :search="search"
      :loading="loading"
       class="elevation-1"
    >
    <template v-slot:[`item.actions`]="{ item }">
      <v-icon
        small
        class="mr-2"
        @click="editItem(item)"
      >
        mdi-pencil
      </v-icon>
      <v-icon
        small
        @click="deleteItem(item)"
      >
        mdi-delete
      </v-icon>
    </template>
    </v-data-table>
    
  
  </v-card>
  </v-container>
</template>

<script>

  export default {
    name: 'Vehicle_list',
    data () {
      return {
        search: '',
        loading: false,
        user:[],
        headers: [],
        vehicle:[
          {
            uuid: '',
            public: '',
            type: '',
            maker: '',
            series: '',
            year: '',
            fuel: '',
            price: '',
            subject: '',
            view: '',
          },
        ],
      }
    },

    mounted() {
      this.user = JSON.parse(localStorage.getItem('user'))
      if(this.user == null) {
        this.$swal.fire({
            icon: 'error',
            title: this.$t('login_auth_error')             
        })
        this.$router.replace('/login');
      }

      //리스트 헤더 셋팅
      this.setHeaders()

      //매물데이터 가져오기
      this.getDataFromApi()

    },
    methods:{
      setHeaders(){
         this.headers =  [
          {
            text: this.$t('Vehicle_uuid'),
            align: 'start',
            sortable: false,
            value: 'uuid',
          },
          { text: this.$t('Vehicle_public'), value: 'public' },
          { text: this.$t('Vehicle_type'), value: 'type' },
          { text: this.$t('Vehicle_maker'), value: 'maker' },
          { text: this.$t('Vehicle_series'), value: 'series' },
          { text: this.$t('Vehicle_year'), value: 'year' },
          { text: this.$t('Vehicle_fuel'), value: 'fuel' },
          { text: this.$t('Vehicle_price'), value: 'price' },
          { text: this.$t('Vehicle_subject'), value: 'subject' },
          { text: this.$t('header_view'), value: 'view' },
          { text: 'Actions', value: 'actions', sortable: false },
        ]
      },
      getDataFromApi(){
        this.loading = true;
        const frm = new FormData()
        frm.append('dealer_email', this.user.email);

        this.$http.post('/api/getVehicle', frm).then((response) => {
          
          if ( response.data.status == 'error')
          {
              this.$swal.fire({
                icon: 'error',
                title: this.$t( response.data.messages),              
              })
              this.loading = false;
              return;
          }
          else
          {
            this.vehicle = response.data;
            this.loading = false;
          }    
        }).catch(error => {
          console.log(error.response)
           this.$swal.fire({
                icon: 'error',
                title: error.response.data.messages,              
            })
            this.loading = false;
            return;
        });
      },
      additem(){
        this.$router.replace('/page/Vehicle_create');
      },
      
      editItem (item) {
        console.log(item.uuid)

        this.$router.push({
          name: 'Vehicle_edit',
          params :{uuid: item.uuid} 
        });
      },

      deleteItem (item) {
        console.log(item)
         this.$swal.fire({
            icon: 'warning',
            title: this.$t('delete_realestate'),
            text : this.$t('delete_realestate_sub'),
            showCancelButton : true,
            confirmButtonClass : "btn-danger",
            confirmButtonText : this.$t('confirmButtonText'),
            cancelButtonText : this.$t('cancelButtonText'),
            closeOnConfirm : true,
            closeOnCancel : false
          }).then((result) => { // <--
              if (result.value) { // <-- if confirmed
                this.confirmDelete(item.uuid)
              }
          });
      },
      confirmDelete(uuid){

        const frm = new FormData()
        frm.append('dealer_email', this.user.email);
        frm.append('uuid', uuid);

        
        this.$http.post('/api/vehicle_delete', frm).then((response) => {
          
          if ( response.data.status == 'error')
          {
              this.$swal.fire({
                icon: 'error',
                title: this.$t( response.data.messages),              
              })
              return;
          }
          else
          {
              this.$swal.fire({
                icon: 'success',
                title: this.$t( response.data.messages),              
              })

              //매물데이터 가져오기
              this.getDataFromApi()
              return;
          }    
        }).catch(error => {
          console.log(error.response)
           this.$swal.fire({
                icon: 'error',
                title: error.response.data.messages,              
            })
            this.loading = false;
            return;
        });
      },

      

    }
  }
</script>
