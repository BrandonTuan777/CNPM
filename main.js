//Auto picture

function readComments() {
    var x = document.getElementById("readComment");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
function generator() {

    // for (let index = 0; index < 10; index++) {
        var random = Math.floor((Math.random() * 6) + 1);
        document.getElementById('divImage').innerHTML = `
        <img src="./img/pic${random}.jpg" style="width:auto;">
    `;
    // }

}

$(document).ready(function() {
    $(".child-comments").hide();

    $("a#children").click(function() {
        var section = $(this).attr("name");
        var togTxt = $("#tog_text").text();
        $("#C-" + section).toggle();
    });

    $(".form-submit").click(function() {
        var commentBox = $("#comment");
        var commentCheck = commentBox.val();
        if(commentCheck == '' || commentCheck == NULL) {
            commentBox.addClass("form-text-error");
            return false;
        }
    });

    $(".form-reply").click(function() {
        var replyBox = $("#new-reply");
        var replyCheck = replyBox.val();
        if(replyCheck == '' || replyCheck == NULL) {
            replyBox.addClass("form-text-error");
            return false;
        }
    });

    $("a#reply").one("click", function() {
        var comCode = $(this).attr("name");
        var parent = $(this).parent();
       /* <input class="form-control" placeholder="Add a comment" type="text">*/
        parent.append("<br /><form action='' method='post'>" +
            "<div class='input-group'>" +
            "<input class='form-control' placeholder='Add a comment' type='text'  name='new-reply' id='new-reply' required='required'>" +
            "<input type='hidden' name='code' value='"+comCode+"' />" +
            "<input type='submit' class='btn btn-primary' id='form-reply' name='new_reply' value='Reply' /></form> </div>")

    });

})
