$(document).keydown(function (event) {
    switch (event.keyCode) {
        case 37:
            changeDirection("left");
            break;
        case 39:
            changeDirection("right");
            break;
    }
});

function changeDirection(direction) {
    $('.truck_wheel').each(function () {
        if (direction === "right") {
            $(this).css('animation', "rotateRight 4s infinite linear");
        } else {
            $(this).css('animation', "rotateLeft 4s infinite linear");
        }
    });

    if(direction === "right") {
        $('.truck_container').css('animation', "moveTruck 30s infinite linear normal");
    } else {
        $('.truck_container').css('animation', "moveTruck 30s infinite linear reverse");
    }
}