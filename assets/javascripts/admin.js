function check_delete(){
  if(!window.confirm("Chắc chắn muốn xoá thành viên này?")) return false;
}

function check_change_level(){
  if(!window.confirm("Chắc chắn muốn chuyển đổi loại tài khoản?")) return false;
}

$(document).ready(function(){

  $("#users_filter").change(function(){
    level = $(this).val();
    $.ajax({
      url:"index.php?controller=admin&resources=user&action=index_ajax",
      type:"get",
      data:"level="+level,
      async:true,
      success:function(result){
        $("#users_list").html(result);
      }
    });
    return false;
  });

  countu = 0;
  $("input[type='checkbox']").click(function(){
    order = $(this).attr("data-old-order");
    is_check = $(this).prop("checked");
    if (is_check == true) {
      countu++;
      $(this).closest("tr").css("background", "#FCD79F");
      $("#delete_all").removeAttr("disabled");
      $(this).attr("checked", "checked");
      $(this).attr("data-id");
      $(this).attr("data-new-order", order);
      $("#delete_all").attr("href", "#");
    } else {
      countu--;
      $(this).closest("tr").css("background", "#fff");
      $(this).removeAttr("checked");
      $(this).attr("data-new-order", "");
      if (countu == 0) {
        $("#delete_all").attr("disabled", "disabled").attr("href", "javascript:void(0)");
      }
    }
  })

  $("#delete_all").click(function(){
    a = $(this).attr("href");
    if (a != "javascript:void(0)") {
      // xoa nhieu user
      list_user = "";
      j = 1;
      for (i=1; i<8; i++) {
        userid = $("tbody input[data-new-order='"+i+"']").attr("data-id");
        if (userid != undefined) {
          if (j == countu) {
            list_user = list_user+"\""+i+"\":\""+userid+"\"";
          } else {
            list_user = list_user+"\""+i+"\":\""+userid+"\",";
          }
          j++;
        }
      }
      list_user = "{"+list_user+"}";

      cf = "";
      if (countu == 1) {
        cf = "Bạn chắc chắn muốn xoá tài khoản này?";
      } else {
        cf = "Bạn chắc chắn muốn xoá "+countu+" tài khoản này?";
      }
      if (!window.confirm(cf)) {
        return false;
      } else {
        cpage = $("table").attr("data-page");
        $(this).attr("href", "http://localhost/www/herbal_tea/index.php?controller=admin&resources=user&action=destroy&data="+list_user+"&page="+cpage);
      }
    }
  })

});
