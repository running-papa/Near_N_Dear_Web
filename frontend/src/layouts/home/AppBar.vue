<template>
  <div>
    <v-app-bar id="home-app-bar" app color="white" elevation="1" height="80">
      <base-img
        :src="require('@/assets/logo.png')"
        class="mr-3 hidden-xs-only"
        contain
        max-width="140"
        width="100%"
      />
      
      <v-spacer />

      <div>
        <v-tabs class="hidden-sm-and-down" optional>
          <v-tab
            v-for="(name, i) in items"
            :key="i"
            :to="{ name }"
            :exact="name === 'Home'"
            :ripple="false"
            active-class="text--primary"
            class="font-weight-bold" 
            min-width="96"
            text
          >{{ name }}</v-tab>
          <v-cols cols="auto">
          <v-select
                :items="['English', 'Korean', 'French', 'Chinese(Simplified)', 'Chinese(Traditional)']"
                label="Languege"
                height=45
                autowidth
                dense
              >
              <template v-slot:item="{ item, attrs, on }">
                <v-list-item
                  v-bind="attrs"
                  v-on="on"
                  @click="changeLanguege(item)"
                >
                  <v-list-item-title
                    :id="attrs['aria-labelledby']"
                    v-text="item"
                   
                  ></v-list-item-title>
                </v-list-item>
              </template>
            </v-select>
            </v-cols>
        </v-tabs>
        
        
      </div>

      <v-app-bar-nav-icon class="hidden-md-and-up" @click="drawer = !drawer" />
    </v-app-bar>

    <home-drawer v-model="drawer" :items="items" />
  </div>
</template>

<script>
export default {
  name: "HomeAppBar",

  components: {
    HomeDrawer: () => import("./Drawer"),
  },

  data: () => ({
    drawer: null,
    items: ["Home", "About", "Contact", "Login"],
    //items: [],
   
  }),

  created() {
    // let home = this.$t('home');
    // let about = this.$t('about');
    // let contact = this.$t('contact');
    // let login = this.$t('login');
    
    // this.items = [home,about,contact,login];
  },
  methods:{
    changeLanguege(type){
      let local = '';

      if(type == 'English')
        local = 'en'
      else if(type == 'Korean')
        local = 'ko'
      else if(type == 'French')
        local = 'fr'
      else if(type == 'Chinese(Simplified)')
        local = 'zhHans'  //중국어 간체
      else if(type == 'Chinese(Traditional)')
        local = 'zhHant' //중국어 번체
      else
        local = 'en'


      this.$i18n.locale = local;  
    }
  }
};
</script>

<style lang="sass">
#home-app-bar
  .v-tabs-slider
    max-width: 24px
    margin: 0 auto

    .v-tab
      &::before
        display: none

  .v-select__selections input  
    width: 55px
  
  
  
</style>
