<template>
  <base-section id="theme-features">
    <base-section-heading title="Near N Dear">{{ $t('features') }}</base-section-heading>

    <v-container>
      <v-row>
        <v-col v-for="(feature, i) in features" :key="i" cols="12" md="6">
          <base-avatar-card v-bind="feature" align="left" horizontal></base-avatar-card>
        </v-col>
      </v-row>
    </v-container>
  </base-section>
</template>

<script>
export default {
  name: "SectionThemeFeatures",

  data: () => ({
    title1 : 'asdasd',
    title2 : 'asd',
    title3 : 'asd',
    title4 : 'asd',

    features: [],
  }),

  created() {
    let title1 = this.$t('features_title1');
    let title2 = this.$t('features_title2');
    let title3 = this.$t('features_title3');
    let title4 = this.$t('features_title4');
    
      this.features = [ 
      {
        title: title1,
        icon: "mdi-home",
      },
      {
        title: title2,
        icon: "mdi-car",
      },
      {
        title: title3,
        icon: "mdi-cellphone",
      },
      {
        title: title4,
        icon: "mdi-thumb-up",
      },
    ]
  },
};
</script>
