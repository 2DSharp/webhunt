(this.webpackJsonpwebhunt=this.webpackJsonpwebhunt||[]).push([[0],{183:function(e,t,a){e.exports=a(370)},369:function(e,t,a){},370:function(e,t,a){"use strict";a.r(t);var n=a(0),r=a.n(n),l=a(4),c=a.n(l),o=a(17),s=a(37),i=a(8),u=a(16),m=a.n(u),p=a(25),f=a(377),E=a(373),d=a(374),h=a(378),b=a(380),y=a(121),g=a(383),v=a(382),w=a(158),O=a.n(w).a.create({baseURL:"http://172.18.121.61",timeout:2e3}),x=f.a.Title,I=Object(s.f)((function(e){var t=function(){var t=Object(p.a)(m.a.mark((function t(a){var n,r;return m.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return n=a.id,r=a.password,t.next=3,O({url:"/login?id=".concat(n,"&pass=").concat(r),method:"get"});case 3:if(!t.sent.data.success){t.next=9;break}return i.c.success("Login Successful! \n You will be redirected in a second",{position:i.c.POSITION.TOP_CENTER,autoClose:1500}),t.abrupt("return",setTimeout((function(){e.history.push("/level")}),1e3));case 9:return t.abrupt("return",i.c.error("Invalid login details",{position:i.c.POSITION.TOP_CENTER,autoClose:1500}));case 10:case"end":return t.stop()}}),t)})));return function(e){return t.apply(this,arguments)}}();return r.a.createElement(E.a,{justify:"center",align:"middle",style:{height:"100vh"}},r.a.createElement(d.a,{span:8},r.a.createElement(x,{level:2,style:{marginBottom:"2rem"}},"Login"),r.a.createElement(h.a,{name:"normal_login",className:"login-form",initialValues:{remember:!0},onFinish:t},r.a.createElement(h.a.Item,{name:"id",rules:[{required:!0,message:"Please input your Login ID!"}]},r.a.createElement(b.a,{prefix:r.a.createElement(g.a,{className:"site-form-item-icon"}),placeholder:"Login ID"})),r.a.createElement(h.a.Item,{name:"password",rules:[{required:!0,message:"Please input your Password!"}]},r.a.createElement(b.a,{prefix:r.a.createElement(v.a,{className:"site-form-item-icon"}),type:"password",placeholder:"Password"})),r.a.createElement(h.a.Item,null,r.a.createElement(y.a,{type:"primary",htmlType:"submit",className:"login-form-button"},"Log in")))))})),T=a(36),S=a(89),j=function(e){var t=e.setQuestion,a=function(){var e=Object(p.a)(m.a.mark((function e(a){var n;return m.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return n=a.answer,e.next=3,O({url:"/go?answer=".concat(n),method:"get"});case 3:if(!e.sent.data.success){e.next=9;break}return t(""),e.abrupt("return",i.c.success("You answered correctly!",{position:i.c.POSITION.TOP_CENTER,autoClose:1500}));case 9:return e.abrupt("return",i.c.error("Incorrect answer!",{position:i.c.POSITION.TOP_CENTER,autoClose:1500}));case 10:case"end":return e.stop()}}),e)})));return function(t){return e.apply(this,arguments)}}();return r.a.createElement(E.a,{justify:"center",align:"middle"},r.a.createElement(d.a,{span:8},r.a.createElement(h.a,{name:"normal_login",className:"login-form",initialValues:{remember:!0},onFinish:a},r.a.createElement(h.a.Item,{name:"answer",rules:[{required:!0,message:"You cannot submit an empty answer."}]},r.a.createElement(b.a,{prefix:r.a.createElement(g.a,{className:"site-form-item-icon"}),placeholder:"Type your answer here"})),r.a.createElement(h.a.Item,null,r.a.createElement("div",{style:{display:"flex",alignItems:"center",justifyContent:"center"}},r.a.createElement(y.a,{type:"primary",htmlType:"submit",className:"login-form-button"},"Submit"))))))},k=a(375),C=function(e){var t=e.question;return t?r.a.createElement("div",{dangerouslySetInnerHTML:{__html:t}}):r.a.createElement("div",{style:{position:"absolute",top:"50%",left:"50%",transform:"translate(-50%,-50%)",color:"#fff"}},r.a.createElement("h3",null,"Loading..."),r.a.createElement(k.a,{size:"large"}))},N=Object(i.b)({enter:"zoomIn",exit:"zoomOut",duration:[500,800]}),P=function(){var e=r.a.useState(""),t=Object(T.a)(e,2),a=t[0],n=t[1],l=function(){var e=Object(p.a)(m.a.mark((function e(){return m.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if(""!==a){e.next=2;break}return e.abrupt("return",Object(i.c)("MULTIPLE TAB ACCESS DENIED. CONTACT SDC"));case 2:return e.next=4,O({url:"/cheat?code=".concat(a),method:"get"});case 4:if(!e.sent.data.success){e.next=10;break}return n(""),e.abrupt("return",Object(i.c)("Cheat Activated",{transition:N,autoClose:5e3,className:"notif",position:i.c.POSITION.TOP_LEFT}));case 10:return n(""),e.abrupt("return",Object(i.c)("Almost there",{transition:N,autoClose:2e3,className:"notif",position:i.c.POSITION.TOP_LEFT}));case 12:case"end":return e.stop()}}),e)})));return function(){return e.apply(this,arguments)}}();return r.a.createElement("div",null,r.a.createElement(h.a,{onFinish:l},r.a.createElement(b.a,{value:a,onChange:function(e){return n(e.target.value)},placeholder:"I feel so disabled",style:{width:"10%"},disabled:!0})))},L=function(){var e=r.a.useState(""),t=Object(T.a)(e,2),a=t[0],n=t[1],l=r.a.useState(0),c=Object(T.a)(l,2),o=c[0],s=c[1],i=r.a.useState(0),u=Object(T.a)(i,2),h=u[0],b=u[1],y=function(){var e=Object(p.a)(m.a.mark((function e(){var t;return m.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return e.next=2,O({url:"/question",method:"get"});case 2:t=e.sent,console.log(t.data),t.data.html.length>0&&(n(t.data.html),s(t.data.points),b(t.data.level));case 5:case"end":return e.stop()}}),e)})));return function(){return e.apply(this,arguments)}}();return r.a.useEffect((function(){y()}),[a]),r.a.createElement(r.a.Fragment,null,r.a.createElement(S.Helmet,null,r.a.createElement("title",null,"WebHunt 2.0")),r.a.createElement("div",{style:{display:"flex",justifyContent:"space-between",alignItems:"center",margin:"2.5rem 6.5rem",fontSize:"24px"}},r.a.createElement(f.a.Text,{type:"disabled"},"Level : ",h),r.a.createElement(f.a.Text,{type:"disabled"},"Points : ",o)),r.a.createElement(E.a,{justify:"center",align:"middle",style:{height:"70vh"}},7===h?r.a.createElement("div",null,"Show some shit"):null,r.a.createElement(d.a,{span:16},r.a.createElement(C,{question:a}),r.a.createElement(j,{setQuestion:n}))),r.a.createElement(P,null))},A=a(379),R=Object(s.f)((function(e){var t=e.location.pathname;return r.a.createElement("div",null,r.a.createElement(A.a,{theme:"dark",mode:"horizontal",style:{lineHeight:"64px",display:"flex",padding:"0 1.5rem"}},r.a.createElement(A.a.Item,{key:"1",style:{fontSize:"26px",color:"#fff",marginRight:"auto"}},"WebHunt 2.0"),r.a.createElement(A.a.Item,{key:"2",style:{fontSize:"16px",color:"#fff"}},r.a.createElement(o.c,{to:"/leader"},"Leaderboard")),"/leader"===t?r.a.createElement(A.a.Item,{key:"3",style:{fontSize:"16px",color:"#fff"}},r.a.createElement(o.c,{to:"/level"},"Go back")):null))})),_=a(376),z=a(384),q=_.a.Footer,F=function(){return r.a.createElement(q,{style:{position:"sticky",bottom:"0"}},r.a.createElement("div",{style:{display:"flex",alignItems:"center",justifyContent:"center"}},"Made with \xa0 ",r.a.createElement(z.a,null)," \xa0 by OSC and null Chapter"))},H=f.a.Title,D=function(){var e=r.a.useState(null),t=Object(T.a)(e,2),a=t[0],n=t[1],l=function(){var e=Object(p.a)(m.a.mark((function e(){var t;return m.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return e.next=2,O({url:"/leaderboard",method:"get"});case 2:(t=e.sent).data.length>0&&n(t.data);case 4:case"end":return e.stop()}}),e)})));return function(){return e.apply(this,arguments)}}();return r.a.useEffect((function(){l(),setInterval((function(){l()}),5e3)}),[]),r.a.createElement(E.a,{justify:"center",style:{height:"85vh"}},r.a.createElement(d.a,{span:20},r.a.createElement(H,{style:{marginTop:"2rem"}},"Leaderboard"),a&&a.length>0?r.a.createElement("div",null,a.map((function(e){return r.a.createElement("div",{key:JSON.stringify(e)},JSON.stringify(e))}))):r.a.createElement("div",{style:{position:"absolute",top:"50%",left:"50%",transform:"translate(-50%,-50%)",color:"#fff"}},r.a.createElement("h3",null,"Loading..."),r.a.createElement(k.a,{size:"large"}))))},B=function(){return r.a.createElement("div",null,r.a.createElement("a",{href:"/p2"},"Click me!"))},J=a(381),W=Object(s.f)((function(e){var t=e.location.pathname;return console.log(t),r.a.createElement(r.a.Fragment,null,r.a.createElement(S.Helmet,null,"/p2"===t?r.a.createElement("title",null,"A"):null,"/p3"===t?r.a.createElement("title",null,"An"):null,"/p4"===t?r.a.createElement("title",null,"Ans"):null,"/p5"===t?r.a.createElement("title",null,"Answ"):null,"/p6"===t?r.a.createElement("title",null,"Answe"):null,"/p7"===t?r.a.createElement("title",null,"Answer"):null),r.a.createElement(y.a,{type:"primary",style:{transform:"translate(2rem,2rem)"}},r.a.createElement(o.b,{to:"/level",style:{color:"#fff"}},"Go back to question")," "),r.a.createElement(J.a,{style:{height:"85vh"},status:"404",title:"404",subTitle:"Sorry, the page you visited does not exist.",extra:r.a.createElement(y.a,{type:"primary"},"/p2"===t?r.a.createElement(o.b,{to:"/p3"},"Refresh"):null,"/p3"===t?r.a.createElement(o.b,{to:"/p4"},"Refresh"):null,"/p4"===t?r.a.createElement(o.b,{to:"/p5"},"Refresh"):null,"/p5"===t?r.a.createElement(o.b,{to:"/p6"},"Refresh"):null,"/p6"===t?r.a.createElement(o.b,{to:"/p7"},"Refresh"):null,"/p7"===t?r.a.createElement(o.b,{to:"/level"},"Go back to question"):null)}))}));var G=function(){return r.a.createElement("div",null,r.a.createElement(i.a,null),r.a.createElement(o.a,null,r.a.createElement(R,null),r.a.createElement(s.c,null,r.a.createElement(s.a,{exact:!0,path:"/",component:I}),r.a.createElement(s.a,{exact:!0,path:"/level",component:L}),r.a.createElement(s.a,{exact:!0,path:"/leader",component:D}),r.a.createElement(s.a,{exact:!0,path:"/test",component:B}),r.a.createElement(s.a,{exact:!0,path:["/p2","/p3","/p4","/p5","/p6","/p7"],component:W}))),r.a.createElement(F,null))};Boolean("localhost"===window.location.hostname||"[::1]"===window.location.hostname||window.location.hostname.match(/^127(?:\.(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)){3}$/));a(367),a(368),a(369);c.a.render(r.a.createElement(G,null),document.getElementById("root")),"serviceWorker"in navigator&&navigator.serviceWorker.ready.then((function(e){e.unregister()})).catch((function(e){console.error(e.message)}))}},[[183,1,2]]]);
//# sourceMappingURL=main.d619e16c.chunk.js.map