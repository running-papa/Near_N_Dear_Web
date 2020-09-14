<template>
  <v-row justify="center">
      <v-cart>
        <base-material-card
            color="warning"
            class="px-5 py-10"
            >
          <template v-slot:heading>
            <div class="display-2 font-weight-light">
               AGREEMENT TO TERMSi
            </div>
          </template>
          <v-card-text>
              <div class="display-1 font-weight-light">
                These Terms of Use constitute a legally binding agreement made between you, whether personally or on behalf of an entity (“you”) and Near N Dear ("Company", “we”, “us”, or “our”), concerning your access to and use of the http://www.nearndear.ca website as well as any other media form, media channel, mobile website or mobile application related, linked, or otherwise connected thereto (collectively, the “Site”). You agree that by accessing the Site, you have read, understood, and agreed to be bound by all of these Terms of Use. IF YOU DO NOT AGREE WITH ALL OF THESE TERMS OF USE, THEN YOU ARE EXPRESSLY PROHIBITED FROM USING THE SITE AND YOU MUST DISCONTINUE USE IMMEDIATELY.</br>
                Supplemental terms and conditions or documents that may be posted on the Site from time to time are hereby expressly incorporated herein by reference. We reserve the right, in our sole discretion, to make changes or modifications to these Terms of Use at any time and for any reason. We will alert you about any changes by updating the “Last updated” date of these Terms of Use, and you waive any right to receive specific notice of each such change. It is your responsibility to periodically review these Terms of Use to stay informed of updates. You will be subject to, and will be deemed to have been made aware of and to have accepted, the changes in any revised Terms of Use by your continued use of the Site after the date such revised Terms of Use are posted.</br>
                The information provided on the Site is not intended for distribution to or use by any person or entity in any jurisdiction or country where such distribution or use would be contrary to law or regulation or which would subject us to any registration requirement within such jurisdiction or country. Accordingly, those persons who choose to access the Site from other locations do so on their own initiative and are solely responsible for compliance with local laws, if and to the extent local laws are applicable.</br>
                The Executive hereby assigns to the Company all rights, including, without limitation, copyrights, patents, trade secret rights, and other intellectual property rights associated with any ideas, concepts, techniques, inventions, processes, works of authorship, Confidential Information or trade secrets (i) developed or created by the Executive, solely or jointly with others, during the course of performing work for or on behalf of the Company or any subsidiary of the Company, whether as an employee or independent contractor, at any time during the Employment Period, (ii) that the Executive conceives, develops, discovers or makes in whole or in part during the Executive’s employment by the Company that relate to the business of the Company or any subsidiary of the Company or the actual or demonstrably anticipated research or development of the Company or any subsidiary of the Company, (iii) that the Executive conceives, develops, discovers or makes in whole or in part during or after the Executive’s employment by the Company that are made through the use of any of the equipment, facilities, supplies, trade secrets or time of the Company or any subsidiary of the Company, or that result from any work the Executive performs for the Company or any subsidiary of the Company or (iv) developed or created by the Executive, solely or jointly with others, at any time before the Employment Period, that relate to or involve the Company’s businesses (including, but not limited to, the business of the Company (as defined in Section 5(c) below)) (collectively, the “Work Product”). Without limiting the foregoing, to the extent possible, all software, compilations and other original works of authorship included in the Work Product will be considered a “work made for hire” as that term is defined in Title 17 of the United States Code. If, notwithstanding the foregoing, the Executive for any reason retains any right, title or interest in or relating to any Work Product, the Executive agrees promptly to assign, in writing and without any requirement of further consideration, all such right, title, and interest to the Company. Upon request of the Company at any time during or after the Employment Period, the Executive will take such further actions, including execution and delivery of instruments of conveyance, as may be appropriate to evidence, perfect, record or otherwise give full and proper effect to any assignments of rights under or pursuant to this Agreement. The Executive will promptly disclose to the Company any such Work Product in writing.</br>
                The Site is intended for users who are at least 18 years old. Persons under the age of 18 are not permitted to use or register for the Site. 
              </div>
          </v-card-text>
        </base-material-card>
        <base-material-card
            color="warning"
            class="px-5 py-3"
        >
          <template v-slot:heading>
            <div class="display-2 font-weight-light">
               INTELLECTUAL PROPERTY RIGHTS
            </div>
          </template>
          <v-card-text>
            Unless otherwise indicated, the Site is our proprietary property and all source code, databases, functionality, software, website designs, audio, video, text, photographs, and graphics on the Site (collectively, the “Content”) and the trademarks, service marks, and logos contained therein (the “Marks”) are owned or controlled by us or licensed to us, and are protected by copyright and trademark laws and various other intellectual property rights and unfair competition laws of the United States, international copyright laws, and international conventions. The Content and the Marks are provided on the Site “AS IS” for your information and personal use only. Except as expressly provided in these Terms of Use, no part of the Site and no Content or Marks may be copied, reproduced, aggregated, republished, uploaded, posted, publicly displayed, encoded, translated, transmitted, distributed, sold, licensed, or otherwise exploited for any commercial purpose whatsoever, without our express prior written permission.
            Provided that you are eligible to use the Site, you are granted a limited license to access and use the Site and to download or print a copy of any portion of the Content to which you have properly gained access solely for your personal, non-commercial use. We reserve all rights not expressly granted to you in and to the Site, the Content and the Marks.
          </v-card-text>
        </base-material-card>

      
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="info" text @click="close()">Agree</v-btn>
        </v-card-actions>
    </v-cart>
      
  </v-row>
</template>
<script>

  export default {
    name: 'TermsofUse',
    data() {
      return {
                items: [],
             }
    }, 
    
    methods: {
        close(){
            this.$emit('closemodal')
       } 
    }
  }
</script>