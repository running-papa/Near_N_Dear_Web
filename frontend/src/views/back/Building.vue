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
                <v-radio-group row>
                    <v-radio
                      v-for="type in types"
                      :key="type"
                      :label="type"
                      :value="type"
                      color="info"
                      @change="typeInfo(type)"
                    ></v-radio>
                  </v-radio-group>
                </v-row>
            </v-col>
            <v-col cols="12" md="6">
              <v-row justify="space-around">
                <v-radio-group row>
                    <v-radio
                      v-for="type in price_types"
                      :key="type"
                      :label="type"
                      :value="type"
                      color="info"
                      @change="typeInfo(type)"
                    ></v-radio>
                  </v-radio-group>
                </v-row>
            </v-col>
            <v-col cols="12" md="4">
              <v-text-field
                class="purple-input"
                :label="$t('price')"
                prepend-icon="mdi-cash-usd"
                type="text"
              />
            </v-col>

            <v-col cols="12">
              <v-text-field
                class="purple-input"
                :label="$t('subject')"
                prepend-icon="mdi-comment-check"
                type="text"
                required
              />
            </v-col>
            <v-col cols="12">
              <v-textarea
                class="purple-input"
                :label="$t('description')"
                :placeholder="$t('description')"
                prepend-icon="mdi-comment-check"
              />
            </v-col>

            <v-col cols="12" md="4">
              <v-text-field
                class="purple-input"
                :label="$t('street_number')"
                prepend-icon="mdi-road-variant"
                type="text"
              />
            </v-col>

            <v-col cols="12" md="4">
              <v-text-field
                class="purple-input"
                :label="$t('street_name')"
                
                prepend-icon="mdi-road-variant"
                type="text"
                required
              />
            </v-col>
            <v-col cols="12" md="4">
              <v-text-field
                :label="$t('city')"
                class="purple-input"
                prepend-icon="mdi-city"
                type="text"
              />
            </v-col>
            <v-col cols="12" md="4">
              <v-text-field
                :label="$t('province')"
                class="purple-input"
                
                prepend-icon="mdi-map-marker"
                type="text"
                minlength ="6"
                maxlength="15"
              />
            </v-col>

            <v-col cols="12" md="4">
              <v-text-field
                :label="$t('country')"
                class="purple-input"
                
                prepend-icon="mdi-map-marker"
                type="text"
                minlength ="6"
                maxlength="15"
              />
            </v-col>
            <v-col cols="12" md="4">
              <v-text-field
                :label="$t('postal_code')"
                class="purple-input"
                
                prepend-icon="mdi-home-map-marker"
                type="text"
              />
            </v-col>

            <v-col cols="12" md="6">
              <v-text-field
                :label="$t('building_type')"
                class="purple-input"
                
                prepend-icon="mdi-office-building"
                type="text"
              />
            </v-col>
              <v-col cols="12" md="6">
              <v-text-field
                :label="$t('building_size')"
                class="purple-input"
                
                prepend-icon="mdi-select"
                type="text"
              />
            </v-col>

            <v-col cols="12" md="4">
              <v-text-field
                :label="$t('beds')"
                class="purple-input"
                
                prepend-icon="mdi-sofa"
                type="text"
              />
            </v-col>

            <v-col cols="12" md="4">
              <v-text-field
                :label="$t('baths')"
                class="purple-input"
                
                prepend-icon="mdi-scale-bathroom"
                type="text"
              />
            </v-col>

            <v-col cols="12" md="4">
              <v-text-field
                :label="$t('floor')"
                class="purple-input"
                
                prepend-icon="mdi-chart-line-variant"
                type="text"
              />
            </v-col>

           <v-col cols="12" md="6">
              <v-text-field
                :label="$t('built_in')"
                class="purple-input"
                
                prepend-icon="mdi-update"
                type="text"
              />
            </v-col>
            <v-col cols="12" md="6">
              <v-text-field
                :label="$t('parking_spaces')"
                class="purple-input"
                
                prepend-icon="mdi-parking"
                type="text"
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
        </v-container>
      </v-form>
  </base-material-card>



</v-container>
</template>

<script>

  export default {
    name:'Building',
    data () {
      return {
       types:['public','private'],
       price_types:['lent','sale and sale'],
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
      else
      {
      }

    },
    methods:{
      previewFiles(event) {
       
      }
    }
  }
  

</script>
