<template>
  <v-container
    id="CellPhone_Plan_list"
    fluid
    tag="section"
  >
    <base-v-component
      :heading="$t('CellPhone_Plan_title')"
      link="components/simple-tables"
    />

    <v-card>
    <v-card-title>
      <v-btn depressed class="mb-2" color="warning" fab dark>
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
      <v-btn depressed class="mb-2"  @click="additem()" color="warning" fab dark>
       <v-icon>{{"mdi-plus"}}</v-icon>
      </v-btn>
    </v-card-title>
    <v-data-table
      dense 
      :headers="headers"
      :items="cellphone"
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
    name: 'CellPhone_Plan_list',
    data () {
      return {
        search: '',
        loading: false,
        user:[],
        headers: [],
        cellphone_plan:[
          {
            uuid: '',
            public: '',
            subject: '',
            call_text: '',
            FormData: '',
            features: '',
            processing_fee:'',
            price: '',
            total_price: '',
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
            text: this.$t('CellPhone_Plan_uuid'),
            align: 'start',
            sortable: false,
            value: 'uuid',
          },
          { text: this.$t('CellPhone_Plan_public'), value: 'public' },
          { text: this.$t('CellPhone_Plan_subject'), value: 'subject' },
          { text: this.$t('CellPhone_Plan_call_text'), value: 'call_text' },
          { text: this.$t('CellPhone_Plan_Data'), value: 'Data' },
          { text: this.$t('CellPhone_Plan_features'), value: 'features' },
          { text: this.$t('CellPhone_Plan_processing_fee'), value: 'processing_fee' },
          { text: this.$t('CellPhone_Plan_price'), value: 'price' },
          { text: this.$t('CellPhone_Plan_totla_price'), value: 'total_price' },
          
          { text: 'Actions', value: 'actions', sortable: false },
        ]
      },
      getDataFromApi(){
        this.loading = true;
        
        this.$http.get('/api/getCellPhone_plan').then((response) => {
          
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
            this.cellphone = response.data;
            this.loading = false;
          }    
        }).catch(error => {
          console.log(error.response)
           this.$swal.fire({
                icon: 'error',
                title: this.$t(error.response.data.messages),              
            })
            this.loading = false;
            return;
        });
      },
      additem(){
        this.$router.replace('/page/CellPhone_Plan_create');
      },
      
      editItem (item) {
        console.log(item.uuid)

        this.$router.push({
          name: 'CellPhone_Plan_edit',
          params :{uuid: item.uuid} 
        });
      },

      deleteItem (item) {
        console.log(item)
         this.$swal.fire({
            icon: 'warning',
            title: this.$t('delete'),
            text : this.$t('delete_sub'),
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
        frm.append('uuid', uuid);
        
        this.$http.post('/api/cellPhone_Plan_delete', frm).then((response) => {
          
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
                title: this.$t(error.response.data.messages),              
            })
            this.loading = false;
            return;
        });
      },

      

    }
  }
</script>
