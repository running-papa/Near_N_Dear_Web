<template>
  <section id="hero">
    <v-img
      :height="$vuetify.breakpoint.mdAndUp ? 800 : 350"
      :src="require('@/assets/bg_1.jpg')"
      class="white--text"
      gradient="to right, rgba(5, 11, 31, .4), rgba(5, 11, 31, .4)"
    >
      <v-container class="fill-height px-4 py-8">
        <v-responsive class="d-flex align-center" height="100%" max-width="700" width="100%">
          <base-heading :title="this.$t('home_text_main')" size="display-4" />

          <base-body>{{$t('home_text_sub')}}</base-body>

          <div
            :class="$vuetify.breakpoint.smAndDown ? 'flex-column align-start' : 'align-center'"
            class="d-flex flex-wrap"
          >
            <a
              href="https://itunes.apple.com/kr/app/id1095533900?l=ko&amp;ls=1&amp;mt=8"
              target="_blank"
            >
              <v-img :src="require('@/assets/ios.png')" height="61" class="grey darken-4"></v-img>
            </a>

            <span class="font-weight-bold ml-6 mr-4 my-4">or</span>

            <a
              href="https://play.google.com/store/apps/details?id=net.orizinal.subway"
              target="_blank"
            >
              <v-img :src="require('@/assets/and.png')" height="61" class="grey darken-4"></v-img>
            </a>
          </div>
        </v-responsive>
      </v-container>
    </v-img>
  </section>
</template>

<script>
export default {
  name: "SectionHero",

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
