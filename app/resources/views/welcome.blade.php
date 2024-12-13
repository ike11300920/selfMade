<!DOCTYPE html>

<head>
    <title>Pusher Test</title>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher("{{ $key }}", {
            cluster: "{{ $cluster }}"
        });

        const channel = pusher.subscribe('hello');
  channel.bind('CommentUpdated', function (comments) {
    console.log(comments.model.comment);
});
    </script>
</head>

<body>
    <h1>Pusher Test</h1>
    <div id="message"></div>
</body>