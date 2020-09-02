<template>
  <base-section id="theme-features">
    <base-section-heading title="Near N Dear">이민을 희망하는 모든이들의 도움을 주는 혁신적인 시스템</base-section-heading>

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
    features: [
      {
        title: "당신이 살고 싶은 집을 선택하세요.",
        icon: "mdi-fountain-pen-tip",
      },
      {
        title: "당신이 구매할 차를 선택하세요.",
        icon: "mdi-cellphone",
      },
      {
        // color: "primary",
        // dark: true,
        title: "휴대폰이 필요한가요?",
        icon: "mdi-pencil-box-outline",
      },
      {
        title: "모든 전문 영어 서비스는 무료입니다.",
        icon: "mdi-image-size-select-actual",
      },
    ],
  }),
};
</script>
