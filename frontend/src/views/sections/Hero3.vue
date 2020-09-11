<template>
  <section id="hero3">
    <v-img 
    :src="require('@/assets/bg_3.jpg')"
    gradient="to right, rgba(5, 11, 31, .7), rgba(5, 11, 31, .7)">

      <v-container class="fill-height px-4 py-8">
        <v-row>
          <v-col cols="6">
          </v-col>
          <v-col cols="6">
             <v-responsive class="d-flex align-center" height="100%" max-width="700" width="100%">
              <base-heading :title="$t('home_text_search_car')" size="display-4" />
              
              <p class="display-2 font-weight-light white--text">
                {{$t('home_text_search_car_sub1')}}<br/>
                {{$t('home_text_search_car_sub2')}}<br/>
                <strong>{{$t('home_text_search_car_sub3')}}</strong>
              </p>
              
            </v-responsive>
          </v-col>

        </v-row>
      </v-container>
    </v-img>
  </section>
</template>

<script>
export default {
  name: "SectionHero3",

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
