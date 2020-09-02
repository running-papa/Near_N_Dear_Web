<template>
  <base-section id="map" space="0">
    <iframe
      allowfullscreen
      aria-hidden="false"
      frameborder="0"
      height="500"
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58097.43957899844!2d-123.11716999996449!3d49.240111180051194!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x548673f143a94fb3%3A0xbb9196ea9b81f38b!2z7LqQ64KY64ukIOu4jOumrO2LsOyLnOy7rOufvOu5hOyVhCDrsLTsv6DrsoQ!5e0!3m2!1sko!2skr!4v1598959523690!5m2!1sko!2skr"
      style="border:0; display: block;"
      tabindex="0"
      width="100%"
    />
  </base-section>
</template>

<script>
export default {
  name: "SectionMap",

  provide: {
    heading: { align: "center" },
  },
};
</script>
