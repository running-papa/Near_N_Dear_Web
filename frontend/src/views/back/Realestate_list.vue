<template>
  <v-container
    id="Realestate_list"
    fluid
    tag="section"
  >
    <base-v-component
      :heading="$t('Realestate_title')"
      link="components/simple-tables"
    />

    <v-card>
    <v-card-title>
      <v-btn depressed class="mb-2" color="success" fab dark>
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
      <v-btn depressed class="mb-2"  @click="additem()" color="success" fab dark>
       <v-icon>{{"mdi-plus"}}</v-icon>
      </v-btn>
    </v-card-title>
    <v-data-table
      dense 
      :headers="headers"
      :items="realestate"
      :search="search"
      :loading="loading"
       class="elevation-1"
      @click:row="rowClick"
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
  
  <mobile v-on:closemodal="closemodal" :mobile_type="mobile_type" :uuid="uuid" :mobile_view="mobile_view"></mobile>      
  

  </v-container>
</template>

<script>
import mobile from './mobile_view'

  export default {
    name: 'Realestate_list',
    data () {
      return {
        uuid:'',
        mobile_type:'realestate',
        mobile_view:false,

        search: '',
        realestate:[], //현재페이지 매물
        loading: false,
        user:[],

        headers: [
          {
            text: '매물번호',
            align: 'start',
            sortable: false,
            value: 'uuid',
            
          },
          { text: '공개', value: 'public' },
          { text: '매매타입', value: 'price_type' },
          { text: '가격', value: 'price' },
          { text: '제목', value: 'subject' },
          { text: '도로번호', value: 'street_number' },
          { text: '도로이름', value: 'street_name' },
          { text: '도시', value: 'city' },
          { text: '주', value: 'province' },
          { text: '나라', value: 'country' },
          { text: '조회수', value: 'view' },
          { text: 'Actions', value: 'actions', sortable: false },
        ],
        realestate: [
          {
            uuid: '',
            public: '',
            price_type: '',
            price: '',
            subject: '',
            street_number: '',
            street_name: '',
            city: '',
            province: '',
            country: '',
            view: '',
          },
          
        ],
      }
    },
    components:{
      mobile
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
            text: this.$t('header_uuid'),
            align: 'start',
            sortable: false,
            value: 'uuid',
          },
          { text: this.$t('header_public'), value: 'public' },
          { text: this.$t('header_price_type'), value: 'price_type' },
          { text: this.$t('header_price'), value: 'price' },
          { text: this.$t('header_subject'), value: 'subject' },
          { text: this.$t('header_street_number'), value: 'street_number' },
          { text: this.$t('header_street_name'), value: 'street_name' },
          { text: this.$t('header_city'), value: 'city' },
          { text: this.$t('header_province'), value: 'province' },
          { text: this.$t('header_country'), value: 'country' },
          { text: this.$t('header_view'), value: 'view' },
          { text: 'Actions', value: 'actions', sortable: false },
        ]
      },
      getDataFromApi(){
        this.loading = true;
        const frm = new FormData()
        frm.append('dealer_email', this.user.email);

        this.$http.post('/api/auth/getRealestate', frm).then((response) => {
          
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
            this.realestate = response.data;
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
        this.$router.replace('/page/Realestate_create');
      },
      
      editItem (item) {
        console.log(item.uuid)

        this.$router.push({
          name: 'Realestate_edit',
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
        frm.append('dealer_email', this.user.email);
        frm.append('uuid', uuid);

        
        this.$http.post('/api/realestate_delete', frm).then((response) => {
          
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
      rowClick(value) {
        this.uuid = value.uuid;
        this.mobile_view = true;
      },
      closemodal(){
        this.mobile_view = false;
        this.uuid = '';
      },

      

    }
  }
</script>
