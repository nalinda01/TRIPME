
  let i = 0;
  let images = [];
  images[1] = "images/slide1.jpg";
  images[0] = "images/slide2.jpg";

  function slideShow() {
    document.slide.src = images[i];
    if (i < images.length - 1) {
      i++;
    } else {
      i = 0;
    }

    setTimeout(slideShow, 7000);
  }

  window.onload = slideShow;

