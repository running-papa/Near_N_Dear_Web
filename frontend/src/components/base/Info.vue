<template>
  <v-theme-provider :dark="dark">
    <div>
      <base-img
        :src="require('@/assets/logo.png')"
        contain
        max-width="200"
        min-height="150"
        width="100%"
      />

      <base-title size="body-1" space="4" :title="$t('info_title')" weight="regular" />

      <base-body>{{$t('info_title_sub')}}</base-body>

      <base-btn class="mb-12" color="white" outlined>More Info</base-btn>
    </div>
  </v-theme-provider>
</template>

<script>
export default {
  name: "BaseInfo",

  props: {
    title: String,
    dark: Boolean,
  },

  data: () => ({
    business: [
      {
        icon: "mdi-map-marker-outline",
        title: "Address",
        text: "8553 N. Beach St. Ste. 227<br>Fort Worth, Texas 76137",
      },
      {
        icon: "mdi-cellphone",
        title: "Phone",
        text: "01 (800) 433 744<br>01 (800) 433 633",
      },
      {
        icon: "mdi-email",
        title: "Email",
        text: "john@vuetifyjs.com<br>heather@vuetifyjs.com",
      },
    ],
  }),
};
</script>
