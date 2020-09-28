<template>
  <section class="mb-8 text-center">
    <h1
      class="font-weight-light mb-2 headline"
      v-text="`${heading}`"
    />

    <span
      class="font-weight-light subtitle-1"
    >
      Please checkout the
      <a
        :href="`https://vuetifyjs.com/${link}`"
        rel="noopener"
        target="_blank"
        class="secondary--text"
        style="text-decoration:none;"
      >
        full documentation
      </a>
    </span>

    <p>
    <h1
      class="font-weight-light mb-2 headline"
      v-text="`${heading1}`"
    />
  </section>
</template>

<script>
  export default {
    name: 'VComponent',

    props: {
      heading: {
        type: String,
        default: '',
      },
      link: {
        type: String,
        default: '',
      },
      heading1: {
        type: String,
        default: '',
      },
    },
  }
</script>
