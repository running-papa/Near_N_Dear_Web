<template>
  <v-container
    id="CellPhone_create"
    fluid
    tag="section"
  >
    <base-v-component
      :heading="$t('CellPhone_title')"
      link="components/simple-tables"
      
    />

    <building :uuid="uuid" @child="setuuid"/>``
    <!-- <imageUpload :uuid="uuid"/>
    <selectoption :uuid="uuid"/> -->



</v-container>
</template>

<script>
//import imageUpload from './Vehicle_ImageUpload'
import building from './CellPhone_Building'
//import selectoption from './Vehicle_SelectOption'

  export default {
    
    name:'CellPhone_create',
    data () {
      return {
        uuid: '',
      }
    },

    components:{
      //imageUpload,
      building,
      //selectoption,
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
