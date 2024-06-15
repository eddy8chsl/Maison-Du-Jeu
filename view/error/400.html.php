<?php
// This example illustrates the "HTTP/" special case
// Better alternatives in typical use cases include:
// 1. header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
//    (to override http status messages for clients that are still using HTTP/1.0)
// 2. http_response_code(404); (to use the default message)
header("HTTP/1.1 400 Bad Request",true,400);

include "$root/view/header.html.php"; ?>

    <div id="accroche">
        <a href="https://developer.mozilla.org/en-US/docs/web/http/status/400">400 Bad Request</a>

    </div>
<?php include "$root/view/footer.html.php";