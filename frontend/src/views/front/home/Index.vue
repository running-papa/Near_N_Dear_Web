
<script>
// Extensions
import View from "@/views/View";

// Mixins
import LoadSections from "@/mixins/load-sections";

export default {
  name: "Home",

  metaInfo: { title: "Home" },

  extends: View,

  mixins: [
    LoadSections([
      "hero",
      "hero2",
      "hero3",
      "hero4",
      "theme-features",
      // 'features',
      // 'contact-us',
      "affiliates",
      // "social-media",
      // "keep-in-touch",
      // "newsletter",
      // "pro-features",
      "info",
    ]),
  ],

  props: {
    id: {
      type: String,
      default: "home",
    },
  },
};
</script>
