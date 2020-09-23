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

    <building :uuid="uuid" @child="setuuid"/>
    <imageUpload :uuid="uuid"/>
    <selectoption :uuid="uuid"/>



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
        uuid: '',
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
      setuuid(uuid){
        this.uuid = uuid;
      }
    }
  }
  

</script>
