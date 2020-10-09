<template>


  <v-container
    id="mobile_view"
    fluid
    tag="section"
    
  >
<v-dialog v-model="show" max-width="550px" persistent>
<base-material-card >
  <template v-slot:heading>
    <div class="display-2 font-weight-light">
      {{sub_title}}
    </div>

    <div class="subtitle-1 font-weight-light">
      매물번호 : {{ building.uuid }}
    </div>
     
  </template>
      <!-- 부동산 매물 모바일 뷰 -->
        <v-container class="py-0" v-if="mobile_type == 'realestate'">
        
        <v-col cols="12" md="12">
        <base-section-heading color="grey lighten-2" icon="mdi-file-image" :title="$t('image_information')" />
        </v-col>

          <v-col cols="12" mb="6">
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
          
          <!-- <base-section-heading color="info" icon="mdi-home-circle" :title="거래정보" /> -->
          <v-col cols="12" md="12">
            <base-section-heading color="grey lighten-2" icon="mdi-home" :title="$t('Transaction_information')" />
          </v-col>
          <!-- <base-heading space="8" title="거래 정보" /> -->
          
          <v-row>
             
            <v-col cols="12" md="12">
                <v-text-field
                  readonly
                  class="purple-input"
                  :label="$t('header_subject')"
                  prepend-icon="mdi-comment-check"
                  type="text"
                  v-model="building.subject"
                />
            </v-col>
            <v-col cols="12" md="6">
                <v-text-field
                  readonly
                  class="purple-input"
                  :label="$t('header_price_type')"
                  prepend-icon="mdi-comment-check"
                  type="text"
                  v-model="building.price_type"
                />
            </v-col>
            <v-col cols="12" md="6">
                <v-text-field
                  readonly
                  class="purple-input"
                  :label="$t('header_price')"
                  prepend-icon="mdi-comment-check"
                  type="text"
                  v-model="building.price"
                />
            </v-col>
            <v-col cols="12" md="6">
                <v-text-field
                  readonly
                  class="purple-input"
                  :label="$t('header_province')"
                  prepend-icon="mdi-comment-check"
                  type="text"
                  v-model="building.province"
                />
            </v-col>
            <v-col cols="12" md="6">
                <v-text-field
                  readonly
                  class="purple-input"
                  :label="$t('header_city')"
                  prepend-icon="mdi-comment-check"
                  type="text"
                  v-model="building.city"
                />
            </v-col>
            <v-col cols="12" md="6">
                <v-text-field
                  readonly
                  class="purple-input"
                  :label="$t('header_street_name')"
                  prepend-icon="mdi-comment-check"
                  type="text"
                  v-model="building.street_name"
                />
            </v-col>
            <v-col cols="12" md="6">
                <v-text-field
                  readonly
                  class="purple-input"
                  :label="$t('header_street_number')"
                  prepend-icon="mdi-comment-check"
                  type="text"
                  v-model="building.street_number"
                />
            </v-col>
            <v-col cols="12" md="6">
                <v-text-field
                  readonly
                  class="purple-input"
                  :label="$t('move_in_date')"
                  prepend-icon="mdi-comment-check"
                  type="text"
                  v-model="building.move_in_date"
                />
            </v-col>
            <v-col cols="12" md="12">
              <base-section-heading color="grey lighten-2" icon="mdi-scale-bathroom" :title="$t('room_information')" />
            </v-col>
          <!-- <base-heading space="8" title="거래 정보" /> -->
            <v-col cols="12" md="12">
                <v-text-field
                  readonly
                  class="purple-input"
                  :label="$t('building_type')"
                  prepend-icon="mdi-comment-check"
                  type="text"
                  v-model="building.building_type"
                />
            </v-col>
            <v-col cols="12" md="6">
                <v-text-field
                  readonly
                  class="purple-input"
                  :label="$t('building_size')"
                  prepend-icon="mdi-comment-check"
                  type="text"
                  v-model="building.building_size"
                />
            </v-col>
            <v-col cols="12" md="6">
                <v-text-field
                  readonly
                  class="purple-input"
                  :label="$t('beds')"
                  prepend-icon="mdi-comment-check"
                  type="text"
                  v-model="building.beds"
                />
            </v-col>
            <v-col cols="12" md="6">
                <v-text-field
                  readonly
                  class="purple-input"
                  :label="$t('baths')"
                  prepend-icon="mdi-comment-check"
                  type="text"
                  v-model="building.baths"
                />
            </v-col>
            <v-col cols="12" md="6">
                <v-text-field
                  readonly
                  class="purple-input"
                  :label="$t('floor')"
                  prepend-icon="mdi-comment-check"
                  type="text"
                  v-model="building.floor"
                />
            </v-col>
            <v-col cols="12" md="6">
                <v-text-field
                  readonly
                  class="purple-input"
                  :label="$t('built_in')"
                  prepend-icon="mdi-comment-check"
                  type="text"
                  v-model="building.built_in"
                />
            </v-col>
            <v-col cols="12" md="6">
                <v-text-field
                  readonly
                  class="purple-input"
                  :label="$t('parking_spaces')"
                  prepend-icon="mdi-comment-check"
                  type="text"
                  v-model="building.parking_spaces"
                />
            </v-col>
           <v-col cols="12" md="12"> 
            <base-section-heading color="grey lighten-2" icon="mdi-wifi" :title="$t('option_information')" />
           </v-col>
            <v-row cols="12">
              <v-col cols="12" md="6" >
                  <v-switch class="ma-2" :label="$t('pet')"               v-model="option.pet" readonly></v-switch>
                  <v-switch class="ma-2" :label="$t('internet')"          v-model="option.internet" readonly></v-switch>
                  <v-switch class="ma-2" :label="$t('snow_removal')"      v-model="option.snow_removal" readonly></v-switch>
                  <v-switch class="ma-2" :label="$t('laundry')"           v-model="option.laundry" readonly></v-switch>
                  <v-switch class="ma-2" :label="$t('dryer')"             v-model="option.dryer" readonly></v-switch>
                  <v-switch class="ma-2" :label="$t('heating')"           v-model="option.heation" readonly></v-switch>
                  <v-switch class="ma-2" :label="$t('cooling')"           v-model="option.cooling" readonly></v-switch>
                  <v-switch class="ma-2" :label="$t('refrigerator')"      v-model="option.refrigerator" readonly></v-switch>
              </v-col>
              <v-col cols="12" md="6" >
                  <v-switch class="ma-2" :label="$t('dishwasher')"        v-model="option.dishwasher" readonly></v-switch>
                  <v-switch class="ma-2" :label="$t('oven')"              v-model="option.oven" readonly></v-switch>
                  <v-switch class="ma-2" :label="$t('full_fumiture')"     v-model="option.full_fumiture" readonly></v-switch>
                  <v-switch class="ma-2" :label="$t('Amenities')"         v-model="option.Amenities" readonly></v-switch>
                  <v-switch class="ma-2" :label="$t('transit_friendly')"  v-model="option.transit_friendly" readonly></v-switch>
                  <v-switch class="ma-2" :label="$t('storage')"           v-model="option.storage" readonly></v-switch>
                  <v-switch class="ma-2" :label="$t('elevator')"          v-model="option.elevator" readonly></v-switch>
                  <v-text-field
                          readonly
                          :label="$t('other')"
                          class="purple-input"
                          prepend-icon="mdi-comment-check"
                          type="text"
                          v-model="option.other"
                        />
              </v-col>
            </v-row>
            
            <v-col
              cols="12"
              class="text-right"
            >
              <v-btn
                color="success"
                class="mr-0"
                @click="close()"
              >
                {{$t('close')}}
              </v-btn>
              
            </v-col> 
          </v-row>
        </v-container>
      <!-- 부동산 매물 모바일 뷰 -->
      <!-- 차량 매물 모바일 뷰 -->
        <v-container class="py-0" v-else-if="mobile_type == 'vehicle'">
        
        <v-col cols="12" md="12">
        <base-section-heading color="grey lighten-2" icon="mdi-file-image" :title="$t('image_information')" />
        </v-col>

          <v-col cols="12" mb="6">
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
          
          
          <v-col cols="12" md="12">
            <base-section-heading color="grey lighten-2" icon="mdi-home" :title="$t('vehicle_information')" />
          </v-col>
          <v-row>
            <v-col cols="12" md="12">
                <v-text-field
                  readonly
                  class="purple-input"
                  :label="$t('header_subject')"
                  prepend-icon="mdi-comment-check"
                  type="text"
                  v-model="building.subject"
                />
            </v-col>
            <v-col cols="12" md="6">
                <v-text-field
                  readonly
                  class="purple-input"
                  :label="$t('header_price_type')"
                  prepend-icon="mdi-comment-check"
                  type="text"
                  v-model="building.type"
                />
            </v-col>
            <v-col cols="12" md="6">
                <v-text-field
                  readonly
                  class="purple-input"
                  :label="$t('price')"
                  prepend-icon="mdi-comment-check"
                  type="text"
                  v-model="building.price"
                />
            </v-col>
            <v-col cols="12" md="6">
                <v-text-field
                  readonly
                  class="purple-input"
                  :label="$t('Vehicle_maker')"
                  prepend-icon="mdi-comment-check"
                  type="text"
                  v-model="building.maker"
                />
            </v-col>
            <v-col cols="12" md="6">
                <v-text-field
                  readonly
                  class="purple-input"
                  :label="$t('Vehicle_series')"
                  prepend-icon="mdi-comment-check"
                  type="text"
                  v-model="building.series"
                />
            </v-col>
            <v-col cols="12" md="6">
                <v-text-field
                  readonly
                  class="purple-input"
                  :label="$t('Vehicle_trim')"
                  prepend-icon="mdi-comment-check"
                  type="text"
                  v-model="building.trim"
                />
            </v-col>
             <v-col cols="12">
              <v-textarea
                readonly
                class="purple-input"
                :label="$t('description')"
                :placeholder="$t('description')"
                prepend-icon="mdi-comment-check"
                v-model="building.description"
              />
            </v-col>
            
        <v-col cols="12" md="12">
          <base-section-heading color="grey lighten-2" icon="mdi-scale-bathroom" :title="$t('vehicle_detail_information')" />
        </v-col>
          <v-col cols="12" md="6">
                <v-text-field
                  readonly
                  class="purple-input"
                  :label="$t('Vehicle_year')"
                  prepend-icon="mdi-comment-check"
                  type="text"
                  v-model="building.year"
                />
            </v-col>
            <v-col cols="12" md="6">
                <v-text-field
                  readonly
                  class="purple-input"
                  :label="$t('Vehicle_mileage')"
                  prepend-icon="mdi-comment-check"
                  type="text"
                  v-model="building.mileage"
                />
            </v-col>
            <v-col cols="12" md="6">
                <v-text-field
                  readonly
                  class="purple-input"
                  :label="$t('Vehicle_fuel')"
                  prepend-icon="mdi-comment-check"
                  type="text"
                  v-model="building.fuel"
                />
            </v-col>
            <v-col cols="12" md="6">
                <v-text-field
                  readonly
                  class="purple-input"
                  :label="$t('Vehicle_number')"
                  prepend-icon="mdi-comment-check"
                  type="text"
                  v-model="building.number"
                />
            </v-col>
            <v-col cols="12" md="6">
              <v-text-field
                readonly
                :label="$t('Vehicle_accident_status')"
                class="purple-input"
                prepend-icon="mdi-hospital"
                type="text"
                v-model="building.accident_status"
              />
            </v-col>
            <v-col cols="12">
              <v-textarea
                 readonly
                class="purple-input"
                :label="$t('Vehicle_accident_details')"
                :placeholder="$t('Vehicle_accident_details')"
                prepend-icon="mdi-hospital"
                v-model="building.accident_details"
              />
            </v-col>
           <v-col cols="12" md="12"> 
            <base-section-heading color="grey lighten-2" icon="mdi-wifi" :title="$t('option_information')" />
           </v-col>
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
            
            <v-col
              cols="12"
              class="text-right"
            >
              <v-btn
                color="success"
                class="mr-0"
                @click="close()"
              >
                {{$t('close')}}
              </v-btn>
              
            </v-col> 
          </v-row>
        </v-container>
      <!-- 차량 매물 모바일 뷰 -->
      <!-- 핸드폰 모바일 뷰 -->
        <v-container class="py-0" v-else>
        
        <v-col cols="12" md="12">
        <base-section-heading color="grey lighten-2" icon="mdi-file-image" :title="$t('image_information')" />
        </v-col>

          <v-col cols="12" mb="6">
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
          
          
          <v-col cols="12" md="12">
            <base-section-heading color="grey lighten-2" icon="mdi-home" :title="$t('cellPhone_information')" />
          </v-col>
          <v-row>
            <v-col cols="12" md="6">
                <v-text-field
                  readonly
                  class="purple-input"
                  :label="$t('CellPhone_maker')"
                  prepend-icon="mdi-comment-check"
                  type="text"
                  v-model="building.maker"
                />
            </v-col>
            <v-col cols="12" md="6">
                <v-text-field
                  readonly
                  class="purple-input"
                  :label="$t('CellPhone_device_name')"
                  prepend-icon="mdi-comment-check"
                  type="text"
                  v-model="building.device_name"
                />
            </v-col>
            <v-col cols="12" md="6">
                <v-text-field
                  readonly
                  class="purple-input"
                  :label="$t('CellPhone_device_storage')"
                  prepend-icon="mdi-comment-check"
                  type="text"
                  v-model="building.device_storage"
                />
            </v-col>
            <v-col cols="12" md="6">
                <v-text-field
                  readonly
                  class="purple-input"
                  :label="$t('CellPhone_color')"
                  prepend-icon="mdi-comment-check"
                  type="text"
                  v-model="building.device_color"
                />
            </v-col>
            <v-col cols="12" md="6">
                <v-text-field
                  readonly
                  class="purple-input"
                  :label="$t('CellPhone_tier')"
                  prepend-icon="mdi-comment-check"
                  type="text"
                  v-model="building.tier"
                />
            </v-col>
            
        <v-col cols="12" md="12">
          <base-section-heading color="grey lighten-2" icon="mdi-scale-bathroom" :title="$t('Plan_information')" />
        </v-col>
          <v-col cols="12" md="12"> 
            <v-data-table
              dense 
              :headers="plan_headers"
              :items="plan"
              :search="search"
              :loading="loading"
              class="elevation-1"
            >
            <template v-slot:item="{ item }">
              <tr>
                <td class="long-data">{{ item.subject }}</td>
                <td class="long-data">{{ item.call_text }}</td>
                <td class="long-data">{{ item.FormData }}</td>
                <td class="long-data">{{ item.features }}</td>
                <td class="long-data">{{ item.price }}</td>
              </tr>
            </template>
            </v-data-table>
          </v-col>
           <v-col cols="12" md="12"> 
            <base-section-heading color="grey lighten-2" icon="mdi-wifi" :title="$t('addons_information')" />
           </v-col>
            <v-col cols="12" md="12"> 
              <v-data-table
                dense 
                :headers="addons_headers"
                :items="addons"
                :search="search"
                :loading="loading"
                class="elevation-1"
              >
              <template v-slot:item="{ item }">
              <tr>
                <td class="long-data">{{ item.type }}</td>
                <td class="long-data">{{ item.subject }}</td>
                <td class="long-data">{{ item.description }}</td>
                <td class="long-data">{{ item.more }}</td>
                <td class="long-data">{{ item.price }}</td>
              </tr>
            </template>
              </v-data-table>
            </v-col>
            <v-col
              cols="12"
              class="text-right"
            >
              <v-btn
                color="success"
                class="mr-0"
                @click="close()"
              >
                {{$t('close')}}
              </v-btn>
              
            </v-col> 
          </v-row>
        </v-container>
      <!-- 핸드폰 모바일 뷰 -->
  </base-material-card>
</v-dialog>
</v-container>
</template>

<script>

  export default {
    props: [
      'mobile_view',
      'uuid',
      'mobile_type'
    ],  
    
    name:'mobile_view',
    data () {
      return {
       sub_title:'',


      //  public_types:['public','private'],
      //  makers:['Apple','Samsung', 'LG', 'Huawei',],
      //  device_storage_all:['64GB','128GB','256GB','512GB',],
      //  device_all:[],
      //  color_all:['Grey','Silver','Blue','Orange','Black','Play Black','Edge + Grey', 'Fast Whilte', 'Play Blue', 'Hyper', 'Vision Brown',
      //             'Green', 'LV', 'Navy', 'Orange', 'Red', 'White', 'Purple',],
      preview:[''],
      building: {},
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
        },
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
        },

        search: '',
        loading: false,
        plan_headers: [],
        plan:[
          {
            uuid: '',
            public: '1',
            subject: 'subject',
            call_text: 'call_text',
            FormData: 'FormData',
            features: 'features',
            processing_fee:'',
            price: 'price',
            total_price: 'total_price',
          },
        ],
        addons_headers: [],
        addons:[
          {
            uuid: '',
            public: '1',
            type: '2',
            subject: '3',
            description: '4',
            more: '',
            price: '',
          },
        ],
       
        requiredRules: [
          v => !!v || 'is required',
        ],
      }
    },
    computed: {
    show: {
      get (value) {
         if(this.uuid == '' || this.uuid == null)
          return;

        if(this.mobile_type =='' || this.mobile_type == null)
          return;

        this.getDataFromApi(this.uuid, this.mobile_type);
        return this.mobile_view
      },
      set (value) {
         this.$emit('input', value)
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
    },
    methods:{
      
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
      setSubTitle(mobile_type){
        if(mobile_type == 'realestate')
          this.sub_title = this.$t('Realestate');
        else if (mobile_type == 'vehicle')
          this.sub_title = this.$t('Vehicle');
        else if (mobile_type == 'cellphone')
          this.sub_title = this.$t('cellPhone');
        else
          this.sub_title = this.$t('error');
      },
      parseString(data) {
        if(data == null || data == 'null')
          return false;
        else if ( String(data) == 'true')
          return true;
        else
          return false;
      },
      
      getDataFromApi(uuid, mobile_type){

        this.setSubTitle(mobile_type);
        
        //데이터 가져오기
        if(mobile_type == 'realestate')
          this.getRealestate();
        else if(mobile_type == 'vehicle')
          this.getVehicle();
        else
          this.getCellPhone();
      },
      getRealestate(){
        const frm = new FormData()
        frm.append('uuid', this.uuid);
        frm.append('dealer_email', this.user.email);

        this.$http.post('/api/realestate_getBuilding', frm).then((response) => {
          
          if ( response.data.status == 'error')
          {
            console.log(this.$t( response.data.messages))
            return;
          }
          else
          {
            this.building = response.data;
            console.log(this.building);

          }    
        }).catch(error => {
          console.log(error.response)
           this.$swal.fire({
                icon: 'error',
                title: this.$t(error.response.data.messages),              
            })
            return;
        });

         this.$http.post('/api/realestate_getImage', frm).then((response) => {
          
          if ( response.data.status == 'error')
          {
            console.log(this.$t( response.data.messages))
            return;
          }
          else
          {
            this.preview = response.data;
          }    
        }).catch(error => {
          console.log(error.response)
           this.$swal.fire({
                icon: 'error',
                title: this.$t(error.response.data.messages),              
            })
            return;
        });

        this.$http.post('/api/realestate_getOption', frm).then((response) => {
          
          if ( response.data.status == 'error')
          {
              console.log(this.$t( response.data.messages))
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
                title: this.$t(error.response.data.messages),              
            })
            return;
        });
      },

      getVehicle(){
        const frm = new FormData()
        frm.append('uuid', this.uuid);
        frm.append('dealer_email', this.user.email);

        this.$http.post('/api/vehicle_getBuilding', frm).then((response) => {
          
          if ( response.data.status == 'error')
          {
            console.log(this.$t( response.data.messages))
            return;
          }
          else
          {
            this.building = response.data;
            console.log(this.building);

          }    
        }).catch(error => {
          console.log(error.response)
           this.$swal.fire({
                icon: 'error',
                title: this.$t(error.response.data.messages),              
            })
            return;
        });

         this.$http.post('/api/vehicle_getImage', frm).then((response) => {
          
          if ( response.data.status == 'error')
          {
            console.log(this.$t( response.data.messages))
            return;
          }
          else
          {
            this.preview = response.data;
          }    
        }).catch(error => {
          console.log(error.response)
           this.$swal.fire({
                icon: 'error',
                title: this.$t(error.response.data.messages),              
            })
            return;
        });

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
      },

      getCellPhone(){
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

        this.setHeaders()

        this.$http.get('/api/getCellPhone_plan').then((response) => {
          
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
            this.plan = response.data;
            console.log(this.plan)
          }    
        }).catch(error => {
          console.log(error.response)
           this.$swal.fire({
                icon: 'error',
                title: this.$t(error.response.data.messages),              
            })
            
            return;
        });

        this.$http.get('/api/getCellPhone_addons').then((response) => {
          
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
            
            this.addons = response.data;
            console.log(this.addons)
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
      setHeaders(){
         this.plan_headers =  [
          { text: this.$t('CellPhone_Plan_subject'), },
          { text: this.$t('CellPhone_Plan_call_text'),},
          { text: this.$t('CellPhone_Plan_Data'),},
          { text: this.$t('CellPhone_Plan_features'),},
          { text: this.$t('CellPhone_Plan_price'),},
        ];

         this.addons_headers =  [
          { text: this.$t('CellPhone_addons_type'), },
          { text: this.$t('CellPhone_addons_subject'),},
          { text: this.$t('CellPhone_addons_description'),},
          { text: this.$t('CellPhone_addons_more'),},
          { text: this.$t('CellPhone_addons_price'),},
        ]
      },

      changeMakers(){
        if ( this.building.maker != '')
        {
          this.getDevice();
        }
      },
      close(){
          this.$emit('closemodal')
       } 
    }
  }
  

</script>

<style lang="sass">
  .long-data
    max-width: 100px
    white-space: nowrap
    overflow: hidden
    text-overflow: ellipsis
    
</style>