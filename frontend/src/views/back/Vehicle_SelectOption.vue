<template>
  <v-container
    id="Vehicle_Option"
    fluid
    tag="section"
  >

  <base-material-card>
    <template v-slot:heading>
      <div class="display-2 font-weight-light">
        {{$t('Vehicle_option')}}
      </div>

      <div class="subtitle-1 font-weight-light">
        {{$t('Vehicle_option_sub')}}
      </div>
    </template>
  <v-row>
     <v-col cols="12"> 
        {{$t('basic_option')}}
     </v-col>
     <v-col cols="12" md="3"><v-switch class="ma-1" :label="$t('power_handle')" v-model="basic_option.power_handle"></v-switch></v-col>
     <v-col cols="12" md="3"><v-switch class="ma-1" :label="$t('power_window')" v-model="basic_option.power_window"></v-switch></v-col>
     <v-col cols="12" md="3"><v-switch class="ma-1" :label="$t('air_conditioner')" v-model="basic_option.air_conditioner"></v-switch></v-col>
     <v-col cols="12" md="3"><v-switch class="ma-1" :label="$t('full_auto_air_conditioner')" v-model="basic_option.full_auto_air_conditioner"></v-switch></v-col>
     <v-col cols="12" md="3"><v-switch class="ma-1" :label="$t('tinting')" v-model="basic_option.tinting"></v-switch></v-col>
     <v-col cols="12" md="3"><v-switch class="ma-1" :label="$t('sunroof')" v-model="basic_option.sunroof"></v-switch></v-col>
     <v-col cols="12" md="3"><v-switch class="ma-1" :label="$t('panorama_sunroof')" v-model="basic_option.panorama_sunroof"></v-switch></v-col>
     <v-col cols="12" md="3"><v-switch class="ma-1" :label="$t('aluminium_wheel')" v-model="basic_option.aluminium_wheel"></v-switch></v-col>
     <v-col cols="12" md="3"><v-switch class="ma-1" :label="$t('ecm_room_mirror')" v-model="basic_option.ecm_room_mirror"></v-switch></v-col>
     <v-col cols="12" md="3"><v-switch class="ma-1" :label="$t('woodgrain')" v-model="basic_option.woodgrain"></v-switch></v-col>
     <v-col cols="12" md="3"><v-switch class="ma-1" :label="$t('metalgrain')" v-model="basic_option.metalgrain"></v-switch></v-col>
     <v-col cols="12" md="3"><v-switch class="ma-1" :label="$t('remote_starting_device')" v-model="basic_option.remote_starting_device"></v-switch></v-col>
     <v-col cols="12" md="3"><v-switch class="ma-1" :label="$t('smart_key')" v-model="basic_option.smart_key"></v-switch></v-col>
     <v-col cols="12" md="3"><v-switch class="ma-1" :label="$t('leather_seat')" v-model="basic_option.leather_seat"></v-switch></v-col>
     <v-col cols="12" md="3"><v-switch class="ma-1" :label="$t('electric_sheet')" v-model="basic_option.electric_sheet"></v-switch></v-col>
     <v-col cols="12" md="3"><v-switch class="ma-1" :label="$t('memory_sheet')" v-model="basic_option.memory_sheet"></v-switch></v-col>
     <v-col cols="12" md="3"><v-switch class="ma-1" :label="$t('heated_sheet')" v-model="basic_option.heated_sheet"></v-switch></v-col>
     <v-col cols="12" md="3"><v-switch class="ma-1" :label="$t('gout_sheet')" v-model="basic_option.gout_sheet"></v-switch></v-col>
     <v-col cols="12" md="3"><v-switch class="ma-1" :label="$t('black_box')" v-model="basic_option.black_box"></v-switch></v-col>
     <v-col cols="12" md="3"><v-switch class="ma-1" :label="$t('high_pass')" v-model="basic_option.high_pass"></v-switch></v-col>
     <v-col cols="12">
     <v-text-field
                :label="$t('other')"
                class="purple-input"
                prepend-icon="mdi-comment-check"
                type="text"
                v-model="basic_option.other"
              />
     </v-col>


     <v-col cols="12"> 
        {{$t('safety_option')}}
     </v-col>
     <v-col cols="12" md="3"><v-switch class="ma-1" :label="$t('driver_air_bag')" v-model="safety_option.driver_air_bag"></v-switch></v-col>
     <v-col cols="12" md="3"><v-switch class="ma-1" :label="$t('passenger_air_bag')" v-model="safety_option.passenger_air_bag"></v-switch></v-col>
     <v-col cols="12" md="3"><v-switch class="ma-1" :label="$t('side_air_bag')" v-model="safety_option.side_air_bag"></v-switch></v-col>
     <v-col cols="12" md="3"><v-switch class="ma-1" :label="$t('curtain_air_bag')" v-model="safety_option.curtain_air_bag"></v-switch></v-col>
     <v-col cols="12" md="3"><v-switch class="ma-1" :label="$t('abs')" v-model="safety_option.abs"></v-switch></v-col>
     <v-col cols="12" md="3"><v-switch class="ma-1" :label="$t('ecs')" v-model="safety_option.ecs"></v-switch></v-col>
     <v-col cols="12" md="3"><v-switch class="ma-1" :label="$t('esp')" v-model="safety_option.esp"></v-switch></v-col>
     <v-col cols="12" md="3"><v-switch class="ma-1" :label="$t('tcs')" v-model="safety_option.tcs"></v-switch></v-col>
     <v-col cols="12" md="3"><v-switch class="ma-1" :label="$t('forward_aft_detector')" v-model="safety_option.forward_aft_detector"></v-switch></v-col>
     <v-col cols="12" md="3"><v-switch class="ma-1" :label="$t('rear_camera')" v-model="safety_option.rear_camera"></v-switch></v-col>
     <v-col cols="12" md="3"><v-switch class="ma-1" :label="$t('navigation')" v-model="safety_option.navigation"></v-switch></v-col>
     <v-col cols="12" md="3"><v-switch class="ma-1" :label="$t('air_purifier')" v-model="safety_option.air_purifier"></v-switch></v-col>
     
     <v-col cols="12">
     <v-text-field
                :label="$t('other')"
                class="purple-input"
                prepend-icon="mdi-comment-check"
                type="text"
                v-model="safety_option.other"
              />
     </v-col>

     <v-col cols="12"> 
        {{$t('other_option')}}
     </v-col>
     <v-col cols="12" md="3"><v-switch class="ma-1" :label="$t('super_vision_board')" v-model="other_option.super_vision_board"></v-switch></v-col>
     <v-col cols="12" md="3"><v-switch class="ma-1" :label="$t('bucket_sheet')" v-model="other_option.bucket_sheet"></v-switch></v-col>
     <v-col cols="12" md="3"><v-switch class="ma-1" :label="$t('air_dam')" v-model="other_option.air_dam"></v-switch></v-col>
     <v-col cols="12" md="3"><v-switch class="ma-1" :label="$t('bumpergard')" v-model="other_option.bumpergard"></v-switch></v-col>
     <v-col cols="12" md="3"><v-switch class="ma-1" :label="$t('chrome_wheel')" v-model="other_option.chrome_wheel"></v-switch></v-col>
     <v-col cols="12" md="3"><v-switch class="ma-1" :label="$t('four_wheel_drive')" v-model="other_option.four_wheel_drive"></v-switch></v-col>
     <v-col cols="12" md="3"><v-switch class="ma-1" :label="$t('rear_spoiler')" v-model="other_option.rear_spoiler"></v-switch></v-col>
     <v-col cols="12" md="3"><v-switch class="ma-1" :label="$t('cruise_control')" v-model="other_option.cruise_control"></v-switch></v-col>
     <v-col cols="12" md="3"><v-switch class="ma-1" :label="$t('loop_carrier')" v-model="other_option.loop_carrier"></v-switch></v-col>
     
     <v-col cols="12">
     <v-text-field
                :label="$t('other')"
                class="purple-input"
                prepend-icon="mdi-comment-check"
                type="text"
                v-model="other_option.other"
              />
     </v-col>
  </v-row>
  <v-row cols="12">
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
    name:'Vehicle_Option',
    data () {
      return {
        user:{},
        basic_option:{
          power_handle:false,
          power_window:false,
          air_conditioner:false,
          full_auto_air_conditioner:false,
          tinting:false,
          sunroof:false,
          panorama_sunroof:false,
          aluminium_wheel:false,
          ecm_room_mirror:false,
          woodgrain:false,
          metalgrain:false,
          remote_starting_device:false,
          smart_key:false,
          leather_seat:false,
          electric_sheet:false,
          memory_sheet:false,
          heated_sheet:false,
          gout_sheet:false,
          black_box:false,
          high_pass:false,
          other:'',
        },
        safety_option:{
           driver_air_bag:false,
           passenger_air_bag:false,
           side_air_bag:false,
           curtain_air_bag:false,
           abs:false,
           ecs:false,
           esp:false,
           tcs:false,
           forward_aft_detector:false,
           rear_camera:false,
           navigation:false,
           air_purifier:false,
           other:'',
        },
        other_option:{
          super_vision_board:false,
          bucket_sheet:false,
          air_dam:false,
          bumpergard:false,
          chrome_wheel:false,
          four_wheel_drive:false,
          rear_spoiler:false,
          cruise_control:false,
          loop_carrier:false,
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
      

      if (this.uuid != '')
      {
        const frm = new FormData()
        frm.append('uuid', this.uuid);
        frm.append('dealer_email', this.user.email);

        this.$http.post('/api/vehicle_getOption', frm).then((response) => {
          
          if ( response.data.status == 'error')
          {
             console.log(this.$t( response.data.messages))
              return;
          }
          else
          {
            this.basic_option.power_handle = this.parseString(response.data.basic_option.power_handle);
            this.basic_option.power_window = this.parseString(response.data.basic_option.power_window);
            this.basic_option.air_conditioner = this.parseString(response.data.basic_option.air_conditioner);
            this.basic_option.full_auto_air_conditioner = this.parseString(response.data.basic_option.full_auto_air_conditioner);
            this.basic_option.tinting = this.parseString(response.data.basic_option.tinting);
            this.basic_option.sunroof = this.parseString(response.data.basic_option.sunroof);
            this.basic_option.panorama_sunroof = this.parseString(response.data.basic_option.panorama_sunroof);
            this.basic_option.aluminium_wheel = this.parseString(response.data.basic_option.aluminium_wheel);
            this.basic_option.ecm_room_mirror = this.parseString(response.data.basic_option.ecm_room_mirror);
            this.basic_option.woodgrain = this.parseString(response.data.basic_option.woodgrain);
            this.basic_option.metalgrain = this.parseString(response.data.basic_option.metalgrain);
            this.basic_option.remote_starting_device = this.parseString(response.data.basic_option.remote_starting_device);
            this.basic_option.smart_key = this.parseString(response.data.basic_option.smart_key);
            this.basic_option.leather_seat = this.parseString(response.data.basic_option.leather_seat);
            this.basic_option.electric_sheet = this.parseString(response.data.basic_option.electric_sheet);
            this.basic_option.memory_sheet = this.parseString(response.data.basic_option.memory_sheet);
            this.basic_option.heated_sheet = this.parseString(response.data.basic_option.heated_sheet);
            this.basic_option.gout_sheet = this.parseString(response.data.basic_option.gout_sheet);
            this.basic_option.black_box = this.parseString(response.data.basic_option.black_box);
            this.basic_option.high_pass = this.parseString(response.data.basic_option.high_pass);
            this.basic_option.other = response.data.basic_option.other;
        
        
            this.safety_option.driver_air_bag = this.parseString(response.data.safety_option.driver_air_bag);
            this.safety_option.passenger_air_bag = this.parseString(response.data.safety_option.passenger_air_bag);
            this.safety_option.side_air_bag = this.parseString(response.data.safety_option.side_air_bag);
            this.safety_option.curtain_air_bag = this.parseString(response.data.safety_option.curtain_air_bag);
            this.safety_option.abs = this.parseString(response.data.safety_option.abs);
            this.safety_option.ecs = this.parseString(response.data.safety_option.ecs);
            this.safety_option.esp = this.parseString(response.data.safety_option.esp);
            this.safety_option.tcs = this.parseString(response.data.safety_option.tcs);
            this.safety_option.forward_aft_detector = this.parseString(response.data.safety_option.forward_aft_detector);
            this.safety_option.rear_camera = this.parseString(response.data.safety_option.rear_camera);
            this.safety_option.navigation = this.parseString(response.data.safety_option.navigation);
            this.safety_option.air_purifier = this.parseString(response.data.safety_option.air_purifier);
            this.safety_option.other = response.data.safety_option.other;
        
        
            this.other_option.super_vision_board = this.parseString(response.data.other_option.super_vision_board);
            this.other_option.bucket_sheet = this.parseString(response.data.other_option.bucket_sheet);
            this.other_option.air_dam = this.parseString(response.data.other_option.air_dam);
            this.other_option.bumpergard = this.parseString(response.data.other_option.bumpergard);
            this.other_option.chrome_wheel = this.parseString(response.data.other_option.chrome_wheel);
            this.other_option.four_wheel_drive = this.parseString(response.data.other_option.four_wheel_drive);
            this.other_option.rear_spoiler = this.parseString(response.data.other_option.rear_spoiler);
            this.other_option.cruise_control = this.parseString(response.data.other_option.cruise_control);
            this.other_option.loop_carrier = this.parseString(response.data.other_option.loop_carrier);
            this.other_option.other = response.data.other_option.other;
        
          }    
        }).catch(error => {
          console.log(error.response)
          if ( error.response == undefined)
            return;

           this.$swal.fire({
                icon: 'error',
                title: this.$t(error.response.data.messages),              
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
        frm.append('dealer_email', this.user.email);

        frm.append('power_handle', this.basic_option.power_handle);
        frm.append('power_window', this.basic_option.power_window);
        frm.append('air_conditioner', this.basic_option.air_conditioner);
        frm.append('full_auto_air_conditioner', this.basic_option.full_auto_air_conditioner);
        frm.append('tinting', this.basic_option.tinting);
        frm.append('sunroof', this.basic_option.sunroof);
        frm.append('panorama_sunroof', this.basic_option.panorama_sunroof);
        frm.append('aluminium_wheel', this.basic_option.aluminium_wheel);
        frm.append('ecm_room_mirror', this.basic_option.ecm_room_mirror);
        frm.append('woodgrain', this.basic_option.woodgrain);
        frm.append('metalgrain', this.basic_option.metalgrain);
        frm.append('remote_starting_device', this.basic_option.remote_starting_device);
        frm.append('smart_key', this.basic_option.smart_key);
        frm.append('leather_seat', this.basic_option.leather_seat);
        frm.append('electric_sheet', this.basic_option.electric_sheet);
        frm.append('memory_sheet', this.basic_option.memory_sheet);
        frm.append('heated_sheet', this.basic_option.heated_sheet);
        frm.append('gout_sheet', this.basic_option.gout_sheet);
        frm.append('black_box', this.basic_option.black_box);
        frm.append('high_pass', this.basic_option.high_pass);
        frm.append('basic_other', this.basic_option.other);

        frm.append('driver_air_bag', this.safety_option.driver_air_bag);
        frm.append('passenger_air_bag', this.safety_option.passenger_air_bag);
        frm.append('side_air_bag', this.safety_option.side_air_bag);
        frm.append('curtain_air_bag', this.safety_option.curtain_air_bag);
        frm.append('abs', this.safety_option.abs);
        frm.append('ecs', this.safety_option.ecs);
        frm.append('esp', this.safety_option.esp);
        frm.append('tcs', this.safety_option.tcs);
        frm.append('forward_aft_detector', this.safety_option.forward_aft_detector);
        frm.append('rear_camera', this.safety_option.rear_camera);
        frm.append('navigation', this.safety_option.navigation);
        frm.append('air_purifier', this.safety_option.air_purifier);
        frm.append('safety_other', this.safety_option.other);

        frm.append('super_vision_board', this.other_option.super_vision_board);
        frm.append('bucket_sheet', this.other_option.bucket_sheet);
        frm.append('air_dam', this.other_option.air_dam);
        frm.append('bumpergard', this.other_option.bumpergard);
        frm.append('chrome_wheel', this.other_option.chrome_wheel);
        frm.append('four_wheel_drive', this.other_option.four_wheel_drive);
        frm.append('rear_spoiler', this.other_option.rear_spoiler);
        frm.append('cruise_control', this.other_option.cruise_control);
        frm.append('loop_carrier', this.other_option.loop_carrier);
        frm.append('other_other', this.other_option.other);
        

        

        this.$http.post('/api/vehicle_option', frm).then((response) => {

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
