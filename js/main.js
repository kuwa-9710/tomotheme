const faqs = document.querySelectorAll(".faq_box");

faqs.forEach((faq) => {
  faq.addEventListener("click", () => {
    faq.classList.toggle("active");
  });
});

$(".openbtn8").click(function () {
  $(this).toggleClass("active");
  $(".main-navigation").toggleClass("open-menu");
  $(".main-navigation").slideToggle();
});

//アコーディオンをクリックした時の動作
$(".title").on("click", function () {
  //タイトル要素をクリックしたら
  var findElm = $(this).next(".box"); //直後のアコーディオンを行うエリアを取得し
  $(findElm).slideToggle(); //アコーディオンの上下動作

  if ($(this).hasClass("close")) {
    //タイトル要素にクラス名closeがあれば
    $(this).removeClass("close"); //クラス名を除去し
  } else {
    //それ以外は
    $(this).addClass("close"); //クラス名closeを付与
  }
});

$(".fadeInUpTrigger").on("inview", function (event, isInView) {
  if (isInView) {
    $(this).addClass("animate__animated animate__fadeInUp");
  }
});

$(".fadeInDownTrigger").on("inview", function (event, isInView) {
  if (isInView) {
    $(this).addClass("animate__animated animate__fadeInDown");
  }
});

$(".fadeInTrigger").on("inview", function (event, isInView) {
  if (isInView) {
    $(this).addClass("animate__animated animate__fadeIn");
  }
});

$(".backInLeftTrigger").on("inview", function (event, isInView) {
  if (isInView) {
    $(this).addClass("animate__animated animate__backInLeft");
  }
});
$(".backInRightTrigger").on("inview", function (event, isInView) {
  if (isInView) {
    $(this).addClass("animate__animated animate__backInRight");
  }
});
