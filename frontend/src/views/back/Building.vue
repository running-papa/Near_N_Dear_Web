<template>
  <v-container
    id="Building"
    fluid
    tag="section"
  >

<base-material-card>
  <template v-slot:heading>
    <div class="display-2 font-weight-light">
      {{$t('realestate_building')}}
    </div>

    <div class="subtitle-1 font-weight-light">
      {{$t('realestate_building_sub')}}
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
                      v-for="type in types"
                      :key="type"
                      :label="type"
                      :value="type"
                      color="info"
                    ></v-radio>
                  </v-radio-group>
                </v-row>
            </v-col>
            <v-col cols="12" md="6">
              <v-row justify="space-around">
                <v-radio-group v-model="building.price_type" row>
                    <v-radio
                      :rules="requiredRules"
                      required
                      v-for="type in price_types"
                      :key="type"
                      :label="type"
                      :value="type"
                      color="info"
                    ></v-radio>
                  </v-radio-group>
                </v-row>
            </v-col>
            <v-col cols="12" md="4">
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
                :label="$t('street_number')"
                prepend-icon="mdi-road-variant"
                type="text"
                v-model="building.street_number"
              />
            </v-col>

            <v-col cols="12" md="4">
              <v-text-field
                :rules="requiredRules"
                required
                class="purple-input"
                :label="$t('street_name')"
                prepend-icon="mdi-road-variant"
                type="text"
                v-model="building.street_name"
                
              />
            </v-col>
            <v-col cols="12" md="4">
              <v-text-field
                :rules="requiredRules"
                required
                :label="$t('city')"
                class="purple-input"
                prepend-icon="mdi-city"
                type="text"
                v-model="building.city"
              />
            </v-col>
            <v-col cols="12" md="4">
              <v-text-field
                :rules="requiredRules"
                required
                :label="$t('province')"
                class="purple-input"
                prepend-icon="mdi-map-marker"
                type="text"
                minlength ="6"
                maxlength="15"
                v-model="building.province"
              />
            </v-col>

            <v-col cols="12" md="4">
              <v-text-field
                :rules="requiredRules"
                required
                :label="$t('country')"
                class="purple-input"
                prepend-icon="mdi-map-marker"
                type="text"
                minlength ="6"
                maxlength="15"
                v-model="building.country"
              />
            </v-col>
            <v-col cols="12" md="4">
              <v-text-field
                :rules="requiredRules"
                required
                :label="$t('postal_code')"
                class="purple-input"
                prepend-icon="mdi-home-map-marker"
                type="text"
                v-model="building.postal_code"
              />
            </v-col>

            <v-col cols="12" md="4">
              <v-text-field
                :rules="requiredRules"
                required
                :label="$t('building_type')"
                class="purple-input"
                prepend-icon="mdi-office-building"
                type="text"
                v-model="building.building_type"
              />
            </v-col>
            <v-col cols="12" md="4">
              <v-text-field
                :rules="requiredRules"
                required
                :label="$t('building_name')"
                class="purple-input"
                prepend-icon="mdi-rename-box"
                type="text"
                v-model="building.building_name"
              />
            </v-col>
            <v-col cols="12" md="4">
              <v-text-field
                :rules="requiredRules"
                required
                :label="$t('building_size')"
                class="purple-input"
                prepend-icon="mdi-select"
                type="text"
                v-model="building.building_size"
              />
            </v-col>

            <v-col cols="12" md="4">
              <v-text-field
                :rules="requiredRules"
                required
                :label="$t('beds')"
                class="purple-input"
                prepend-icon="mdi-sofa"
                type="text"
                v-model="building.beds"
              />
            </v-col>

            <v-col cols="12" md="4">
              <v-text-field
                :rules="requiredRules"
                required
                :label="$t('baths')"
                class="purple-input"
                prepend-icon="mdi-scale-bathroom"
                type="text"
                v-model="building.baths"
              />
            </v-col>

            <v-col cols="12" md="4">
              <v-text-field
               :rules="requiredRules"
                required
                :label="$t('floor')"
                class="purple-input"
                prepend-icon="mdi-chart-line-variant"
                type="text"
                v-model="building.floor"
              />
            </v-col>

           <v-col cols="12" md="4">
              <v-text-field
               :rules="requiredRules"
                required
                :label="$t('built_in')"
                class="purple-input"
                prepend-icon="mdi-update"
                type="text"
                v-model="building.built_in"
              />
            </v-col>
            <v-col cols="12" md="4">
              <v-text-field
                :rules="requiredRules"
                required
                :label="$t('parking_spaces')"
                class="purple-input"
                prepend-icon="mdi-parking"
                type="text"
                v-model="building.parking_spaces"
              />
            </v-col>
            <v-col cols="12" md="4">
              <v-text-field
                :rules="requiredRules"
                required
                :label="$t('move_in_date')"
                class="purple-input"
                prepend-icon="mdi-calendar-question"
                type="text"
                v-model="building.move_in_date"
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
    name:'Building',
    data () {
      return {
       
       types:['public','private'],
       price_types:['lent','sale and sale'],
       user:{},
       building: {
         public:'',
         transaction:'',
         street_number:'',
         street_name:'',
         city:'',
         province:'',
         country:'',
         postal_code:'',
         price:'',
         price_type:'',
         subject:'',
         description:'',
         move_in_date:'',
         dealer_email:'',
         building_type:'',
         building_name:'',
         building_size:'',
         beds:'',
         baths:'',
         floor:'',
         built_in:'',
         parking_spaces:'',
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
    },
    methods:{
      create(){
        const frm = new FormData()
        frm.append('uuid', this.uuid);
        frm.append('public', this.building.public);
        frm.append('transaction', this.building.transaction);
        frm.append('street_number', this.building.street_number);
        frm.append('street_name', this.building.street_name);
        frm.append('city', this.building.city);
        frm.append('province', this.building.province);
        frm.append('country', this.building.country);
        frm.append('postal_code', this.building.postal_code);
        frm.append('price', this.building.price);
        frm.append('price_type', this.building.price_type);
        frm.append('subject', this.building.subject);
        frm.append('description', this.building.description);
        frm.append('move_in_date', this.building.move_in_date);
        frm.append('dealer_email', this.user.email);
        frm.append('building_type', this.building.building_type);
        frm.append('building_name', this.building.building_name);
        frm.append('building_size', this.building.building_size);
        frm.append('beds', this.building.beds);
        frm.append('baths', this.building.baths);
        frm.append('floor', this.building.floor);
        frm.append('built_in', this.building.built_in);
        frm.append('parking_spaces', this.building.parking_spaces);

        this.$http.post('/api/realestate_create', frm).then((response) => {

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
            var uuid = response.data.realestate.uuid;
            this.$emit('child', uuid);        

          }    
        }).catch(error => {
          console.log(error.response)
           this.$swal.fire({
                icon: 'error',
                title: error.response.statusText,              
              })
         });
       
        
        
      }
    }
  }
  

</script>
