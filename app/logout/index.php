<?php
function redirectToHomepage()
{
    header("Location: /crest/login"); // Adjust the path according to your homepage route
    exit();
}

redirectToHomepage();
