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

        const channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function (data) {
        document.getElementById('comment').innerHTML = data.message;
        console.log(JSON.stringify(data));
});
    </script>
</head>

<body>
    <h1>Pusher Test</h1>
    <div id="comment"></div>
</body>