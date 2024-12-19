function like(postId) {
    $.ajax({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
      url: `/like/${postId}`,
      type: "POST",
    })

      .done(function (data, status, xhr) {
        console.log(data)
      })
      .fail(function (xhr, status, error) {
        console.log()
      })
  }

  //pusher開始
  Pusher.logToConsole = true;

  var pusher = new Pusher('02d3f87505cd90217b5e', {
    cluster: 'ap3'
  });

  var channel = pusher.subscribe('my-channel');
  channel.bind('my-event', function(data) {

    let id = document.querySelector('.pusher').getAttribute('id');

    if(id==data.user){
    document.getElementById('message').innerHTML = data.message;
    }else{}
    //document.getElementById('id').innerHTML = data.user;
});

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
// window.Echo.private(`notification-channel.${userId}`).listen(
//   "MyEvent",
//    (data) => {
//      console.log(data);
//      this.broadcastNotifications.push(data.model);
//    }
// );