(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-603d1cde"],{bd0c:function(t,e,n){},c7ca:function(t,e,n){"use strict";n.r(e);var a=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("v-content",[n("v-fade-transition",{attrs:{mode:"out-in"}},[n("router-view")],1)],1)},i=[],s={name:"BaseView"},o=s,d=n("2877"),r=n("6544"),c=n.n(r),u=n("f6c4"),l=n("d9bd"),p=u["a"].extend({name:"v-main",created(){Object(l["d"])("v-content","v-main",this)},render(t){const e=u["a"].options.render.call(this,t);return e.data.staticClass+=" v-content",e.children[0].data.staticClass+=" v-content__wrap",t(e.tag,e.data,e.children)}}),f=n("0789"),m=Object(d["a"])(o,a,i,!1,null,null,null);e["default"]=m.exports;c()(m,{VContent:p,VFadeTransition:f["b"]})},d10f:function(t,e,n){"use strict";var a=n("2b0e");e["a"]=a["a"].extend({name:"ssr-bootable",data:()=>({isBooted:!1}),mounted(){window.requestAnimationFrame(()=>{this.$el.setAttribute("data-booted","true"),this.isBooted=!0})}})},f6c4:function(t,e,n){"use strict";n("bd0c");var a=n("d10f");e["a"]=a["a"].extend({name:"v-main",props:{tag:{type:String,default:"main"}},computed:{styles(){const{bar:t,top:e,right:n,footer:a,insetFooter:i,bottom:s,left:o}=this.$vuetify.application;return{paddingTop:e+t+"px",paddingRight:n+"px",paddingBottom:a+i+s+"px",paddingLeft:o+"px"}}},render(t){const e={staticClass:"v-main",style:this.styles,ref:"main"};return t(this.tag,e,[t("div",{staticClass:"v-main__wrap"},this.$slots.default)])}})}}]);
//# sourceMappingURL=chunk-603d1cde.272d665f.js.map