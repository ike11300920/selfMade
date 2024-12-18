
          // Enable pusher logging - don't include this in production
//          Pusher.logToConsole = true//;

//        var pusher = new Pusher("02d3f87505cd90217b5e", {
//              cluster: "ap3"
//          });

//          const channel = pusher.subscribe(`notification-channel.${userId}`);
//          channel.bind('my-event', function (data) {
//            console.log("aaaa");
//            console.log(JSON.stringify(data));
//          //document.getElementById('comment').innerHTML = data.message;
//  });
  
// Laravel Echoを初期化
//window.Pusher = require("pusher-js");
//window.Echo = new Echo({
//   broadcaster: "pusher",
//   key: "02d3f87505cd90217b5e",
//   cluster: "ap3",
//   encrypted: true,
//   authEndpoint: process.env.pusher.authUrl,
//   auth: {
//     headers: {
//       authorization: this.getCookieValue("auth._token.local1"),
//     },
//    },
//  });

//const userId = this.$store.state.auth.user.id;

// ブロードキャスト通知
// window.Echo.private(`notification-channel`).listen(
//   "MyEvent",
//    (data) => {
//      console.log(data.message);
//     // this.broadcastNotifications.push(data.message);
//    }
// );