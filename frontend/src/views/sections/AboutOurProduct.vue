<template>
  <base-section id="about-our-product">
    <base-section-heading color="grey lighten-2" icon="mdi-shopping" :title="$t('about_product_title')" />

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
        subtitle: "구매에 필요한 전문영어 번역 서비스",
        text:
          "우리의 서비스는 고객이 쇼핑몰에서 상품을 구매하듯 집을 선택하고 마음에 드는 집을 리얼터와 연결 그리고 구매 하는데 필요한 전문영어 서비스를 제공합니다.",
        callout: "01",
      },
      {
        title: "차량 구매",
        subtitle: "현지 딜러와의 전문영어 번역 서비스",
        text:
          "우리의 서비스는 고객이 차량을 선택하고 현지 딜러와 구매에 필요한 전문영어 서비스를 제공합니다.",
        callout: "02",
      },
      {
        title: "휴대폰 구매",
        subtitle: "자체 라이센스",
        text: "자체 라이센스 구입되어 고객에게 저렴한 휴대폰 인터넷 판해 기회를 제공한다.",
        callout: "03",
      },
    ],
  }),
  created() {
    let title1 = this.$t('about_product_card_title1');
    let title1_sub = this.$t('about_product_card_title1_sub');
    let title1_text = this.$t('about_product_card_title1_text');
    
    let title2 = this.$t('about_product_card_title2');
    let title2_sub = this.$t('about_product_card_title2_sub');
    let title2_text = this.$t('about_product_card_title2_text');

    let title3 = this.$t('about_product_card_title3');
    let title3_sub = this.$t('about_product_card_title3_sub');
    let title3_text = this.$t('about_product_card_title3_text');

    
    this.cards = [ 
      {
        title: title1,
        subtitle: title1_sub,
        text:title1_text,
        callout: "01",
      },
      {
        title: title2,
        subtitle: title2_sub,
        text:title2_text,
        callout: "02",
      },
      {
        title: title3,
        subtitle: title3_sub,
        text:title3_text,
        callout: "03",
      },
  ]
  },
};
</script>
