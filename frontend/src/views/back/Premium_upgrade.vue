<template>
  <base-section
    id="pro-features"    
  >
    <v-img
      :src="require('@/assets/logo.png')"
      class="mx-auto mb-4"
      max-width="128"
    />

    <base-section-heading title="Premium Upgrade">
      Get the Premium version of <strong>Near N Dear</strong> and level up your a sale<br>Get More Sales Opportunities with Premium Upgrades.
    </base-section-heading>

    <v-container>
      <v-row
        align="center"
        justify="center"
      >
        <v-col
          cols="12"
          md="7"
        >
          <v-simple-table>
            <thead>
              <tr>
                <th />
                <th class="body-1 font-weight-bold text-center">
                  What's in the General?
                </th>
                <th class="body-1 font-weight-bold text-center">
                  What's in the Premium?
                </th>
              </tr>
            </thead>

            <tbody class="body-1">
              <tr
                v-for="([name, one, two], i) in features"
                :key="i"
              >
                <td v-text="name" />

                <td class="text-center font-weight-bold">
                  <template v-if="typeof one === 'boolean'">
                    <v-icon :color="one ? 'success' : 'error'">
                      mdi-{{ one ? 'check' : 'close' }}
                    </v-icon>
                  </template>

                  <template v-else>
                    {{ one }}
                  </template>
                </td>

                <td class="text-center font-weight-bold">
                  <template v-if="typeof two === 'boolean'">
                    <v-icon :color="two ? 'success' : 'error'">
                      mdi-{{ two ? 'check' : 'close' }}
                    </v-icon>
                  </template>

                  <template v-else>
                    {{ two }}
                  </template>
                </td>
              </tr>
            </tbody>
          </v-simple-table>
        </v-col>

        <v-col
          cols="12"
          md="4"
        >
          <v-card
            elevation="12"
            class="mb-4"
          >
            <!-- <base-img
              max-width="100%"
              height="250"
              src="https://source.unsplash.com/random"
            /> -->
            <v-carousel cycle show-arrows-on-hover hide-delimiter-background>
            <v-carousel-item  v-for="(slide, i) in preview" :key="i">
                <base-img :src="slide" 
                  max-width="100%"
                  height="500"
                  />
            </v-carousel-item>
            </v-carousel>
          </v-card>

          <div class="text-center">
            <base-btn
              :tile="false"
              color="primary"
              href="https://store.vuetifyjs.com/product/zero-theme-pro/?ref=vtyd-pro-page-features"
              rounded
            >
              Buy Premium Now

              <v-icon right>
                mdi-rocket
              </v-icon>
            </base-btn>
          </div>
        </v-col>
      </v-row>
    </v-container>
  </base-section>
</template>

<script>
  export default {
    name: 'Premium_upgrade',

    data: () => ({
      features: [
        ['Register for sale(mon)', 10, '40+'],
        ['Fee', '3.3%', '3.1%'],
        ['sale registration page', true, true],
        ['provision of statistics for sale', false, true],
        ['Premium Tab', false, true],
        ['Price', 'Free', '$99'],
      ],
      preview:[
        require(`@/assets/article-1.jpg`),
        require(`@/assets/article-2.jpg`),
        require(`@/assets/article-3.jpg`),
      ]
    }),
  }
</script>
