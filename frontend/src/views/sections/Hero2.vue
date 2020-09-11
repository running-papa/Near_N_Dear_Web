<template>
  <section id="hero2">
    <v-container class="fill-height px-4 py-8">
      <v-row>
        <v-col cols="6">
          <v-img :src="require('@/assets/bg_2.png')"/>
        </v-col>
        <v-col cols="6">
            <v-responsive class="d-flex align-center" height="100%" max-width="700" width="100%">
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
