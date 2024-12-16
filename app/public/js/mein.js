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
          // Enable pusher logging - don't include this in production
          Pusher.logToConsole = true;

          var pusher = new Pusher("02d3f87505cd90217b5e", {
              cluster: "ap3"
          });
  
          const channel = pusher.subscribe('my-channel');
          channel.bind('my-event', function (data) {
          document.getElementById('comment').innerHTML = data.message;
          console.log(JSON.stringify(data));
  });