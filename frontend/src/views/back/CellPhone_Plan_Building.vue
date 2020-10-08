<template>
  <v-container
    id="CellPhone_Plan_Building"
    fluid
    tag="section"
  >

<base-material-card>
  <template v-slot:heading>
    <div class="display-2 font-weight-light">
      {{$t('CellPhone_Plan_building')}}
    </div>

    <div class="subtitle-1 font-weight-light">
      {{$t('CellPhone_Plan_building_sub')}}
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

            <v-col cols="12" md="12">
              <v-text-field
                :rules="requiredRules"
                required
                class="purple-input"
                :label="$t('CellPhone_Plan_subject')"
                prepend-icon="mdi-comment-check"
                type="text"
                v-model="building.subject"
              />
            </v-col>
            <v-col cols="12" md="12">
              <v-text-field
                :rules="requiredRules"
                required
                class="purple-input"
                :label="$t('CellPhone_Plan_description')"
                prepend-icon="mdi-comment-check"
                type="text"
                v-model="building.description"
              />
            </v-col>
            <v-col cols="12">
              <v-textarea
                :rules="requiredRules"
                required
                class="purple-input"
                :label="$t('CellPhone_Plan_more')"
                :placeholder="$t('CellPhone_Plan_more')"
                prepend-icon="mdi-comment-check"
                v-model="building.more"
              />
            </v-col>
            

            <v-col cols="12" md="3">
              <v-select
                :items="call_text_type_all"
                :label="$t('CellPhone_Plan_call_text_type')"
                class="purple-input"
                v-model="building.call_text_type"
                prepend-icon="mdi-rename-box"
                
              ></v-select>
            </v-col>
            <v-col cols="12" md="3">
              <v-text-field
                :rules="requiredRules"
                required
                class="purple-input"
                :label="$t('CellPhone_Plan_call_text')"
                prepend-icon="mdi-comment-check"
                type="text"
                v-model="building.call_text"
              />
            </v-col>
            <v-col cols="12" md="3">
              <v-select
                :items="data_type_all"
                :label="$t('CellPhone_Plan_Data_type')"
                class="purple-input"
                v-model="building.data_type"
                prepend-icon="mdi-rename-box"
                
              ></v-select>
            </v-col>
            <v-col cols="12" md="3">
              <v-text-field
                :rules="requiredRules"
                required
                class="purple-input"
                :label="$t('CellPhone_Plan_Data')"
                prepend-icon="mdi-comment-check"
                type="text"
                v-model="building.data"
              />
            </v-col>
            <v-col cols="12">
              <v-textarea
                :rules="requiredRules"
                required
                class="purple-input"
                :label="$t('CellPhone_Plan_features')"
                :placeholder="$t('CellPhone_Plan_features')"
                prepend-icon="mdi-comment-check"
                v-model="building.features"
              />
            </v-col>

            <v-col cols="12" md="4">
              <v-text-field
                :rules="requiredRules"
                required
                class="purple-input"
                :label="$t('CellPhone_Plan_processing_fee')"
                prepend-icon="mdi-comment-check"
                type="text"
                v-model="building.processing_fee"
              />
            </v-col>
            

            <v-col cols="12" md="4">
              <v-text-field
                :rules="requiredRules"
                required
                class="purple-input"
                :label="$t('CellPhone_Plan_price')"
                prepend-icon="mdi-comment-check"
                v-model="building.price"
              />
            </v-col>
            <v-col cols="12" md="4">
              <v-text-field
                :rules="requiredRules"
                required
                class="purple-input"
                :label="$t('CellPhone_Plan_total_price')"
                prepend-icon="mdi-comment-check"
                v-model="building.total_price"
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
    name:'CellPhone_Plan_Building',
    data () {
      return {
       public_types:['public','private'],
       call_text_type_all:['Unlimited','Limited','International'],
       data_type_all:['No Data','Limited','Unlimited after'],
       user:{},
       building: {
         public:'public',
         subject:'',
         description:'',
         more:'',
         call_text_type:'',
         call_text:'',
         data_type:'',
         data:'',
         features:'',
         processing_fee:'',
         price:'',
         total_price:'',
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

      // edit 
      if (this.uuid != '')
      {
        const frm = new FormData()
        frm.append('uuid', this.uuid);

        this.$http.post('/api/cellPhone_Plan_getBuilding', frm).then((response) => {

          if ( response.data.status == 'error')
          {
             console.log(this.$t( response.data.messages))
              return;
          }
          else
          {
            console.log(response.data)
            this.building = response.data;
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
        
        frm.append('subject', this.building.subject);
        frm.append('description', this.building.description);
        frm.append('more', this.building.more);
        frm.append('call_text_type', this.building.call_text_type);
        frm.append('call_text', this.building.call_text);
        frm.append('data_type', this.building.data_type);
        frm.append('data', this.building.data);
        frm.append('features', this.building.features);
        frm.append('processing_fee', this.building.processing_fee);
        frm.append('price', this.building.price);
        frm.append('total_price', this.building.total_price);
      
        

        this.$http.post('/api/cellPhone_Plan_create', frm).then((response) => {

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
            var uuid = response.data.uuid;
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
      
    }
  }
  

</script>

