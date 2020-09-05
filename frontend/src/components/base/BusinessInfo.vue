<template>
  <v-theme-provider :dark="dark">
    <div>
      <base-info-card
        title="우리와 협력해 주세요."
        pace="6"
      >우리는 캐나다 전역의 부동산과 캐나다 전역의 중고차 매매 업체를 찾고 있습니다. 저희와 협력을 해주시면 더 낮은 수수료와 더많은 판매의 기회를 얻을 수 있습니다. 우리에게 연락해 주세요.</base-info-card>

      <base-business-contact dense />
    </div>
  </v-theme-provider>
</template>

<script>
export default {
  name: "BaseBusinessInfo",

  props: { dark: Boolean },

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
