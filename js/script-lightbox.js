$(document).ready(function() {

    var lightboxCloseBtn = $("<button/>")
        .addClass("lightbox__close")
        .html("<span>&#10005;</span>");
    var lightboxNextBtn = $("<button/>")
        .addClass("lightbox__next")
        .html("<span>&#11106;</span>");
    var lightboxPrevBtn = $("<button/>")
        .addClass("lightbox__prev")
        .html("<span>&#11104;</span>");
    var lightboxContainer = $("<div/>")
        .addClass("lightbox__container")
    var lightboxImage = $("<img/>");

    $(lightboxContainer).prepend(lightboxImage);

    var lightboxRef = $("<div/>")
        .addClass("lightbox-ref")
        .html("<p>ref de la photo</p>");
    var lightboxCat = $("<div/>")
        .addClass("lightbox-cat")
        .html("<p>cat de la photo</p>");

    var lightboxDiv = $("<div/>")
        .addClass("lightbox");
    
    $(lightboxDiv).append(lightboxCloseBtn, lightboxNextBtn, lightboxPrevBtn, lightboxContainer, lightboxRef, lightboxCat);

    var elargirs = document.querySelectorAll(".elargir");
    var lightboxPrevData = [null, null, null];
    var lightboxNextData = [null, null, null];
    var lightboxFirstData = [null, null, null];
    var lightboxLastData = [null, null, null];
    var nb_images = elargirs.length;
    var pos_image = 0;
    var next_ref_image = null;
    var prev_ref_image = null;
    var target_image = false;
    var target_image_confirm = false;
    var first = false;
    var last = false;
    
    $(document).on({
      click: function() {
        console.log("click on elargir");
        console.log("elargirs = ", elargirs);
        elargirs = document.querySelectorAll(".elargir");
        nb_images = elargirs.length;
        lightboxPrevData = [null, null, null];
        lightboxNextData = [null, null, null];
        lightboxFirstData = [null, null, null];
        lightboxLastData = [null, null, null];
        pos_image = 0;
        target_image = false;
        target_image_confirm = false;
        first = false;
        last = false;
        while (pos_image < nb_images) {
            if ($(elargirs[pos_image]).data("ref") !== $(this).data("ref")) {
                if (target_image === false) {
                    lightboxPrevData[0] = $(elargirs[pos_image]).data("ref");
                    lightboxPrevData[1] = $(elargirs[pos_image]).data("image");
                    lightboxPrevData[2] = $(elargirs[pos_image]).data("cat");
                }
                if (target_image === true && target_image_confirm === false) {
                    lightboxNextData[0] = $(elargirs[pos_image]).data("ref");
                    lightboxNextData[1] = $(elargirs[pos_image]).data("image");
                    lightboxNextData[2] = $(elargirs[pos_image]).data("cat");
                    target_image_confirm = true;
                }
                if (pos_image === 0) {
                    lightboxFirstData[0] = $(elargirs[pos_image]).data("ref");
                    lightboxFirstData[1] = $(elargirs[pos_image]).data("image");
                    lightboxFirstData[2] = $(elargirs[pos_image]).data("cat");
                }
                if (pos_image === nb_images - 1) {
                    lightboxLastData[0] = $(elargirs[pos_image]).data("ref");
                    lightboxLastData[1] = $(elargirs[pos_image]).data("image");
                    lightboxLastData[2] = $(elargirs[pos_image]).data("cat");
                }
                console.log("lastdata =", lightboxLastData);
                pos_image++;
            } else {
                target_image = true;
                if (pos_image === 0) {
                    first = true;
                }
                if (pos_image === nb_images - 1) {
                    last = true;
                }
                pos_image++;
            }
        }
        if (first === true) {
            lightboxPrevData = lightboxLastData;
        }
        if (last === true) {
            lightboxNextData = lightboxFirstData;
        }
        console.log("nb_images = ", nb_images);
        console.log("lastData = ", lightboxLastData);
        prev_ref_image = lightboxPrevData[0];
        next_ref_image = lightboxNextData[0];
        console.log("prev ref image = ", prev_ref_image);
        console.log("next ref image = ", next_ref_image);
        console.log("target = ", $(this).data("ref"));
        var imageURL = $(this).data("image");
        var imageRef = $(this).data("ref");
        var imageCat = $(this).data("cat");
        console.log("imageURL = ", imageURL);
        $(lightboxImage).attr("src", imageURL);
        $(lightboxRef).html(imageRef);
        $(lightboxCat).html(imageCat);
        $("body").append(lightboxDiv);
      }
    }, ".elargir");

    $(document).on({
        click: function() {
            console.log("click on lightbox__close");
            $(lightboxDiv).remove();
        }
    }, ".lightbox__close");

    $(document).on({
        click: function() {
            console.log("click on lightbox__prev");
            $(lightboxContainer).remove();
            imageURL = lightboxPrevData[1];
            imageRef = lightboxPrevData[0];
            imageCat = lightboxPrevData[2];
            console.log("imageURL = ", imageURL);
            $(lightboxImage).attr("src", imageURL);
            $(lightboxRef).html(imageRef);
            $(lightboxCat).html(imageCat);
            $(lightboxDiv).append(lightboxContainer);
            elargirs = document.querySelectorAll(".elargir");
            nb_images = elargirs.length;
            lightboxPrevData = [null, null, null];
            lightboxNextData = [null, null, null];
            lightboxFirstData = [null, null, null];
            lightboxLastData = [null, null, null];
            pos_image = 0;
            target_image = false;
            target_image_confirm = false;
            first = false;
            last = false;
            while (pos_image < nb_images) {
                if ($(elargirs[pos_image]).data("ref") !== prev_ref_image) {
                    if (target_image === false) {
                        lightboxPrevData[0] = $(elargirs[pos_image]).data("ref");
                        lightboxPrevData[1] = $(elargirs[pos_image]).data("image");
                        lightboxPrevData[2] = $(elargirs[pos_image]).data("cat");
                    }
                    if (target_image === true && target_image_confirm === false) {
                        lightboxNextData[0] = $(elargirs[pos_image]).data("ref");
                        lightboxNextData[1] = $(elargirs[pos_image]).data("image");
                        lightboxNextData[2] = $(elargirs[pos_image]).data("cat");
                        target_image_confirm = true;
                    }
                    if (pos_image === 0) {
                        lightboxFirstData[0] = $(elargirs[pos_image]).data("ref");
                        lightboxFirstData[1] = $(elargirs[pos_image]).data("image");
                        lightboxFirstData[2] = $(elargirs[pos_image]).data("cat");
                    }
                    if (pos_image === nb_images - 1) {
                        lightboxLastData[0] = $(elargirs[pos_image]).data("ref");
                        lightboxLastData[1] = $(elargirs[pos_image]).data("image");
                        lightboxLastData[2] = $(elargirs[pos_image]).data("cat");
                    }
                    pos_image++;
                } else {
                    target_image = true;
                    if (pos_image === 0) {
                        first = true;
                    }
                    if (pos_image === nb_images - 1) {
                        last = true;
                    }
                    pos_image++;
                }
            }
            if (first === true) {
                lightboxPrevData = lightboxLastData;
            }
            if (last === true) {
                lightboxNextData = lightboxFirstData;
            }
            console.log("nb_images = ", nb_images);
            console.log("lastData = ", lightboxLastData);
            prev_ref_image = lightboxPrevData[0];
            next_ref_image = lightboxNextData[0];
            console.log("prev ref image = ", prev_ref_image);
            console.log("next ref image = ", next_ref_image);
            console.log("lightboxPrevData = ", lightboxPrevData);
        }
    }, ".lightbox__prev");

    $(document).on({
        click: function() {
            console.log("click on lightbox__next");
            $(lightboxContainer).remove();
            imageURL = lightboxNextData[1];
            imageRef = lightboxNextData[0];
            imageCat = lightboxNextData[2];
            console.log("imageURL = ", imageURL);
            $(lightboxImage).attr("src", imageURL);
            $(lightboxRef).html(imageRef);
            $(lightboxCat).html(imageCat);
            $(lightboxDiv).append(lightboxContainer);
            elargirs = document.querySelectorAll(".elargir");
            nb_images = elargirs.length;
            lightboxPrevData = [null, null, null];
            lightboxNextData = [null, null, null];
            lightboxFirstData = [null, null, null];
            lightboxLastData = [null, null, null];
            pos_image = 0;
            target_image = false;
            target_image_confirm = false;
            first = false;
            last = false;
            while (pos_image < nb_images) {
                if ($(elargirs[pos_image]).data("ref") !== next_ref_image) {
                    if (target_image === false) {
                        lightboxPrevData[0] = $(elargirs[pos_image]).data("ref");
                        lightboxPrevData[1] = $(elargirs[pos_image]).data("image");
                        lightboxPrevData[2] = $(elargirs[pos_image]).data("cat");
                        console.log("lightboxPrevData = ", lightboxPrevData);
                    }
                    if (target_image === true && target_image_confirm === false) {
                        lightboxNextData[0] = $(elargirs[pos_image]).data("ref");
                        lightboxNextData[1] = $(elargirs[pos_image]).data("image");
                        lightboxNextData[2] = $(elargirs[pos_image]).data("cat");
                        target_image_confirm = true;
                        console.log("lightboxPrevData = ", lightboxPrevData);
                    }
                    if (pos_image === 0) {
                        lightboxFirstData[0] = $(elargirs[pos_image]).data("ref");
                        lightboxFirstData[1] = $(elargirs[pos_image]).data("image");
                        lightboxFirstData[2] = $(elargirs[pos_image]).data("cat");
                        console.log("lightboxPrevData = ", lightboxPrevData);
                    }
                    if (pos_image === nb_images - 1) {
                        lightboxLastData[0] = $(elargirs[pos_image]).data("ref");
                        lightboxLastData[1] = $(elargirs[pos_image]).data("image");
                        lightboxLastData[2] = $(elargirs[pos_image]).data("cat");
                        console.log("lightboxPrevData = ", lightboxPrevData);
                    }
                    console.log("lightboxPrevData = ", lightboxPrevData);
                    pos_image++;
                } else {
                    target_image = true;
                    if (pos_image === 0) {
                        first = true;
                        console.log("lightboxPrevData = ", lightboxPrevData);
                    }
                    if (pos_image === nb_images - 1) {
                        last = true;
                    }
                    pos_image++;
                    console.log("lightboxPrevData = ", lightboxPrevData);
                }
            }
            console.log("lightboxPrevData = ", lightboxPrevData);
            if (first === true) {
                lightboxPrevData = lightboxLastData;
            }
            if (last === true) {
                lightboxNextData = lightboxFirstData;
            }
            console.log("lightboxPrevData = ", lightboxPrevData);
            console.log("lastData = ", lightboxLastData);
            prev_ref_image = lightboxPrevData[0];
            next_ref_image = lightboxNextData[0];
            console.log("prev ref image = ", prev_ref_image);
            console.log("next ref image = ", next_ref_image);
        }
    }, ".lightbox__next");
});
