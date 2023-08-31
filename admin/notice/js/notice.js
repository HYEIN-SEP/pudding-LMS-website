
/* notice.js */
$(document).ready(function(){
$('[data-toggle="tooltip"]').tooltip();

$('.ti-trash, .btn_delete').click(function(){    
  let result = confirm('정말 삭제하시겠습니까?');
  if(result) {    
    //yes
     location.replace('../notice/notice_list.php');
 } else {
     history.back();
 }
});
$('.btn_modify').click(function(){
  confirm('내용 수정','수정하시겠습니까?');
  if(result) {
    //yes
     location.replace('notice_list.php');
 } else {
     history.back();
 }
});

/* notice_create.js */
$('#summernote').summernote({
  /* 폰트선택 툴바 사용하려면 주석해제 */
  // fontNames: ['Roboto Light', 'Roboto Regular', 'Roboto Bold', 'Apple SD Gothic Neo'],
  // fontNamesIgnoreCheck: ['Apple SD Gothic Neo'],
  placeholder: '공지사항 내용을 입력해 주세요',
  tabsize: 2,
  height: 150,
  resize: false,
  lang: "ko-KR",
  disableResizeEditor: true,
  toolbar: [
      /* 폰트선택 툴바 사용하려면 주석해제 */
      // ['fontname', ['fontname']],
      ['fontsize', ['fontsize']],
      ['style', ['bold', 'italic', 'underline', 'clear']],
      ['color', ['color']],
      ['table', ['table']],
      ['para', ['paragraph']],
      ['insert', ['link', 'picture']],
      ['view', []]
  ],
  callbacks: {	//여기 부분이 이미지를 첨부하는 부분
      onImageUpload: function (files) {
          RealTimeImageUpdate(files, this);
      }
  }
})

// 검색 버튼 클릭 시 실행할 js 함수를 작성한다. 이 함수는 검색어를 가져와서 각 테이블 각 행을 순회하며 검색어와 일치하는 행만 보여준다.
$('#searchButton').click(function(){
  let searchText = $('#searchInput').val().toLowerCase();

  $('.notice_body tbody tr').each(function(){
    let title = $(this).find("td:nth-child(2) a").text().toLowerCase();
    let content = $(this).find("td:nth-child(2) a").attr("href").toLowerCase();
    if (title, includes(searchText) || content.includes(searchText)) {
      $(this).show();
    } else {
      $(this).hide();    
    }
    });
  });
});