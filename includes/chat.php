<?php require_once "config.php"?>

<div id="chat-bubble">
    <img src="images/chat.png" alt="">
</div>
<div id="chat-box">
    <div id="chat-header">Chat</div>
    <div id="chat-body">
        <div id="chat-log"></div>
        <?php
        if (isset($_SESSION['client'])) {
            echo <<<HTML
            <input type="text" id="chat-input" placeholder="Tapez votre message...">
            <input type="hidden" id="token" name="token" value="{$_SESSION['csrf_token']}">
        <button id="chat-send-btn">Envoyer</button>
HTML;
        } else {
            echo "<p><a href='connexion.php'>Connectez-vous</a> pour envoyer un message</p>";
        }
        ?>
    </div>
</div>  

<script>
$(document).ready(() => {
    setInterval(updateChat, 1000);
    $("#chat-send-btn").on("click", sendMessage);
    $("#chat-input").on("keypress", (event) => {
        if (event.key === "Enter") {
            sendMessage()
    }
});

    $("#chat-bubble").on("click", () => {
        $("#chat-bubble").hide();
        $("#chat-box").show();
    });
    $("#chat-header").on("click", () => {
        $("#chat-box").hide();;
        $("#chat-bubble").show();
    });
});


function updateChat() {
    $.ajax({
        type: "POST",
        url: "<?=SITE_URL."updateChat.php"?>",
    },
    success: function (response) {
            if (response.length > 0){
                $("#chat-log").html(response)
            } else {
                $("#chat-log").html("Aucun message pour le moment")
            }
        });
}

function sendMessage() {
    $.ajax({
        type: "POST",
        url: "<?=SITE_URL."sendChat.php"?>",
        data: { message: $("input[id='chat-input']").val().trim(),
                token: $("input[id='token']").val()},
        success: function (response) {
                $("#chat-log").html(response);
                $("input[id='chat-input']").val("");
            }
    });
}
</script>