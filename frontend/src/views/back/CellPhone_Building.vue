<template>
  <v-container
    id="CellPhone_Building"
    fluid
    tag="section"
  >

<base-material-card>
  <template v-slot:heading>
    <div class="display-2 font-weight-light">
      {{$t('CellPhone_building')}}
    </div>

    <div class="subtitle-1 font-weight-light">
      {{$t('CellPhone_building_sub')}}
    </div>
     
  </template>
    <v-form>
        <v-container class="py-0">
          <v-row>
            <v-col cols="12">
              <v-row justify="space-around">
                <v-radio-group v-model="building.public" row>
                    <v-radio
                      :rules="requiredRules"
                      required
                      v-for="type in public_types"
                      :key="type"
                      :label="type"
                      :value="type"
                      color="info"
                    ></v-radio>
                  </v-radio-group>
                </v-row>
            </v-col>

            <v-col cols="12">
              <v-row justify="space-around">
                <v-radio-group v-model="building.maker" row v-on:change="changeMakers()">
                    <v-radio
                      :rules="requiredRules"
                      required
                      v-for="type in makers"
                      :key="type"
                      :label="type"
                      :value="type"
                      color="info"
                      
                    ></v-radio>
                  </v-radio-group>
                </v-row>
            </v-col>
          
            
            <v-col cols="12" md="4">
              <v-select
                :items="device_all"
                :label="$t('CellPhone_device_name')"
                class="purple-input"
                v-model="building.device_name"
                prepend-icon="mdi-rename-box"
                
              ></v-select>
            </v-col>
            <v-col cols="12" md="4">
              <v-select
                :items="device_storage_all"
                :label="$t('CellPhone_device_storage')"
                v-model="building.device_storage"
                class="purple-input"
                prepend-icon="mdi-database"
                
                
              ></v-select>
            </v-col>
            <v-col cols="12" md="4">
              <v-select
                :items="color_all"
                :label="$t('CellPhone_color')"
                v-model="building.device_color"
                class="purple-input"
                prepend-icon="mdi-database"
                />
            </v-col>
           

            <v-col cols="12" md="3">
              <v-text-field
                :rules="requiredRules"
                required
                class="purple-input"
                :label="$t('CellPhone_item')"
                prepend-icon="mdi-comment-check"
                type="text"
                v-model="building.item"
              />
            </v-col>
             <!-- <v-col cols="12" md="3">
              <v-text-field
                :rules="requiredRules"
                required
                class="purple-input"
                :label="$t('CellPhone_srp')"
                prepend-icon="mdi-cash-usd"
                type="text"
                v-model="building.srp"
              />
            </v-col> -->

            <v-col cols="12" md="3">
              <v-text-field
                :rules="requiredRules"
                required
                class="purple-input"
                :label="$t('CellPhone_tier')"
                prepend-icon="mdi-comment-check"
                v-model="building.tier"
              />
            </v-col>

            <v-col cols="12" md="3">
              <v-text-field
                :rules="requiredRules"
                required
                class="purple-input"
                :label="$t('CellPhone_up_front_cost')"
                prepend-icon="mdi-cash-usd"
                type="text"
                v-model="building.up_front_cost"
              />
            </v-col>

            <v-col cols="12" md="3">
              <v-text-field
                :rules="requiredRules"
                required
                class="purple-input"
                :label="$t('CellPhone_agreement_credit')"
                prepend-icon="mdi-road-variant"
                type="text"
                v-model="building.agreement_credit"
                
              />
            </v-col>
            <v-col cols="12" md="4">
              <v-text-field
                :rules="requiredRules"
                required
                :label="$t('CellPhone_dro')"
                class="purple-input"
                prepend-icon="mdi-cash-usd"
                type="text"
                v-model="building.dro"
              />
            </v-col>
            <v-col cols="12" md="4">
              <v-text-field
                :rules="requiredRules"
                required
                :label="$t('CellPhone_monthly_discount')"
                class="purple-input"
                prepend-icon="mdi-cash-usd"
                type="text"
                v-model="building.monthly_discount"
              />
            </v-col>
            <v-col cols="12" md="4">
              <v-text-field
                :rules="requiredRules"
                required
                :label="$t('CellPhone_monthly_payment')"
                class="purple-input"
                prepend-icon="mdi-cash-usd"
                type="text"
                minlength ="6"
                maxlength="15"
                v-model="building.monthly_payment"
              />
            </v-col>
            <v-row cols="12">
              <v-col cols="6">
                <v-carousel cycle show-arrows-on-hover height="auto">
                  <v-carousel-item 
                    v-for="(slide, i) in preview" :key="i"
                    >
                      <v-row
                      class="fill-height"
                      align="center"
                      justify="center"
                      >
                      <v-img :src="getImagePath(slide)" 
                        spect-ratio="1"
                        class="grey lighten-2"
                        max-width="100%"
                        
                        />
                    </v-row>
                  
                  </v-carousel-item>
                </v-carousel>
              </v-col>

              <v-col cols="6">
                <v-file-input v-for="n in 5" :key="n"
                accept="image/png, image/jpeg, image/bmp"
                placeholder="Pick an image"
                prepend-icon="mdi-camera"
                show-size
                type="file"
                ref="image"
                v-model="images[n-1]"
                ></v-file-input>
              </v-col>
            </v-row>
            
            <v-col
              cols="12"
              class="text-right"
            >
              <v-btn
                color="success"
                class="mr-0"
                @click="create()"
              >
                {{$t('realestate_create')}}
              </v-btn>
              
            </v-col> 
          </v-row>
        </v-container>
      </v-form>
  </base-material-card>



</v-container>
</template>

<script>

  export default {
    props:['uuid',],
    name:'CellPhone_Building',
    data () {
      return {
       public_types:['public','private'],
       makers:['Apple','Samsung', 'LG', 'Huawei',],
       device_storage_all:['64GB','128GB','256GB','512GB',],
       device_all:[],
       color_all:['Grey','Silver','Blue','Orange','Black','Play Black','Edge + Grey', 'Fast Whilte', 'Play Blue', 'Hyper', 'Vision Brown',
                  'Green', 'LV', 'Navy', 'Orange', 'Red', 'White', 'Purple',],
       preview:[''],
       images:[],
       user:{},
       building: {
         public:'public',
         transaction:'',
         maker:'Apple',
         device_name:'',
         device_storage:'',
         device_color:'',
         item:'',
         //srp:'',
         tier:'',
         up_front_cost:'',
         //isc:'',
         agreement_credit:'',
         dro:'',
         monthly_discount:'',
         monthly_payment:'',
         image1:'',
         image2:'',
         image3:'',
         image4:'',
         image5:'',
         dealer_email:'',
       },
        requiredRules: [
          v => !!v || 'is required',
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

      //메이커 가져오기
      this.getDevice();

      // edit 
      if (this.uuid != '')
      {
        const frm = new FormData()
        frm.append('uuid', this.uuid);
        frm.append('dealer_email', this.user.email);

        this.$http.post('/api/cellPhone_getBuilding', frm).then((response) => {

          if ( response.data.status == 'error')
          {
             console.log(this.$t( response.data.messages))
              return;
          }
          else
          {
            this.building = response.data.cellphone;
            this.preview = response.data.preview;
          }    
        }).catch(error => {
          console.log(error.response)
           this.$swal.fire({
                icon: 'error',
                title: this.$t(error.response.data.messages),              
            })
            return;
        });
      }
    },
    methods:{
      create(){
        console.log(this.building)
        const frm = new FormData()
        frm.append('uuid', this.uuid);
        frm.append('public', this.building.public);
        frm.append('transaction', this.building.transaction);
        frm.append('maker', this.building.maker);
        frm.append('device_name', this.building.device_name);
        frm.append('device_storage', this.building.device_storage);
        frm.append('device_color', this.building.device_color);
        frm.append('item', this.building.item);
        frm.append('tier', this.building.tier);
        frm.append('up_front_cost', this.building.up_front_cost);
        frm.append('agreement_credit', this.building.agreement_credit);
        frm.append('dro', this.building.dro);
        frm.append('monthly_discount', this.building.monthly_discount);
        frm.append('monthly_payment', this.building.monthly_payment);
        frm.append('image0', this.images[0]);
        frm.append('image1', this.images[1]);
        frm.append('image2', this.images[2]);
        frm.append('image3', this.images[3]);
        frm.append('image4', this.images[4]);
        frm.append('dealer_email', this.user.email);
        

        this.$http.post('/api/cellPhone_create', frm).then((response) => {

          if ( response.data.status == 'error')
          {
              this.$swal.fire({
                icon: 'error',
                title: this.$t(response.data.messages),              
              })
          }
          else
          {
            this.$swal.fire({
              icon: 'success',
              title: this.$t('success_update'),
            });

            //부모전역 변수로 uuid 가지고있기
            var uuid = response.data.cellphone.uuid;
            this.$emit('child', uuid);        

            this.preview = response.data.data;

          }    
        }).catch(error => {
          console.log(error.response)
           this.$swal.fire({
                icon: 'error',
                title: error.response.statusText,              
              })
         });
      },
      getDevice(){

        const frm = new FormData()
        frm.append('maker', this.building.maker);

        this.$http.post('/api/getDevice', frm).then((response) => {
          console.log(response.data)
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
            this.device_all = response.data;
          }    
        }).catch(error => {
          console.log(error.response)
          this.$swal.fire({
                icon: 'error',
                title: this.$t(error.response.data.messages),              
            })
            return;
        });
        
      },
      getImagePath(file) {
        
        //db 에서 가져온값은 스트링이고 파일 입력한부분은 파일
        if ( file.constructor == String)
        {
          if ( file == '')
            return require('@/assets/noimage.png')
          else
            return file
        }
        else
        {
          
          if ( file == undefined)
            return require('@/assets/noimage.png')
          else
            return URL.createObjectURL(file)
        }
        
      },
      // getSeries(){
      //   const frm = new FormData()
      //   frm.append('maker', this.building.maker);

      //   this.$http.post('/api/getSeries', frm).then((response) => {
          
      //     if ( response.data.status == 'error')
      //     {
      //         this.$swal.fire({
      //           icon: 'error',
      //           title: this.$t( response.data.messages),              
      //         })
              
      //         return;
      //     }
      //     else
      //     {
      //       this.series_all = response.data;
      //     }    
      //   }).catch(error => {
      //     console.log(error.response)
      //     this.$swal.fire({
      //           icon: 'error',
      //           title: this.$t(error.response.data.messages),              
      //       })
      //       return;
      //   });
        
      // },
      changeMakers(){
        if ( this.building.maker != '')
        {
          this.getDevice();
        }
      }
    }
  }
  

</script>

