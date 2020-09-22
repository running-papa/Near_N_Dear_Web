<template>
  <v-container
    id="Realestate_create"
    fluid
    tag="section"
  >
    <base-v-component
      :heading="$t('Realestate_title')"
      link="components/simple-tables"
    />

    <building/>
    <imageUpload/>
    <selectoption/>



</v-container>
</template>

<script>
import imageUpload from './ImageUpload'
import building from './Building'
import selectoption from './SelectOption'

  export default {
    name:'Realestate_create',
    data () {
      return {
        
      }
    },

    components:{
      imageUpload,
      building,
      selectoption,
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
