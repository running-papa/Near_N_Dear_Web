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
        <v-switch class="ma-2" :label="$t('pet')"></v-switch>
        <v-switch class="ma-2" :label="$t('internet')"></v-switch>
        <v-switch class="ma-2" :label="$t('snow_removal')"></v-switch>
        <v-switch class="ma-2" :label="$t('laundry')"></v-switch>
        <v-switch class="ma-2" :label="$t('dryer')"></v-switch>
        <v-switch class="ma-2" :label="$t('heation')"></v-switch>
        <v-switch class="ma-2" :label="$t('cooling')"></v-switch>
        <v-switch class="ma-2" :label="$t('refrigerator')"></v-switch>
    </v-col>
    <v-col cols="6" >
        <v-switch class="ma-2" :label="$t('dishwasher')"></v-switch>
        <v-switch class="ma-2" :label="$t('oven')"></v-switch>
        <v-switch class="ma-2" :label="$t('full_fumiture')"></v-switch>
        <v-switch class="ma-2" :label="$t('Amenities')"></v-switch>
        <v-switch class="ma-2" :label="$t('transit_friendly')"></v-switch>
        <v-switch class="ma-2" :label="$t('storage')"></v-switch>
        <v-switch class="ma-2" :label="$t('elevator')"></v-switch>
        <v-text-field
                :label="$t('other')"
                class="purple-input"
                prepend-icon="mdi-comment-check"
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

  </base-material-card>



</v-container>
</template>

<script>

  export default {
    name:'realestate_Option',
    data () {
      return {
       
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
