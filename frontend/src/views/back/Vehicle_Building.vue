<template>
  <v-container
    id="Vehicle_Building"
    fluid
    tag="section"
  >

<base-material-card>
  <template v-slot:heading>
    <div class="display-2 font-weight-light">
      {{$t('Vehicle_building')}}
    </div>

    <div class="subtitle-1 font-weight-light">
      {{$t('Vehicle_building_sub')}}
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
                <v-radio-group v-model="building.type" row>
                    <v-radio
                      :rules="requiredRules"
                      required
                      v-for="type in types"
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
                :rules="requiredRules"
                :items="makers"
                :label="$t('Vehicle_maker')"
                v-model="building.maker"
                class="purple-input"
                prepend-icon="mdi-office-building"
                v-on:change="changeMakers()"
                
              ></v-select>
            </v-col>
            <v-col cols="12" md="4">
              <v-select
                :rules="requiredRules"
                :items="series"
                :label="$t('Vehicle_series')"
                class="purple-input"
                v-model="building.series"
                prepend-icon="mdi-rename-box"
                
              ></v-select>
            </v-col>
            <v-col cols="12" md="4">
              <v-text-field
                :rules="requiredRules"
                required
                class="purple-input"
                :label="$t('Vehicle_trim')"
                prepend-icon="mdi-chart-line-variant"
                type="text"
                v-model="building.trim"
              />
            </v-col>
           

            <v-col cols="12" md="8">
              <v-text-field
                :rules="requiredRules"
                required
                class="purple-input"
                :label="$t('subject')"
                prepend-icon="mdi-comment-check"
                type="text"
                v-model="building.subject"
              />
            </v-col>
             <v-col cols="12" md="4 ">
              <v-text-field
                :rules="requiredRules"
                required
                class="purple-input"
                :label="$t('price')"
                prepend-icon="mdi-cash-usd"
                type="text"
                v-model="building.price"
              />
            </v-col>

            <v-col cols="12">
              <v-textarea
                :rules="requiredRules"
                required
                class="purple-input"
                :label="$t('description')"
                :placeholder="$t('description')"
                prepend-icon="mdi-comment-check"
                v-model="building.description"
              />
            </v-col>

            <v-col cols="12" md="4">
              <v-text-field
                :rules="requiredRules"
                required
                class="purple-input"
                :label="$t('Vehicle_year')"
                prepend-icon="mdi-calendar"
                type="text"
                v-model="building.year"
              />
            </v-col>

            <v-col cols="12" md="4">
              <v-text-field
                :rules="requiredRules"
                required
                class="purple-input"
                :label="$t('Vehicle_mileage')"
                prepend-icon="mdi-road-variant"
                type="text"
                v-model="building.mileage"
                
              />
            </v-col>
            <v-col cols="12" md="4">
              <v-text-field
                :rules="requiredRules"
                required
                :label="$t('Vehicle_fuel')"
                class="purple-input"
                prepend-icon="mdi-fuel"
                type="text"
                v-model="building.fuel"
              />
            </v-col>
            <v-col cols="12" md="4">
              <v-text-field
                :rules="requiredRules"
                required
                :label="$t('Vehicle_number')"
                class="purple-input"
                prepend-icon="mdi-numeric"
                type="text"
                minlength ="6"
                maxlength="15"
                v-model="building.number"
              />
            </v-col>

            <v-col cols="12" md="4">
              <v-text-field
                :rules="requiredRules"
                required
                :label="$t('Vehicle_postal_code')"
                class="purple-input"
                prepend-icon="mdi-home-map-marker"
                type="text"
                minlength ="6"
                maxlength="15"
                v-model="building.postal_code"
              />
            </v-col>
            <v-col cols="12" md="4">
              <v-text-field
                :rules="requiredRules"
                required
                :label="$t('Vehicle_accident_status')"
                class="purple-input"
                prepend-icon="mdi-hospital"
                type="text"
                v-model="building.accident_status"
              />
            </v-col>
            <v-col cols="12">
              <v-textarea
                :rules="requiredRules"
                required
                class="purple-input"
                :label="$t('Vehicle_accident_details')"
                :placeholder="$t('Vehicle_accident_details')"
                prepend-icon="mdi-hospital"
                v-model="building.accident_details"
              />
            </v-col>
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
    name:'Vehicle_Building',
    data () {
      return {
       public_types:['public','private'],
       types:['SEDAN','SUV', 'HATCHBACK', 'MINIVAN','WAGON','TRUCK','CONVERTIBLE','ELECTRIC'],
       makers:[],
       series:[],
       user:{},
       building: {
         public:'',
         transaction:'',
         maker:'',
         series:'',
         trim:'',
         type:'',
         year:'',
         fuel:'',
         price:'',
         mileage:'',
         accident_status:'',
         accident_details:'',
         number:'',
         subject:'',
         description:'',
         view:'',
         postal_code:'',
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
      this.getMaker();
      
      

      // 저장된값 
      console.log(this.uuid)
      if (this.uuid != null || this.uuid != '')
      {
        const frm = new FormData()
        frm.append('uuid', this.uuid);
        frm.append('dealer_email', this.user.email);

        this.$http.post('/api/vehicle_getBuilding', frm).then((response) => {
          
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
            this.building = response.data;
          }    
        }).catch(error => {
          console.log(error.response)
           this.$swal.fire({
                icon: 'error',
                title: error.response.data.messages,              
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
        frm.append('series', this.building.series);
        frm.append('trim', this.building.trim);
        frm.append('type', this.building.type);
        frm.append('year', this.building.year);
        frm.append('fuel', this.building.fuel);
        frm.append('price', this.building.price);
        frm.append('mileage', this.building.mileage);
        frm.append('accident_status', this.building.accident_status);
        frm.append('accident_details', this.building.accident_details);
        frm.append('number', this.building.number);
        frm.append('subject', this.building.subject);
        frm.append('description', this.building.description);
        frm.append('view', this.building.view);
        frm.append('postal_code', this.building.postal_code);
        frm.append('dealer_email', this.user.email);
        

        this.$http.post('/api/vehicle_create', frm).then((response) => {

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

            //부모전역 변수로 uuid 가지고있기
            var uuid = response.data.vehicle.uuid;
            this.$emit('child', uuid);        

          }    
        }).catch(error => {
          console.log(error.response)
           this.$swal.fire({
                icon: 'error',
                title: error.response.statusText,              
              })
         });
      },
      getMaker(){
        //신규
        if (this.uuid != null || this.uuid != '')
        {
          
          this.$http.get('/api/getMaker').then((response) => {
            
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
              this.makers = response.data;
            }    
          }).catch(error => {
            console.log(error.response)
            this.$swal.fire({
                  icon: 'error',
                  title: error.response.data.messages,              
              })
              return;
          });
        }
      },
      changeMakers(){
        
        if (this.building.maker != null || this.this.building.maker != '')
        {
           const frm = new FormData()
          frm.append('maker', this.building.maker);

          this.$http.post('/api/getSeries', frm).then((response) => {
            
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
              this.series = response.data;
            }    
          }).catch(error => {
            console.log(error.response)
            this.$swal.fire({
                  icon: 'error',
                  title: error.response.data.messages,              
              })
              return;
          });
        }
      }
    }
  }
  

</script>

