<?php
  session_start(); 
  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/dbcon.php';

  //관리자 검사
  // if(!isset($_SESSION['AUID'])){
  //   $return_data = array("result"=>"member"); 
  //   echo json_encode($return_data);
  //   exit;
  // }
  //파일 사이즈 검사
  if($_FILES['savefile']['size']> 10240000){
    $return_data = array("result"=>'size'); 
    echo json_encode($return_data);
    exit;
  }
  //이미지 여부 검사
  if(strpos($_FILES['savefile']['type'], 'image') === false){
    $return_data = array("result"=>'image'); 
    echo json_encode($return_data);
    exit;
  } 
  //파일 업로드
  $save_dir = $_SERVER['DOCUMENT_ROOT']."/pudding-LMS-website/admin/images/course/";
  $filename = $_FILES['savefile']['name']; 
  $ext = pathinfo($filename, PATHINFO_EXTENSION); 
  $newfilename = date("YmdHis").substr(rand(), 0,6); 
  $savefile = $newfilename.".".$ext; //20238171184015.jpg

  if(move_uploaded_file($_FILES['savefile']['tmp_name'], $save_dir.$savefile)){
    $sql = "INSERT INTO course_image_table (userid, filename) VALUES ('{$_SESSION['AUID']}', '{$savefile}')";
    $result = $mysqli-> query($sql);
    $imgid = $mysqli -> insert_id; 

    $return_data = array("result"=>'success', 'imgid'=> $imgid, 'savefile'=> $savefile); 
    echo json_encode($return_data);
    exit;

  } else{
    $return_data = array("result"=>'error'); 
    echo json_encode($return_data);
    exit;
  }

?>