(function(){"use strict";var e={662:function(e,n,t){var o=t(756),r=t(641);const i={id:"app"};function u(e,n,t,o,u,a){const s=(0,r.g2)("router-view");return(0,r.uX)(),(0,r.CE)("div",i,[(0,r.bF)(s)])}var a={name:"App"},s=t(262);const p=(0,s.A)(a,[["render",u]]);var d=p,c=t(220),l=t(33);const f=(0,r.Lk)("h1",null,"Expenses",-1);function h(e,n,t,o,i,u){return(0,r.uX)(),(0,r.CE)("div",null,[f,(0,r.Lk)("ul",null,[((0,r.uX)(!0),(0,r.CE)(r.FK,null,(0,r.pI)(i.expenses,(e=>((0,r.uX)(),(0,r.CE)("li",{key:e.id},(0,l.v_)(e.description)+": "+(0,l.v_)(e.amount)+" € ",1)))),128))])])}var v={data(){return{expenses:[]}},created(){this.fetchExpenses()},methods:{fetchExpenses(){this.$http.get("http://localhost:8000/api/expenses").then((e=>{this.expenses=e.data})).catch((e=>{console.error("Error fetching expenses:",e)}))}}};const m=(0,s.A)(v,[["render",h]]);var b=m,x=t(751);const y=(0,r.Lk)("h1",null,"Add Expense",-1),g=(0,r.Lk)("label",{for:"description"},"Description",-1),E=(0,r.Lk)("label",{for:"amount"},"Amount",-1),k=(0,r.Lk)("button",{type:"submit"},"Add",-1);function O(e,n,t,o,i,u){return(0,r.uX)(),(0,r.CE)("div",null,[y,(0,r.Lk)("form",{onSubmit:n[2]||(n[2]=(0,x.D$)(((...e)=>u.addExpense&&u.addExpense(...e)),["prevent"]))},[(0,r.Lk)("div",null,[g,(0,r.bo)((0,r.Lk)("input",{type:"text","onUpdate:modelValue":n[0]||(n[0]=e=>i.description=e),id:"description",required:""},null,512),[[x.Jo,i.description]])]),(0,r.Lk)("div",null,[E,(0,r.bo)((0,r.Lk)("input",{type:"number","onUpdate:modelValue":n[1]||(n[1]=e=>i.amount=e),id:"amount",required:""},null,512),[[x.Jo,i.amount]])]),k],32)])}var w={data(){return{description:"",amount:0}},methods:{addExpense(){const e={description:this.description,amount:this.amount,date:(new Date).toISOString(),user:1};this.$http.post("http://localhost:8000/api/expenses",e).then((e=>{console.log("Expense added:",e.data),this.description="",this.amount=0})).catch((e=>{console.error("Error adding expense:",e)}))}}};const L=(0,s.A)(w,[["render",O]]);var A=L;o["default"].use(c["default"]);var j=new c["default"]({mode:"history",routes:[{path:"/",name:"ExpenseList",component:b},{path:"/add-expense",name:"AddExpense",component:A}]}),S=t(335);o["default"].config.productionTip=!1,o["default"].prototype.$http=S.A,new o["default"]({router:j,render:e=>e(d)}).$mount("#app")}},n={};function t(o){var r=n[o];if(void 0!==r)return r.exports;var i=n[o]={exports:{}};return e[o](i,i.exports,t),i.exports}t.m=e,function(){var e=[];t.O=function(n,o,r,i){if(!o){var u=1/0;for(d=0;d<e.length;d++){o=e[d][0],r=e[d][1],i=e[d][2];for(var a=!0,s=0;s<o.length;s++)(!1&i||u>=i)&&Object.keys(t.O).every((function(e){return t.O[e](o[s])}))?o.splice(s--,1):(a=!1,i<u&&(u=i));if(a){e.splice(d--,1);var p=r();void 0!==p&&(n=p)}}return n}i=i||0;for(var d=e.length;d>0&&e[d-1][2]>i;d--)e[d]=e[d-1];e[d]=[o,r,i]}}(),function(){t.d=function(e,n){for(var o in n)t.o(n,o)&&!t.o(e,o)&&Object.defineProperty(e,o,{enumerable:!0,get:n[o]})}}(),function(){t.g=function(){if("object"===typeof globalThis)return globalThis;try{return this||new Function("return this")()}catch(e){if("object"===typeof window)return window}}()}(),function(){t.o=function(e,n){return Object.prototype.hasOwnProperty.call(e,n)}}(),function(){t.r=function(e){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})}}(),function(){var e={524:0};t.O.j=function(n){return 0===e[n]};var n=function(n,o){var r,i,u=o[0],a=o[1],s=o[2],p=0;if(u.some((function(n){return 0!==e[n]}))){for(r in a)t.o(a,r)&&(t.m[r]=a[r]);if(s)var d=s(t)}for(n&&n(o);p<u.length;p++)i=u[p],t.o(e,i)&&e[i]&&e[i][0](),e[i]=0;return t.O(d)},o=self["webpackChunkvue_app"]=self["webpackChunkvue_app"]||[];o.forEach(n.bind(null,0)),o.push=n.bind(null,o.push.bind(o))}();var o=t.O(void 0,[504],(function(){return t(662)}));o=t.O(o)})();
//# sourceMappingURL=app.7ae0f0ed.js.map