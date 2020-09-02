<template>
  <base-section id="about-our-product">
    <base-section-heading color="grey lighten-2" icon="mdi-vuetify" title="서비스 정보" />

    <v-container>
      <v-row>
        <v-col v-for="card in cards" :key="card.title" cols="12" md="4">
          <base-info-card v-bind="card" />
        </v-col>
      </v-row>
    </v-container>
  </base-section>
</template>

<script>
export default {
  name: "SectionAboutOurProduct",

  data: () => ({
    cards: [
      {
        title: "집 구매",
        subtitle: "현지 리얼터와의 전문영어 번역 서비스",
        text:
          "우리의 서비스는 고객이 쇼핑몰에서 상품을 구매하듯 집을 선택하고 마음에 드는 집을 리얼터와 연결 그리고 구매 하는데 필요한 전문영어 서비스를 제공한다.",
        callout: "01",
      },
      {
        title: "차 구매",
        subtitle: "현지 딜러와의 전문영어 번역 서비스",
        text:
          "우리의 서비스는 고객이 쇼핑몰에서 상품을 구매하듯 차을 선택하고 마음에 드는 차를 딜러와 연결 그리고 구매 하는데 필요한 전문영어 서비스를 제공한다.",
        callout: "02",
      },
      {
        title: "휴대폰 구매",
        subtitle: "현지 휴대폰 구매 서비스",
        text: "자체 라이센스 구입후 고객에게 저렴한 휴대폰 판매 기회 제공.",
        callout: "03",
      },
    ],
  }),
};
</script>
