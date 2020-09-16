<template>
  <v-app-bar
    id="app-bar"
    absolute
    app
    color="transparent"
    flat
    height="75"
  >
    <v-btn
      class="mr-3"
      elevation="1"
      fab
      small
      @click="setDrawer(!drawer)"
    >
      <v-icon v-if="value">
        mdi-view-quilt
      </v-icon>

      <v-icon v-else>
        mdi-dots-vertical
      </v-icon>
    </v-btn>

    <v-toolbar-title
      class="hidden-sm-and-down font-weight-light"
      v-text="$route.name"
    />
    <v-spacer />
    <div class="mx-3" />
    <v-col cols="auto">
      <v-select
            :items="['English', 'Korean', 'French', 'Chinese(Simplified)', 'Chinese(Traditional)']"
            label="Languege"
            height=20
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
      </v-col>

    <v-btn
      class="ml-2"
      min-width="0"
      text
      to="/"
    >
     <base-img
        :src="require('@/assets/logo.png')"
        max-width="40"
      />
    </v-btn>
    <v-btn
      class="ml-2"
      min-width="0"
      text
      to="/page/dashboard"
    >
      <v-icon>mdi-home</v-icon>
    </v-btn>

    <v-btn
      class="ml-2"
      min-width="0"
      text
      to="/page/user"
    >
      <v-icon>mdi-account</v-icon>
      
    </v-btn>
    <v-btn
      class="ml-2"
      min-width="0"
      text
      @click="LogOut()"
    >
      <v-icon>mdi-logout</v-icon>
      
    </v-btn>
    
  </v-app-bar>
</template>

<script>
  // Components
  import { VHover, VListItem } from 'vuetify/lib'

  // Utilities
  import { mapState, mapMutations } from 'vuex'

  export default {
    name: 'DashboardCoreAppBar',

    components: {
      AppBarItem: {
        render (h) {
          return h(VHover, {
            scopedSlots: {
              default: ({ hover }) => {
                return h(VListItem, {
                  attrs: this.$attrs,
                  class: {
                    'black--text': !hover,
                    'white--text secondary elevation-12': hover,
                  },
                  props: {
                    activeClass: '',
                    dark: hover,
                    link: true,
                    ...this.$attrs,
                  },
                }, this.$slots.default)
              },
            },
          })
        },
      },
    },

    props: {
      value: {
        type: Boolean,
        default: false,
      },
    },

    data: () => ({
      notifications: [
        'Mike John Responded to your email',
        'You have 5 new tasks',
        'You\'re now friends with Andrew',
        'Another Notification',
        'Another one',
      ],
    }),

    computed: {
      ...mapState(['drawer']),
    },

    methods: {
      ...mapMutations({
        setDrawer: 'SET_DRAWER',
      }),
      LogOut(){
        
        this.$store.dispatch("LOGOUT").then(() => this.redirect())
      },
      redirect() {
        this.$router.replace('/');
      },
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
    },
  }
</script>
<style lang="sass">
  .v-select__selections input  
    width: 55px

</style>