<template>
  <v-container
    id="mypage"
    fluid
    tag="section"
  >
    <v-row justify="center">
      <v-col
        cols="12"
        md="8"
      >
        <base-material-card>
          <template v-slot:heading>
            <div class="display-2 font-weight-light">
              {{$t('mypage_title')}}
            </div>

            <div class="subtitle-1 font-weight-light">
              {{$t('mypage_title_sub')}}
            </div>
          </template>

          <v-form>
            <v-container class="py-0">
              <v-row>
                <v-col cols="12" align="center" justify="center">
                  <v-hover>
                    <template v-slot:default="{ hover }">
                      <v-avatar size="128" class="mx-auto elevation-6" color="grey">
                        <v-img :src="preview" />
                        <v-fade-transition>
                          <v-overlay v-if="hover" absolute color="#036358">
                            <label class="button" @click="$refs.fileInput.value = ''" color="info">edit
                              <input type="file" style="display:none" ref="fileInput"  @change="onImageChange">
                            </label>
                          </v-overlay>
                        </v-fade-transition>
                      </v-avatar>
                    </template>
                  </v-hover>
                </v-col>

                <v-col cols="12">
                  <v-row justify="space-around">
                    <v-radio-group  v-model="user.user_level" row>
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
                </v-col>

                <v-col cols="12" md="4">
                  <v-text-field
                    class="purple-input"
                    :label="$t('mypage_company')"
                    v-model="user.company"
                    prepend-icon="mdi-office-building"
                    type="text"
                  />
                </v-col>

                <v-col cols="12" md="4">
                  <v-text-field
                    class="purple-input"
                    :label="$t('mypage_user_name')"
                    v-model="user.name"
                    prepend-icon="mdi-face"
                    type="text"
                    required
                  />
                  
                </v-col>

                <v-col cols="12" md="4">
                  <v-text-field
                    :label="$t('mypage_user_email')"
                    class="purple-input"
                    v-model="user.email"
                     prepend-icon="mdi-account"
                    disabled
                  />
                </v-col>
                <v-col cols="12" md="6">
                  <v-text-field
                   :label="$t('register_password')"
                    class="purple-input"
                    v-model="user.password"
                    prepend-icon="mdi-lock"
                    type="password"
                    minlength ="6"
                    maxlength="15"
                  />
                </v-col>

                <v-col cols="12" md="6">
                  <v-text-field
                    :label="$t('register_password_confirmation')"
                    class="purple-input"
                    v-model="user.password_confirmation"
                    prepend-icon="mdi-lock"
                    type="password"
                    minlength ="6"
                    maxlength="15"
                  />
                </v-col>
                <v-col cols="12" md="4">
                  <v-text-field
                   :label="$t('mypage_user_first')"
                    class="purple-input"
                    v-model="user.first_name"
                    prepend-icon="mdi-face"
                    type="text"
                  />
                </v-col>

                <v-col cols="12" md="4">
                  <v-text-field
                    :label="$t('mypage_user_last')"
                    class="purple-input"
                    v-model="user.last_name"
                    prepend-icon="mdi-face"
                    type="text"
                  />
                </v-col>
                 <v-col cols="12" md="4">
                  <v-text-field
                    :label="$t('mypage_user_phone')"
                    class="purple-input"
                    v-model="user.phone"
                    prepend-icon="mdi-cellphone"
                    type="text"
                  />
                </v-col>

                <v-col cols="12">
                  <v-text-field
                    :label="$t('mypage_user_address')"
                    class="purple-input"
                    v-model="user.address"
                    prepend-icon="mdi-home"
                    type="text"
                  />
                </v-col>

                <v-col cols="12" md="3">
                  <v-text-field
                    :label="$t('mypage_user_city')"
                    class="purple-input"
                    v-model="user.city"
                    prepend-icon="mdi-city"
                    type="text"
                  />
                </v-col>

                <v-col cols="12" md="3">
                  <v-text-field
                    :label="$t('mypage_user_country')"
                    class="purple-input"
                    v-model="user.country"
                    prepend-icon="mdi-map-marker"
                    type="text"
                  />
                </v-col>
                <v-col cols="12" md="3">
                  <v-text-field
                    :label="$t('mypage_user_province')"
                    class="purple-input"
                    v-model="user.province"
                    prepend-icon="mdi-map-marker"
                    type="text"
                  />
                </v-col>

                <v-col cols="12" md="3">
                  <v-text-field
                    class="purple-input"
                    :label="$t('mypage_user_postal')"
                    type="number"
                    v-model="user.postal"
                    prepend-icon="mdi-mailbox"
                    
                  />
                </v-col>

                <v-col cols="12">
                  <v-textarea
                    class="purple-input"
                    :label="$t('mypage_user_about')"
                    :placeholder="$t('mypage_user_about_me')"
                    v-model="user.about_me"
                    prepend-icon="mdi-account-alert"
                  />
                </v-col>

                <v-col
                  cols="12"
                  class="text-right"
                >
                  <v-btn
                    color="success"
                    class="mr-0"
                    @click="update()"
                  >
                    {{$t('mypage_user_update')}}
                  </v-btn>
                </v-col>
              </v-row>
            </v-container>
          </v-form>
        </base-material-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
  export default {
     name: 'Mypage',
      data() {
      return {
        user:[],
        types:['Dealer','Landing serve'],
        preview:'',
      }
    },
    mounted() {
      this.user = JSON.parse(localStorage.getItem('user'))
      if(this.user == null) {
        this.$swal.fire({
            icon: 'error',
            title: this.$t('login_auth_error')             
        })
        this.$router.replace('/login');
      }
      else
      {
        if ( this.user.user_level == '30' )
          this.user.user_level = 'Landing serve'
        else
          this.user.user_level = 'Dealer'

        this.preview = this.user.user_avatar;
      }
      
    },
    methods:{
      update(){
        
        if (this.validator('update') == false)
          return;

        const frm = new FormData()
        frm.append('email', this.user.email);
        frm.append('name', this.user.name);
        frm.append('password', this.user.password);
        frm.append('password_confirmation', this.user.password_confirmation);
        frm.append('company', this.user.company);
        frm.append('first_name', this.user.first_name);
        frm.append('last_name', this.user.last_name);
        frm.append('phone', this.user.phone);
        frm.append('address', this.user.address);
        frm.append('city', this.user.city);
        frm.append('country', this.user.country);
        frm.append('postal', this.user.postal);
        frm.append('about_me', this.user.about_me);

        if (  this.user.user_avatar != '')
          frm.append('user_avatar', this.user.user_avatar);
        
        

        if ( this.user.user_level == 'Dealer')
          frm.append('user_level', "50");
        else
          frm.append('user_level', "30");

        this.$http.post('/api/auth/update', frm,{
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        }).then((response) => {

          if ( response.data.status == 'error')
          {
              this.$swal.fire({
                icon: 'error',
                title: this.$t(response.data.messages),              
              })
          }
          else
          {
            this.$store.commit('UPDATE', response.data);

            this.$swal.fire({
              icon: 'success',
              title: this.$t('success_update'),
            });
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

        
        //프로필수정 유효성 검사
        if ( type == 'update')
        {
          let emil = this.checkundefined(this.user.email);
          let name =this.checkundefined(this.user.name);
          let password = this.checkundefined(this.user.password);
          let password_confirmation = this.checkundefined(this.user.password_confirmation);
          let user_type = this.checkundefined(this.user.user_level);

          
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
        
      },
      checkundefined(check){

        if ( check == undefined || check == null)
          return ''
        else
          return check
      },
      onImageChange(e) {
          //파일첨부 유효성 검사
          let files = e.target.files || e.dataTransfer.files;
          let fileForm = /^image\/(png|jpeg|jpg)$/;
          let maxSize = 5 * 1024 * 1024;

          if (!files.length)
              return;

          if (!e.target.files[0].type.match(/^image\/(png|jpeg|jpg)$/))
          {
             this.$swal.fire({
              icon: 'error',
              title: '파일 형식이 올바르지 않습니다.',   
             })   

              this.$refs.image.value = '';
              this.preview = '';
             return;
          }
          else if( e.target.files[0].size > maxSize)
          {
             this.$swal.fire({
              icon: 'error',
              title: '파일 사이즈는 5MB 이하 입니다.',   
             })
             this.$refs.image.value = '';
             this.preview = '';
             return;
          }

          //form 데이터 전달 이미지파일
          this.user.user_avatar = e.target.files[0];

          //프리뷰 생성
          var file = e.target.files[0];
          if (file && file.type.match(/^image\/(png|jpeg|jpg)$/)) {
            this.preview = window.URL.createObjectURL(file)
          }
          
      },
    }
  }
  

</script>
