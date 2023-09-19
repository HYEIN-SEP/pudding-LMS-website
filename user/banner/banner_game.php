<?php
$title="오늘의쿠폰";
$css_route="banner/css/banner.css";
$js_route = "banner/js/banner.js";
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/header.php';
?>

<div class="container d-flex justify-content-center align-items-end game_board_container jua">
  <div class="game_board_content col-7">
    <h2 class="text-center">단어를 맞춰보세요!</h2>
    <div class="game_board">
    </div>
  </div>

  <div class="game_rule col-3 d-flex flex-column align-items-center">
    <div class="game_rule_content white_bg radius_12 shadow_box">
      <h3 class="text-center">
        ★★★<br>
        게임 룰 설명 
      </h3>
      <div class="description">
        <p>영단어를 추리하는 WORDLE 게임 😉</p>
        <p>문자와 위치가 모두 맞으면 파란색 💙</p>
        <p>문자만 맞았다면 노란색 💛 </p>
        <p>모두 틀렸다면 회색 🤣</p>
        <p>기회는 N번 제공!</p>
      </div>
      <div class="hint">
        <button class="badge rounded-pill badge_yellow b-pd">hint</button>
        <span>hint내용</span>
      </div>
    </div>
    <img src="images/pudding_2.png" alt="">
  </div>
</div>

<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/footer.php';
?>