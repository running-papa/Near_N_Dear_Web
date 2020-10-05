<template>
<section id="login">
  <v-img
    :height="$vuetify.breakpoint.mdAndUp ? 1024 : 800"
    :src="require('@/assets/login.jpg')"
    class="white--text"
    gradient="to right, rgba(5, 11, 31, .6), rgba(5, 11, 31, .6)"
  >
    <v-container > 
      <v-row     
        align="start"
        justify="center"
        
      >
        <v-col
          cols="6"
          md="6"
        >
          <base-material-card
            color="primary"
            class="px-3 py-5"
            v-if="isResister==false"
            
          >
            <template v-slot:heading>
              <div class="display-2 text-center">
                {{$t('login_title')}}
              </div>
            </template>
            <v-card-text>
                <v-form>
                  <v-text-field
                    :label="$t('register_email')"
                    name="login"
                    prepend-icon="mdi-account"
                    type="text"
                    v-model="user_login.email"
                  />

                  <v-text-field
                    id="password"
                    :label="$t('register_password')"
                    name="password"
                    prepend-icon="mdi-lock"
                    type="password"
                    v-model="user_login.password"
                    minlength ="6"
                    maxlength="15"
                  />
                </v-form>
                <v-card-actions>
                  
                  <v-btn text color="primary" @click="changeRegister(true)">{{$t('login_register')}}</v-btn>
                  <v-spacer />
                  <v-btn color="primary" @click="Login()">{{$t('login_login')}}</v-btn>
              </v-card-actions>
              </v-card-text>
          </base-material-card>
          <base-material-card
            color="info"
            class="px-3 py-5"
            v-else
          >
            <template v-slot:heading>
              <div class="display-2 text-center">         
                {{$t('register_title')}}
              </div>
            </template>
            <v-card-text>
              <v-form>
                <v-row justify="space-around">
                  <v-radio-group  v-model="user_register.user_type" row>
                      <v-radio
                        v-for="type in types"
                        :key="type"
                        :label="type"
                        :value="type"
                        color="info"
                        @change="typeInfo(type)"
                      ></v-radio>
                    </v-radio-group>
                  </v-row>
                  <v-text-field
                    :label="$t('register_email')"
                    name="email"
                    prepend-icon="mdi-account"
                    type="text"
                    color="info"
                    v-model="user_register.email"
                  />
                  <v-text-field
                    id="name"
                    :label="$t('register_name')"
                    name="name"
                    prepend-icon="mdi-face"
                    type="text"
                    color="info"
                    v-model="user_register.name"
                  />
                  <v-text-field
                    id="password"
                    :label="$t('register_password')"
                    name="password"
                    prepend-icon="mdi-lock"
                    type="password"
                    color="info"
                    v-model="user_register.password"
                    minlength ="6"
                    maxlength="15"
                  />
                  <v-text-field
                    id="password_confirm"
                    :label="$t('register_password_confirmation')"
                    name="password_confirmation"
                    prepend-icon="mdi-lock"
                    type="password"
                    color="info"
                    v-model="user_register.password_confirmation"
                    minlength ="6"
                    maxlength="15"
                  />
                </v-form>
                <v-row justify="center">
                  <base-body space="5" justify="center">
                  {{$t('register_privacy_text1')}}
                  <v-btn text small color="info" @click="showmodal('privacy')">{{$t('register_privacy')}}</v-btn> 
                  {{$t('register_privacy_text2')}}
                  <v-btn text small color="info" @click="showmodal('term')">{{$t('register_term')}}</v-btn> 
                  {{$t('register_privacy_text3')}}
                  </base-body>
                </v-row>
                <v-card-actions>  
                  <v-btn text color="info" @click="changeRegister(false)">{{$t('register_login')}}</v-btn>
                  <v-spacer />
                  <v-btn color="info" @click="Register()">{{$t('register_register')}}</v-btn>
                </v-card-actions>
               
              </v-card-text>
          </base-material-card>
        </v-col>
      </v-row>

      <v-dialog v-if="this.$vuetify.breakpoint.width > this.mobileBreakPoint? modal_width='800px' : modal_width='300px'" v-model="dialog_Privacy" :width="modal_width">
        <Privacy v-on:closemodal="closemodal"></Privacy>
        
      </v-dialog>
      <v-dialog v-if="this.$vuetify.breakpoint.width > this.mobileBreakPoint? modal_width='800px' : modal_width='300px'" v-model="dialog_TermsofUse" :width="modal_width">
        <TermsofUse v-on:closemodal="closemodal"></TermsofUse>
      </v-dialog>
    </v-container>
  </v-img>
  
</section>
</template>
 jh
<script>
import TermsofUse from "./TermsofUse";
import Privacy from "./Privacy";

  export default {
    name: 'Login',
    data() {
      return {
        mobileBreakPoint:768,
        modal_width:'',
        isResister : false,
        user_login : {
          email: '',
          password:'',
        },
        user_register: {
          email: '',
          name:'',
          password:'',
          password_confirmation:'',
          user_type:'',
        },
        user:{},
        
        types:['Dealer','Landing serve'],
        dialog_Privacy:false,
        dialog_TermsofUse:false,

      }
    },
    props: {
      source: String,
    },
    components: {
      TermsofUse,
      Privacy
    },
    mounted() {
      
      if ( this.$store.state.accessToken != null && this.$store.state.user != null)
      {
        this.isResister = false;
        this.$router.replace('/page/dashboard');
      }
    },
    methods:{
      showmodal(type){
        if (type == 'privacy')
        {
          this.dialog_Privacy = true;
        }
        else
        {
          this.dialog_TermsofUse = true;
        }
      },
      closemodal(){
        this.dialog_Privacy = false;
        this.dialog_TermsofUse = false;
      },
      Login(){
        if (this.validator('login') == false)
          return;

        const email = this.user_login.email;
        const password = this.user_login.password;

        const frm = new FormData()
        frm.append('email', email);
        frm.append('password', password);

        this.$http.post('/api/auth/login', frm).then((response) => {
          
          if ( response.data.status == 'error')
          {
              
              
              this.$swal.fire({
                icon: 'error',
                title: this.$t( response.data.messages),              
              })
              return;
          }
          else
          {
            this.$swal.fire({
              icon: 'success',
              title: this.$t('login_success'),
            });

            
            this.isResister = false;
            this.$store.commit('LOGIN', response.data);
            this.$http.defaults.headers.common['Authorization'] = `Bearer ${response.data.access_token}`;
            this.$router.replace('/page/dashboard');
          }    
        }).catch(error => {
          console.log(error.response)
           this.$swal.fire({
                icon: 'error',
                title: this.$t(error.response.data.messages),              
            })

            return;
        });
        
      },
      typeInfo(type){
        
        let title = '';
        if ( type == 'Dealer')
        {
            title = this.$t('type_dealer')
        }
        else
        {
            title = this.$t('type_landing serve')
        }

        this.$swal.fire({
          icon: 'info',
          title: title,              
        })
      },
      changeRegister(check){
        this.isResister = check;

        if ( check == true) { //Register
          this.user_register.email = '';
          this.user_register.name = '';
          this.user_register.password = '';
          this.user_register.password_confirmation = '';

        }
        else
        {
          this.user_login.email = '';
          this.user_login.password = '';
        }
      },
      Register(){
        
        if (this.validator('register') == false)
          return;

        const frm = new FormData()
        frm.append('email', this.user_register.email);
        frm.append('name', this.user_register.name);
        frm.append('password', this.user_register.password);
        frm.append('password_confirmation', this.user_register.password_confirmation);
        
        if ( this.user_register.user_type == 'Dealer')
          frm.append('user_level', "50");
        else
          frm.append('user_level', "30");

        this.$http.post('/api/auth/register', frm).then((response) => {

          alert(JSON.stringify(response.data))
          if ( response.data.status == 'error')
          {
              this.$swal.fire({
                icon: 'error',
                title: this.$t(response.data.messages),              
              })
          }
          else
          {
            this.$swal.fire({
              icon: 'success',
              title: this.$t('register_success'),
            });
             this.isResister = false;
          }    
        }).catch(error => {
          console.log(error.response)
           this.$swal.fire({
                icon: 'error',
                title: error.messages[0],              
              })
         });
      },
      validator(type){
        //회원가입 유효성 검사
        if ( type == 'register')
        {
          let emil = this.user_register.email;
          let name = this.user_register.name;
          let password = this.user_register.password;
          let password_confirmation = this.user_register.password_confirmation;
          let user_type = this.user_register.user_type;

          if ( emil == '' || name == '' || password == '' || password_confirmation == '' || user_type== '')
          {
              this.$swal.fire({
                icon: 'error',
                title: this.$t('register_validator_null'),              
              })
              return false;
          }
          
          if ( password.length < 6 || password.length > 15) 
          {
            this.$swal.fire({
                icon: 'error',
                title: this.$t('register_validator_pw_length'),              
              })
              return false;
          }


          if ( password != password_confirmation)
          {
            this.$swal.fire({
                icon: 'error',
                title: this.$t('register_validator_pw_confirm'),              
              })
              return false;
          }
        }
        //로그인 유효성 검사
        else
        {
          let emil = this.user_login.email;
          let password = this.user_login.password;
           if ( emil == ''|| password == '' )
          {
              this.$swal.fire({
                icon: 'error',
                title: this.$t('register_validator_null'),              
              })
              return false;
          }
          
          if ( password.length < 6 || password.length > 15) 
          {
            this.$swal.fire({
                icon: 'error',
                title: this.$t('register_validator_pw_length'),              
              })
              return false;
          }  
        }
      },
    }
  }
</script>
