<?php
$title = "강의 상세";
$css_route = "course/css/course.css";
$js_route = "course/js/course.js";
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/header.php';

  
$cid = $_GET['cid'];
  
$sql = "SELECT * FROM courses where cid={$cid}";
$result = $mysqli -> query($sql);
$rs = $result -> fetch_object();



// lid
// cid
// name
// content
// thumbnail
// link
// add_image
// $lsql = "SELECT c.cid, l.cid , l.u
// from courses c 
// JOIN lecture l
// on c.cid = l.cid 
// where c.status = 2 and uc.status = 1 and uc.userid = '{$_SESSION['UID']}' and uc.use_max_date >= now() ";
$lsql = "SELECT * FROM lecture where cid={$cid}";
$lresult = $mysqli->query($lsql);
while($lrs = $lresult -> fetch_object()){
  $lecArr[] = $lrs;
}

// $sql2 = "SELECT * FROM product_options where cid={$cid}";
// $result2 = $mysqli -> query($sql2);
//$rs2 = $result2 -> fetch_object();

// while($rs2 = $result2 -> fetch_object()){
//   $options[]=$rs2;
// }

// $sql3 = "SELECT * FROM product_image_table where cid={$cid}";
// $result3 = $mysqli -> query($sql3);
// //$rs2 = $result2 -> fetch_object();

// while($rs3 = $result3 -> fetch_object()){
//   $addImgs[]=$rs3;
// }


?>


<section class="course_view">
  <h2 class="main_tt dark tt_mb">강의 보기</h2>
  <div class="course_list shadow_box">
    <div class="d-flex">
      <div class="view_category">
        <nav
          style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
          aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">프로그래밍</a></li>
            <li class="breadcrumb-item active" aria-current="page">프론트엔드</li>
            <li class="breadcrumb-item active" aria-current="page">Javascript</li>
          </ol>
        </nav>
      </div>
      <img src="<?= $rs->thumbnail; ?>" alt="강의 썸네일 이미지" class="border">
      <div class="course_info">
        <div>
          <h3 class="course_list_title main_stt d-flex align-items-center"><?= $rs->name; ?>
            <span class="badge rounded-pill blue_bg b-pd">프론트엔드</span>
            <span class="badge rounded-pill green_bg b-pd">초급</span>
          </h3>
          <p class="base_mt"><?= $rs->content; ?></p>
        </div>
        <div>
          <p class="duration"><i class="ti ti-calendar-event"></i><span>수강기간</span><span>3개월</span></p>
          <p class="price content_stt"><?= $rs->price; ?></p>
        </div>
      </div>
    </div>
    <div class="course_status d-flex justify-content-between">
      <ul>
        <?php 
        if(isset($lecArr)){
          foreach($lecArr as $lec){
        ?>
        <li>
          <i class="ti ti-circle-chevron-right"></i>
          <a href="<?= $lec -> link; ?>" target="_blank"><?= $lec -> name; ?></a>
        </li>
        <?php 
          }
        } ?>
      </ul>
      <div class="d-flex flex-column align-items-end status_wrap">
        <select class="form-select" aria-label="Default select example" id="selectmenu">
          <option selected disabled>상태</option>
          <!-- 추후 value 넣기  -->
          <option value="">활성화</option>
          <option value="">비활성화</option>
        </select>
        <span class="price_btn_wrap">
          <a href="" class="btn btn-primary btn_g">수정</a>
          <button class="btn btn-danger">삭제</button>
        </span>
      </div>
    </div>
  </div>
  <a href="course_list.php" class="btn btn-dark base_mt">돌아가기</a>

</section>


</div><!-- content_wrap -->
</div><!-- wrap -->
<script>
  /* 유림 */
  //강의 가격 천단위, 변환
  // let str_price = $('.course_list .price').text();
  // let course_price = ($.number(str_price));
  // $('.course_list .price').text(course_price+' 원');

//   let priceList = $('.price');

    
// priceList.each(function() {

//     let str_price = $(this).text();
//     let course_price = ($.number(str_price));
//     console.log('course_price',course_price)
//     console.log('str_price',str_price)

//    $(this).text(course_price+' 원');
// });



  /* 유림 */
</script>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/footer.php';
?>