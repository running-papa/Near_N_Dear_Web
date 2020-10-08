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
          show-arrows-on-hover
        >
          <v-carousel-item v-if="preview == ''" 
          >
              <v-row   
              >
              <v-img :src="require('@/assets/noimage.png')" 
                spect-ratio="1"
                class="grey lighten-2"
                max-width="95%"
                />
               
            </v-row>
          </v-carousel-item>
          <v-carousel-item v-else
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
                max-width="95%"
                />
            </v-row>
          
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
           
            <v-file-input v-for="n in 5" :key="n"
              :rules="rules"
              accept="image/png, image/jpeg, image/bmp"
              placeholder="Pick an avatar"
              prepend-icon="mdi-camera"
              show-size
              @change="onImageChange"
              type="file"
              ref="image"
              v-model="images[n-1]"
              ></v-file-input>
              </v-col>
              <v-col cols="6">
                <v-file-input v-for="n in 5" :key="n"
                :rules="rules"
                accept="image/png, image/jpeg, image/bmp"
                placeholder="Pick an realestate"
                prepend-icon="mdi-camera"
                show-size
                v-model="images[n+4]"
                @change="onImageChange"
                type="file"
                ref="image"
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
        user:{},
        rules: [value => !value || value.size < 5000000 || 'Avatar size should be less than 5 MB!',],
        images:[],
        preview:[],
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
        slides: [],
          
        
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

        this.$http.post('/api/realestate_getImage', frm).then((response) => {
          
          if ( response.data.status == 'error')
          {
            console.log(this.$t( response.data.messages))
            return;
          }
          else
          {
            this.images = response.data;
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
        frm.append('image0', this.images[0]);
        frm.append('image1', this.images[1]);
        frm.append('image2', this.images[2]);
        frm.append('image3', this.images[3]);
        frm.append('image4', this.images[4]);
        frm.append('image5', this.images[5]);
        frm.append('image6', this.images[6]);
        frm.append('image7', this.images[7]);
        frm.append('image8', this.images[8]);
        frm.append('image9', this.images[9]);

        frm.append('dealer_email', this.user.email);

        this.$http.post('/api/realestate_images', frm, {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        }).then((response) => {
          console.log(response.data)

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
            this.preview = response.data.data
          }    
        })
        .catch(error => {
          if ( error.response == undefined)
            return;

          console.log(error.response)
           this.$swal.fire({
                icon: 'error',
                title: error.response.statusText,              
              })
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
      onImageChange(e) {  
      },
    }
  }
  

</script>
