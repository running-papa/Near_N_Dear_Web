<template>
  <section id="hero2">
    <v-container class="px-12 py-4 pb-0">
      <v-row no-gutters>
        <v-col cols="6" no-gutters class="pt-6 pb-0">
          <v-img :src="require('@/assets/bg_2.png')" height="100%" />
        </v-col>
        <v-col cols="6">
            <v-responsive class="d-flex align-center" height="100%"  width="100%">
            <p class="display-4 font-weight-light">{{$t('home_text_search_home')}}</p>
            <p class="display-2 font-weight-light">
              {{$t('home_text_search_sub1')}} 
              <br/><strong>
              {{$t('home_text_search_sub2')}}</strong></p>
            
          </v-responsive>
        </v-col>

      </v-row>
    </v-container>

    
  </section>
</template>

<script>
export default {
  name: "SectionHero2",

  provide: {
    theme: { isDark: true },
  },

  computed: {
    minHeight() {
      const height = this.$vuetify.breakpoint.mdAndUp ? "40vh" : "40vh";
      
      return `calc(${height} - ${this.$vuetify.application.top}px)`;
    },
  },
};
</script>
<style lang="sass">
.top-padding
    padding-top : 100px
</style>
