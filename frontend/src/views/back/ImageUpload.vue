<template>
  <v-container
    id="ImageUpload"
    fluid
    tag="section"
  >

<base-material-card>
  <template v-slot:heading>
    <div class="display-2 font-weight-light">
      {{$t('realestate_image')}}
    </div>

    <div class="subtitle-1 font-weight-light">
      {{$t('realestate_image_sub')}}
    </div>
  </template>
  <v-row cols="12">
    <v-col cols="6" >
    <v-card >
      <v-container fluid>
        <v-carousel
        cycle
        height="350"
        hide-delimiter-background
        show-arrows-on-hover
        >
          <v-carousel-item
          v-for="(slide, i) in slides"
          :key="i"
          >
            <v-sheet
            :color="colors[i]"
            height="100%"
            >
              <v-row
              class="fill-height"
              align="center"
              justify="center"
              >
              <div class="display-3">{{ slide }} Slide</div>
            </v-row>
          </v-sheet>
          </v-carousel-item>
        </v-carousel>
      </v-container>
    </v-card>
  </v-col>
    
  <v-col>
    <v-row>
      <v-col cols="12" >
        <v-row>
          <v-col cols="6">
            <v-file-input v-for="n in 6" :key="n"
              :rules="rules"
              accept="image/png, image/jpeg, image/bmp"
              placeholder="Pick an avatar"
              prepend-icon="mdi-camera"
              :id="n+''"
              show-size
              ></v-file-input>
              </v-col>
              <v-col cols="6">
                <v-file-input v-for="n in 6" :key="n"
                :rules="rules"
                accept="image/png, image/jpeg, image/bmp"
                placeholder="Pick an avatar"
                prepend-icon="mdi-camera"
                :id="n+5+''"
                show-size
                ></v-file-input>
              </v-col>
            </v-row>
          </v-col>
        </v-row>
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
    props:['uuid'],
    name:'ImageUpload',
    data () {
      return {
        uuid:'',
        rules: [value => !value || value.size < 2000000 || 'Avatar size should be less than 2 MB!',],
        image:[],
        colors: [
          'indigo',
          'warning',
          'pink darken-2',
          'red lighten-1',
          'deep-purple accent-4',
          'indigo',
          'warning',
          'pink darken-2',
          'red lighten-1',
          'deep-purple accent-4',
        ],
        slides: [
          'First',
          'Second',
          'Third',
          'Fourth',
          'Fifth',
          'First',
          'Second',
          'Third',
          'Fourth',
          'Fifth',
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
      else
      {
      }

    },
    methods:{
      update() {
        if ( this.uuid == null || this.uuid == "")
        {
           this.$swal.fire({
                icon: 'error',
                title: '매물을 먼저 등록해주세요',              
            })
          return;
        }
        
      }
    }
  }
  

</script>
