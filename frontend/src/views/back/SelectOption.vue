<template>
  <v-container
    id="realestate_Option"
    fluid
    tag="section"
  >

  <base-material-card>
    <template v-slot:heading>
      <div class="display-2 font-weight-light">
        {{$t('realestate_option')}}
      </div>

      <div class="subtitle-1 font-weight-light">
        {{$t('realestate_option_sub')}}
      </div>
    </template>

  <v-row cols="12">
    <v-col cols="6" >
        <v-switch class="ma-2" :label="$t('pet')"               v-model="option.pet"></v-switch>
        <v-switch class="ma-2" :label="$t('internet')"          v-model="option.internet"></v-switch>
        <v-switch class="ma-2" :label="$t('snow_removal')"      v-model="option.snow_removal"></v-switch>
        <v-switch class="ma-2" :label="$t('laundry')"           v-model="option.laundry"></v-switch>
        <v-switch class="ma-2" :label="$t('dryer')"             v-model="option.dryer"></v-switch>
        <v-switch class="ma-2" :label="$t('heating')"           v-model="option.heation"></v-switch>
        <v-switch class="ma-2" :label="$t('cooling')"           v-model="option.cooling"></v-switch>
        <v-switch class="ma-2" :label="$t('refrigerator')"      v-model="option.refrigerator"></v-switch>
    </v-col>
    <v-col cols="6" >
        <v-switch class="ma-2" :label="$t('dishwasher')"        v-model="option.dishwasher"></v-switch>
        <v-switch class="ma-2" :label="$t('oven')"              v-model="option.oven"></v-switch>
        <v-switch class="ma-2" :label="$t('full_fumiture')"     v-model="option.full_fumiture"></v-switch>
        <v-switch class="ma-2" :label="$t('Amenities')"         v-model="option.Amenities"></v-switch>
        <v-switch class="ma-2" :label="$t('transit_friendly')"  v-model="option.transit_friendly"></v-switch>
        <v-switch class="ma-2" :label="$t('storage')"           v-model="option.storage"></v-switch>
        <v-switch class="ma-2" :label="$t('elevator')"          v-model="option.elevator"></v-switch>
        <v-text-field
                :label="$t('other')"
                class="purple-input"
                prepend-icon="mdi-comment-check"
                type="text"
                v-model="option.other"
              />
    </v-col>
    <v-col
        cols="12"
        class="text-right"
      >
        <v-btn
          color="success"
          class="mr-0"
          @click="update()"
        >
          {{$t('realestate_create')}}
        </v-btn>
      </v-col>
    </v-row>

  </base-material-card>



</v-container>
</template>

<script>

  export default {
    props:['uuid',],
    name:'realestate_Option',
    data () {
      return {
        user:{},
        option:{
          uuid:'',
          pet:false,
          internet:false,
          snow_removal:false,
          laundry:false,
          dryer:false,
          heating:false,
          cooling:false,
          refrigerator:false,
          dishwasher:false,
          oven:false,
          full_fumiture:false,
          Amenities:false,
          transit_friendly:false,
          storage:false,
          elevator:false,
          other:'', 
        }
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
      

      if (this.uuid != null)
      {
        const frm = new FormData()
        frm.append('uuid', this.uuid);
        frm.append('dealer_email', this.user.email);

        this.$http.post('/api/realestate_getOption', frm).then((response) => {
          
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
            this.option.pet = this.parseString(response.data.pet);
            this.option.internet = this.parseString(response.data.internet);
            this.option.snow_removal = this.parseString(response.data.snow_removal);
            this.option.laundry = this.parseString(response.data.laundry);
            this.option.dryer = this.parseString(response.data.dryer);
            this.option.heating = this.parseString(response.data.heating);
            this.option.cooling = this.parseString(response.data.cooling);
            this.option.refrigerator = this.parseString(response.data.refrigerator);
            this.option.dishwasher = this.parseString(response.data.dishwasher);
            this.option.oven = this.parseString(response.data.oven);
            this.option.full_fumiture = this.parseString(response.data.full_fumiture);
            this.option.Amenities = this.parseString(response.data.Amenities);
            this.option.transit_friendly = this.parseString(response.data.transit_friendly);
            this.option.storage = this.parseString(response.data.storage);
            this.option.elevator = this.parseString(response.data.elevator);
            this.option.other = response.data.other;


          }    
        }).catch(error => {
          console.log(error.response)
          if ( error.response == undefined)
            return;

           this.$swal.fire({
                icon: 'error',
                title: error.response.data.messages,              
            })
            return;
        });
      }

    },
    methods:{
      parseString(data) {
        if(data == null || data == 'null')
          return false;
        else if ( String(data) == 'true')
          return true;
        else
          return false;
      },
      update() {

        if ( this.uuid == null || this.uuid == "")
        {
           this.$swal.fire({
                icon: 'error',
                title: '매물을 먼저 등록해주세요',              
            })
          return;
        }

        const frm = new FormData()
        frm.append('uuid', this.uuid);
        frm.append('pet', this.option.pet);
        frm.append('internet', this.option.internet);
        frm.append('snow_removal', this.option.snow_removal);
        frm.append('laundry', this.option.laundry);
        frm.append('dryer', this.option.dryer);
        frm.append('heating', this.option.heating);
        frm.append('cooling', this.option.cooling);
        frm.append('refrigerator', this.option.refrigerator);
        frm.append('dishwasher', this.option.dishwasher);
        frm.append('oven', this.option.oven);
        frm.append('full_fumiture', this.option.full_fumiture);
        frm.append('Amenities', this.option.Amenities);
        frm.append('transit_friendly', this.option.transit_friendly);
        frm.append('storage', this.option.storage);
        frm.append('elevator', this.option.elevator);
        frm.append('other', this.option.other);
        frm.append('dealer_email', this.user.email);

        this.$http.post('/api/realestate_option', frm).then((response) => {

          if ( response.data.status == 'error')
          {
              this.$swal.fire({
                icon: 'error',
                title: response.data.messages,              
              })
          }
          else
          {
            this.$swal.fire({
              icon: 'success',
              title: this.$t('success_update'),
            });

            var uuid = response.data.realestate.uuid;
            alert(uuid)
            this.$store.commit('SET_UUID', uuid);

          }    
        }).catch(error => {
          console.log(error.response)
          if ( error.response == undefined)
            return;

           this.$swal.fire({
                icon: 'error',
                title: error.response.statusText,              
              })
         });

      }
    }
  }
  

</script>
